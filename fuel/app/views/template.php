<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title><?php echo $title; ?></title>
	<meta name="description" content="">

	<?php echo Asset::css('main.min.css'); ?>
	<style>
    body {
      margin: 50px;
    }
	</style>
	<?php echo Asset::js(array('http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js', 'scripts.min.js')); ?>
	<script>
    $(function() {
      $('.topbar').dropdown();
    });
	</script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
		<?php echo Asset::js(array('html5shiv.js', 'respond.min.js')); ?>
  <![endif]-->
</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/"><?php echo Config::get('simple_community.site_title'); ?></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <?php if (Uri::segment(1) == 'admin'): ?>
						<?php foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>

							<?php
							$section_segment = basename($controller, '.php');
							$section_title = Inflector::humanize($section_segment);
							?>

										<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
							<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
						</li>
						<?php endforeach; ?>
					<?php elseif(Sentry::check()): ?>
					<li class="<?php echo Uri::segment(1) == 'directory' ? 'active' : '' ?>">
						<?php echo Html::anchor('directory', 'Directory') ?>
					</li>
					<li class="<?php echo Uri::segment(1) == 'forum' ? 'active' : '' ?>">
						<?php echo Html::anchor('forums', 'Forums') ?>
					</li>
					<?php endif; ?>
	      </ul>

	      <ul class="nav navbar-nav navbar-right">
	        <?php if (Sentry::check()): ?>
						<li class="<?php echo Uri::segment(1) == 'dashboard' ? 'active' : '' ?>">
							<?php echo Html::anchor('dashboard', 'Dashboard') ?>
						</li>
							<?php if($is_admin): ?>
								<li>
									<?php echo Html::anchor('admin', 'Admin') ?>
								</li>
							<?php endif; ?>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $full_name; ?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><?php echo Html::anchor(Model_User::get_url_by_id($user_id), 'My Profile') ?></li>
									<li><?php echo Html::anchor('user/preferences', 'Change Preferences') ?></li>
									<li><?php echo Html::anchor('auth/logout', 'Logout') ?></li>
								</ul>
							</li>
					<?php else: ?>
						<li><?php echo Html::anchor('auth/login', 'Login') ?></li>
						<?php if (Config::get('simple_community.registration_enabled')): ?>
							<li><?php echo Html::anchor('auth/register', 'Register') ?></li>
						<?php endif; ?>
					<?php endif; ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
			  <?php if (Session::get_flash('success')): ?>
          <div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <?php echo implode('<br>', (array)Session::get_flash('success')); ?>
          </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
          <div class="alert alert-error">
            <button class="close" data-dismiss="alert">×</button>
            <?php echo implode('<br>', (array)Session::get_flash('error')); ?>
          </div>
        <?php endif; ?>
        <?php if(empty($hide_title)): ?>
  			  <div class="page-header">
  				  <h2><?php echo $title; ?></h2>
  				</div>
				<?php endif; ?>
			</div>
			<div class="col-xs-12">
        <?php echo $content; ?>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="https://github.com/ericouyang/simple_community">Simple Community</a> and
				<a href="http://fuelphp.com">FuelPHP</a> are released under the MIT license.<br>
				<small>Simple Community Version: 0.1a - FuelPHP Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>

</body>
</html>

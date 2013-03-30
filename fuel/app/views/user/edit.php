<?php echo Form::open(array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
  <div class="control-group">
    <?php echo Form::label('First name', 'first_name', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('first_name', Input::post('first_name', isset($user) ? $user->first_name : ''), array('class' => 'span4')); ?>

    </div>
  </div>
  <div class="control-group">
    <?php echo Form::label('Last name', 'last_name', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => 'span4')); ?>

    </div>
  </div>
  <div class="control-group">
    <?php echo Form::label('Email', 'email', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span4')); ?>

    </div>
  </div>
  <div class="control-group">
    <?php echo Form::label('Website', 'website', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('website', Input::post('website', isset($user) ? $user->profile->website : ''), array('class' => 'span4')); ?>

    </div>
  </div>
  <div class="control-group">
    <?php echo Form::label('About', 'about', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::textarea('about', Input::post('about', isset($user) ? $user->profile->about : ''), array('class' => 'span8', 'rows' => 10)); ?>
      <span class="help-block">You can write up your profile in <a href="http://daringfireball.net/projects/markdown/basics">Markdown syntax</a>.</span>
    </div>
  </div>
  <div class="control-group">
    <?php echo Form::label('Profile image', 'profile_image', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('profile_image', Input::post('profile_image', isset($user) ? $user->profile->profile_image : ''), array('type' => 'file', 'class' => 'span4')); ?>

    </div>
  </div>
  
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
    <?php echo Html::anchor($user->get_url(), 'Cancel', array('class' => 'btn')); ?>
  </div>
<?php echo Form::close(); ?>
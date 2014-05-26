<div class="row">
  <div class="col-md-8">
    <?php echo Form::open(array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
      <div class="form-group">
        <?php echo Form::label('First name', 'first_name', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('first_name', Input::post('first_name', isset($user) ? $user->first_name : ''), array('class' => 'form-control')); ?>

        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('Last name', 'last_name', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => 'form-control')); ?>

        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('Email', 'email', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'form-control')); ?>

        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('Website', 'website', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('website', Input::post('website', isset($user) ? $user->profile->website : ''), array('class' => 'form-control')); ?>

        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('About', 'about', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::textarea('about', Input::post('about', isset($user) ? $user->profile->about : ''), array('class' => 'form-control', 'rows' => 10)); ?>
          <span class="help-block">You can write up your profile in <a href="http://daringfireball.net/projects/markdown/basics">Markdown syntax</a>.</span>
        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('Profile image', 'profile_image', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('profile_image', Input::post('profile_image', isset($user) ? $user->profile->profile_image : ''), array('type' => 'file', 'class' => 'form-control')); ?>

        </div>
      </div>

      <div class="col-sm-8 col-sm-offset-2">
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
        <?php echo Html::anchor($user->get_url(), 'Cancel', array('class' => 'btn')); ?>
      </div>
    <?php echo Form::close(); ?>
  </div>
</div>

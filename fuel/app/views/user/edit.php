<?php echo Form::open(array('enctype' => 'multipart/form-data')); ?>

  <fieldset>
    <div class="clearfix">
      <?php echo Form::label('Email', 'email'); ?>

      <div class="input">
        <?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span4')); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('First name', 'first_name'); ?>

      <div class="input">
        <?php echo Form::input('first_name', Input::post('first_name', isset($user) ? $user->first_name : ''), array('class' => 'span4')); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('Last name', 'last_name'); ?>

      <div class="input">
        <?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => 'span4')); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('About', 'about'); ?>

      <div class="input">
        <?php echo Form::textarea('about', Input::post('about', isset($user) ? $user->about : ''), array('class' => 'span8', 'rows' => 8)); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('User Data', 'user_data'); ?>

      <div class="input">
        <?php echo Form::textarea('user_data', Input::post('user_data', isset($user) ? $user->user_data : ''), array('class' => 'span8', 'rows' => 8)); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('Profile image', 'profile_image'); ?>

      <div class="input">
        <?php echo Form::input('profile_image', Input::post('profile_image', isset($user) ? $user->profile_image : ''), array('type' => 'file', 'class' => 'span4')); ?>

      </div>
    </div>
    <div class="actions">
      <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

    </div>
  </fieldset>
<?php echo Form::close(); ?>
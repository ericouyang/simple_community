<h2>New User</h2>
<br>

<?php echo Form::open(); ?>

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
      <?php echo Form::label('Password', 'password'); ?>

      <div class="input">
        <?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'span4')); ?>

      </div>
    </div>
    <div class="actions">
      <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

    </div>
  </fieldset>
<?php echo Form::close(); ?>


<p><?php echo Html::anchor('admin/user', 'Back'); ?></p>

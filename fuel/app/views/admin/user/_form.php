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
			<?php echo Form::label('Permissions', 'permissions'); ?>

			<div class="input">
				<?php echo Form::textarea('permissions', Input::post('permissions', isset($user) ? $user->permissions : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Activated', 'activated'); ?>

			<div class="input">
				<?php echo Form::input('activated', Input::post('activated', isset($user) ? $user->activated : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Activation hash', 'activation_hash'); ?>

			<div class="input">
				<?php echo Form::input('activation_hash', Input::post('activation_hash', isset($user) ? $user->activation_hash : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Persist hash', 'persist_hash'); ?>

			<div class="input">
				<?php echo Form::input('persist_hash', Input::post('persist_hash', isset($user) ? $user->persist_hash : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Reset password hash', 'reset_password_hash'); ?>

			<div class="input">
				<?php echo Form::input('reset_password_hash', Input::post('reset_password_hash', isset($user) ? $user->reset_password_hash : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
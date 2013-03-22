<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Forum id', 'forum_id'); ?>

			<div class="input">
				<?php echo Form::input('forum_id', Input::post('forum_id', isset($thread) ? $thread->forum_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('User id', 'user_id'); ?>

			<div class="input">
				<?php echo Form::input('user_id', Input::post('user_id', isset($thread) ? $thread->user_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($thread) ? $thread->title : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
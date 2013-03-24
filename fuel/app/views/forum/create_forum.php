<?php echo Form::open(array('class' => 'form-horizontal')); ?>
  <div class="control-group">
    <?php echo Form::label('Title', 'title', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('title', Input::post('title', isset($forum) ? $forum->title : ''), array('class' => 'span4')); ?>

    </div>
  </div>
  <div class="control-group">
    <?php echo Form::label('Description', 'description', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::input('description', Input::post('description', isset($forum) ? $forum->description : ''), array('class' => 'span4')); ?>

    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

  </div>
<?php echo Form::close(); ?>
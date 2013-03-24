<?php echo Form::open(array('class' => 'form-horizontal')); ?>
  <div class="control-group">
    <?php echo Form::label('Body', 'body', array('class' => 'control-label')); ?>

    <div class="controls">
      <?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'span8', 'rows' => 8)); ?>
      <span class="help-block">You can write up your post in <a href="http://daringfireball.net/projects/markdown/basics">Markdown syntax</a>.</span>
    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

  </div>
<?php echo Form::close(); ?>
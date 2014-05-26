<div class="row">
  <div class="col-md-8">
    <?php echo Form::open(array('class' => 'form-horizontal')); ?>
      <div class="form-group">
        <?php echo Form::label('Body', 'body', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'form-control', 'rows' => 8)); ?>
          <span class="help-block">You can write up your post in <a href="http://daringfireball.net/projects/markdown/basics">Markdown syntax</a>.</span>
        </div>
      </div>
      <div class="col-sm-8 col-sm-offset-2">
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

      </div>
    <?php echo Form::close(); ?>
  </div>
</div>

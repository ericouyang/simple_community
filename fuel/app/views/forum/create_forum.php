<div class="row">
  <div class="col-md-8">
    <?php echo Form::open(array('class' => 'form-horizontal')); ?>
      <div class="form-group">
        <?php echo Form::label('Title', 'title', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('title', Input::post('title', isset($forum) ? $forum->title : ''), array('class' => 'form-control')); ?>

        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('Description', 'description', array('class' => 'control-label col-sm-2')); ?>

        <div class="col-sm-8">
          <?php echo Form::input('description', Input::post('description', isset($forum) ? $forum->description : ''), array('class' => 'form-control')); ?>

        </div>
      </div>
      <div class="col-sm-8 col-sm-offset-2">
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

      </div>
    <?php echo Form::close(); ?>
  </div>
</div>

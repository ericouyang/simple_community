<div class="row">
  <div class="col-md-8">
    <?php echo Form::open(array('class' => 'form-horizontal', 'role' => 'form')); ?>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="email">Email:</label>
        <div class="col-sm-8">
          <input class="form-control" name="email" type="email" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="first_name">First name:</label>
        <div class="col-sm-8">
          <input class="form-control" name="first_name" type="text" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="last_name">Last name:</label>
        <div class="col-sm-8">
          <input class="form-control" name="last_name" type="text" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Password:</label>
        <div class="col-sm-8">
          <input class="form-control" name="password" placeholder="" type="password" required="true">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2">
          <input class="btn btn-primary submit-button" type="submit" value="Register">
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-4">
    <p><?php echo $registration_text; ?></p>
  </div>
</div>

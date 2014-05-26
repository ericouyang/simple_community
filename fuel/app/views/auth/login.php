<div class="row">
  <div class="col-md-8">
    <?php echo Form::open(array('class' => 'form-horizontal', 'role' => 'form')); ?>
      <?php echo Form::input('dest', Input::get('dest', 'dashboard'), array('type' => 'hidden')); ?>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="email">Email:</label>
        <div class="col-sm-8">
          <input class="form-control" name="email" type="email" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Password:</label>
        <div class="col-sm-8">
          <input class="form-control" name="password" placeholder="" type="password" required="true">
          <span class="help-block">Forgot your password? Click <a href="/auth/reset_password">here</a> to reset it.</span>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2">
          <input class="btn btn-primary submit-button" type="submit" value="Login">
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-4">
    <p><?php echo $login_text; ?></p>
    <?php if (Config::get('simple_community.registration_enabled')): ?>
    <p>Don't have an account yet? <a href="/auth/register">Register &raquo;</a>
    <?php endif; ?>
  </div>
</div>

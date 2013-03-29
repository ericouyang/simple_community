<div class="row">
  <div class="span8">
    <?php echo Form::open(array('class' => 'form-horizontal')); ?>
      <?php echo Form::input('dest', Input::get('dest', 'dashboard'), array('type' => 'hidden')); ?>
      <div class="control-group">
        <label class="control-label" for="email">Email:</label>
        <div class="controls">
          <input class="xlarge" name="email" type="email" required="true">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Password:</label>
        <div class="controls">
          <input class="xlarge" name="password" placeholder="" type="password" required="true">
          <span class="help-block"><small>Forgot your password? Click <a href="/auth/reset_password">here</a> to reset it.</small></span>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input class="btn primary submit-button" type="submit" value="Login">
        </div>
      </div>
    </form>
  </div>
  <div class="span4">
    <p><?php echo $login_text; ?></p>
  </div>
</div>
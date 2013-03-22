<div class="row">
  <div class="span8">
    <form class="form-horizontal" action="/auth/login" method="post">
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
    <p><strong>Help text for login</strong></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum laoreet lorem, eget lobortis augue pretium eu. Cras id purus massa. Phasellus blandit semper sapien, sit amet vulputate ipsum fermentum vel. Nullam vel malesuada enim. Nam at tempus diam.</p>
  </div>
</div>
<form action="/auth/login" method="post">
  <div class="clearfix">
    <label for="email">Email:</label>
    <div class="input">
      <input class="xlarge" name="email" type="email" required="true">
    </div>
  </div>
  <div class="clearfix">
    <label for="password">Password:</label>
    <div class="input">
      <input class="xlarge" name="password" placeholder="" type="password" required="true">
      <span class="help-block">Forgot your password? Click <a href="/auth/reset_password">here</a> to reset it</span>
    </div>
  </div>
  <div class="clearfix">
    <div class="input">
      <input class="btn primary submit-button" type="submit" value="Login">
    </div>
  </div>
</form>
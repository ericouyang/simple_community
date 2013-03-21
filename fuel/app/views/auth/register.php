<form action="/auth/register" method="post">
  <div class="clearfix">
    <label for="email">Email:</label>
    <div class="input">
      <input class="xlarge" name="email" type="email" required="true">
    </div>
  </div>
  <div class="clearfix">
    <label for="first_name">First name:</label>
    <div class="input">
      <input class="xlarge" name="first_name" type="text" required="true">
    </div>
  </div>
  <div class="clearfix">
    <label for="last_name">Last name:</label>
    <div class="input">
      <input class="xlarge" name="last_name" type="text" required="true">
    </div>
  </div>
  <div class="clearfix">
    <label for="password">Password:</label>
    <div class="input">
      <input class="xlarge" name="password" placeholder="" type="password" required="true">
    </div>
  </div>
  <div class="clearfix">
    <div class="input">
      <input class="btn primary submit-button" type="submit" value="Register">
    </div>
  </div>
</form>
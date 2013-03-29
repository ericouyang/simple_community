<div class="row">
  <div class="span8">
    <form class="form-horizontal" action="/auth/register" method="post">
      <div class="control-group">
        <label class="control-label" for="email">Email:</label>
        <div class="controls">
          <input class="xlarge" name="email" type="email" required="true">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="first_name">First name:</label>
        <div class="controls">
          <input class="xlarge" name="first_name" type="text" required="true">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="last_name">Last name:</label>
        <div class="controls">
          <input class="xlarge" name="last_name" type="text" required="true">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Password:</label>
        <div class="controls">
          <input class="xlarge" name="password" placeholder="" type="password" required="true">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input class="btn primary submit-button" type="submit" value="Register">
        </div>
      </div>
    </form>
  </div>
  <div class="span4">
    <p><?php echo $registration_text; ?></p>
  </div>
</div>
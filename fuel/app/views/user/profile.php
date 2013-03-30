<div class="page-header">
  <?php if(Sentry::check() && $user->id == $user_id)
    echo Html::anchor('user/edit/'.$user->id, 'Edit', array('class'=>'btn btn-primary pull-right')); ?>
  <h2><?php echo $user->get_full_name(); ?></h2>
</div>
<div class="row">
  <div class="span3">
    <?php 
        if ($user->profile->profile_image)
          echo Html::img($user->profile->profile_image);
        else
          echo Html::img("http://placehold.it/210x210");
      ?>
  </div>
  <div class="span3">
    <p><b>Email: </b><?php echo $user->email; ?></p>
    <?php if ($user->profile->website): ?>
      <p><b>Website: </b><?php echo Html::anchor($user->profile->website, $user->profile->website); ?></p>
    <?php endif; ?>
  </div>
  <div class="span6">
    <?php echo Markdown::parse($user->profile->about); ?></p>
  </div>
</div>

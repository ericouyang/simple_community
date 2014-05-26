<div class="row">
<?php foreach ($users as $user): ?>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <div>
      <?php
        if ($user->profile->profile_image)
          echo Html::anchor($user->get_url(), Html::img($user->profile->profile_image));
        else
          echo Html::img("http://placehold.it/250x250");
      ?>
      </div>
      <div class="caption">
        <h5><?php echo Html::anchor($user->get_url(), $user->get_full_name()); ?></h5>
        <p><small><?php echo $user->email; ?></small></p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php echo html_entity_decode($pagination); ?>

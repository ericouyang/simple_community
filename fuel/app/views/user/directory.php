<ul class="thumbnails">
<?php foreach ($users as $user): ?>
  <li class="span3">
    <div class="thumbnail">
      <div style="height:210px;">
      <?php
        if ($user->profile->profile_image)
          echo Html::anchor($user->get_url(), Html::img($user->profile->profile_image));
        else
          echo Html::img("http://placehold.it/210x210");
      ?>
      </div>
      <div class="caption">
        <h5><?php echo Html::anchor($user->get_url(), $user->get_full_name()); ?></h5>
        <p><small><?php echo $user->email; ?></small></p>
      </div>
    </div>
  </li>
<?php endforeach; ?>
</ul>
<?php echo html_entity_decode($pagination); ?>
<ul class="thumbnails">
<?php foreach ($users as $user): ?>
  <li class="span3">
    <div class="thumbnail">
      <?php
        if ($user->profile->profile_image)
          echo Html::anchor($user->get_url(), Html::img($user->profile->profile_image));
        else
          echo Html::img("http://placehold.it/210x240");
      ?>
      <div class="caption">
        <h5><?php echo Html::anchor($user->get_url(), $user->get_full_name()); ?></h5>
        <p>More data...</p>
      </div>
    </div>
  </li>
<?php endforeach; ?>
</ul>
<?php echo $pagination; ?>
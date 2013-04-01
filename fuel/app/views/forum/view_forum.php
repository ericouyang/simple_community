<div class="page-header">
  <?php echo Html::anchor('forum/'.$forum->id.'/create_thread', 'Create a thread', array('class'=>'btn btn-primary pull-right')); ?>
  <h4><?php echo Html::anchor('forums', 'Forums') ?> &raquo; <?php echo $forum->title; ?></h4>
</div>
<?php if(count($forum->threads) == 0): ?>
  <h5>No threads in this forum. <?php echo Html::anchor('forum/'.$forum->id.'/create_thread', 'Create one!'); ?></h5>
<?php else: ?>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>
        Thread title
      </th>
      <th>
        Latest post
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($forum->threads as $thread): ?>
    <tr>
      <td class="span8">
        <h4><?php echo Html::anchor($thread->get_url(), $thread->title); ?></h4>
        <p><small>Created by: <?php echo Html::anchor($thread->user->get_url(), $thread->user->get_full_name()); ?></small> | Posts: <?php echo count($thread->posts); ?></p>
      </td>
      <td class="span4">
        <?php if ($post = $thread->get_latest_post()) echo $post->body . '<br> -'. Html::anchor($post->user->get_url(), $post->user->get_full_name()); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
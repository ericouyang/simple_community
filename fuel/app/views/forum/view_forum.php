<div class="page-header">
  <?php echo Html::anchor('forum/create_thread/'.$forum->id, 'Create a thread', array('class'=>'btn btn-primary pull-right')); ?>
  <h2><?php echo $forum->title; ?></h2>
</div>
<?php if(count($forum->threads) == 0): ?>
  <h5>No threads in this forum. <?php echo Html::anchor('forum/create_thread/'.$forum->id, 'Create one!'); ?></h5>
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
        <h4><?php echo Html::anchor('forum/view_thread/'.$thread->id, $thread->title); ?></h4>
        <p><small>Created by: <?php echo Html::anchor($thread->user->get_url(), $thread->user->get_full_name()); ?></small> | Posts: <?php echo count($thread->posts); ?></p>
      </td>
      <td class="span4">
        
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
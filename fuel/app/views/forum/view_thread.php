<div class="page-header">
  <?php echo Html::anchor('forum/create_post/'.$thread->id, 'Post a reply', array('class'=>'btn btn-primary pull-right')); ?>
  <h2><?php echo $thread->title; ?></h2>
</div>
<?php if(count($thread->posts) == 0): ?>
  <h5>No posts in this thread. <?php echo Html::anchor('forum/create_post/'.$thread->id, 'Create one!'); ?></h5>
<?php else: ?>
<table class="table table-striped table-bordered">
  <tbody>
    <?php foreach($thread->posts as $post): ?>
    <tr>
      <td class="span3">
        <p><?php echo Html::anchor($post->user->get_url(), $post->user->get_full_name()); ?></p>
        <p>Created: <?php echo $post->created_at; ?></p>
        <p>Last updated: <?php echo $post->updated_at; ?></p>
      </td>
      <td class="span9">
        <?php echo $post->body; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
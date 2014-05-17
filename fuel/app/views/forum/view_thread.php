<div class="page-header">
  <?php echo Html::anchor('forum/'.$thread->forum_id.'/thread/'.$thread->id.'/create_post', 'Post a reply', array('class'=>'btn btn-primary pull-right')); ?>
  <h4><?php echo Html::anchor('forums', 'Forums') ?> &raquo;
      <?php echo Html::anchor('forum/'.$thread->forum_id, $thread->forum->title); ?> &raquo;
      <?php echo $thread->title; ?></h4>
</div>
<?php if(count($thread->posts) == 0): ?>
  <h5>No posts in this thread. <?php echo Html::anchor('forum/'.$thread->forum_id.'/thread/'.$thread->id.'/create_post', 'Create one!'); ?></h5>
<?php else: ?>
<table class="table table-striped table-bordered">
  <tbody>
    <?php foreach($thread->posts as $post): ?>
    <tr>
      <td class="col-xs-3">
        <h4>
          <b><?php echo Html::anchor($post->user->get_url(), $post->user->get_full_name()); ?></b>
          <?php if ($post->user->is_moderator()): ?>
            <span class="label">Moderator</span>
          <?php endif; ?>
        </h4>
        <p><small>Updated: <?php echo date('n/j/y \a\t g:i a', $post->updated_at); ?></small></p>
      </td>
      <td class="col-xs-9">
        <?php echo $post->body; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

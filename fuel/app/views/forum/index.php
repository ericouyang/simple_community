<div class="page-header">
  <?php echo Html::anchor('forum/create', 'Create Forum', array('class'=>'btn btn-primary pull-right')); ?>
  <h2>Forums</h2>
</div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>
        Forum
      </th>
      <th>
        Latest Thread
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($forums as $forum): ?>
    <tr>
      <td class="span8">
          <h4><?php echo Html::anchor('forum/view/'.$forum->id, $forum->title); ?></h4>
          <p><?php echo $forum->description; ?></p>
          <p><small>Created by: <?php echo Html::anchor($forum->user->get_url(), $forum->user->get_full_name()); ?> | Threads: <?php echo count($forum->threads); ?> | Posts:</small></p>
      </td>
      <td class="span4">
        
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
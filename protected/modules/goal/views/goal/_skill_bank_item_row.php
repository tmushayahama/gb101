<div class="gb-skill-bank-item-row">
  <div class="row-fluid">
    <div class="span1">
      <?php echo $count; ?>
    </div>
    <div class="span9">
      <a><h4><?php echo $goalBankItem->name; ?></h4></a>
      <?php if ($goalBankItem->description != null): ?>
        <p><?php echo $goalBankItem->description; ?></p>
      <?php else: ?>
        <p class="text-info">No description yet. <a>Help Add</a></p>
      <?php endif; ?>
      Was added to skill list: <a>0</a> times.<br>
      Is committed: <a>0</a> times.
    </div>
    <div class="span2">
      <div class="btn-group">
        <button class="pull-right gb-btn gb-btn-green-1 btn-small dropdown-toggle" data-toggle="dropdown">
          Action
          <i class="icon-white icon-chevron-down"></i>
        </button>
        <ul class="dropdown-menu">
          <li class="nav-header">Add To</li>
          <li><a>My Skill List</a></li>
          <li><a>My Skill Commitment</a></li>
          <li class="nav-header">Other</li>
          <li><a>Assign To</a></li>
          <li><a>Challenge</a></li>
          <li><a>Bookmark</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="offset1 span11 gb-skill-footer inline">
      <a class="gb-btn gb-btn-blue-light-1">Suggest Edit</a>
      <a class="gb-btn gb-btn-blue-light-1">Share</a>
      <a class="pull-right gb-btn"><h5>More Details</h5></a>
    </div>
  </div>
</div>
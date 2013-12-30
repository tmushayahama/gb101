<?php $this->beginContent('//layouts/gb_main'); ?>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner navbar-small">
    <div class="container">
      <div class="row">
        <div class="gb-navbar span12">
          <a href="/home" class="pull-left">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="">
          </a>
          <div class="dropdown">
            <a class="dropdown-toggle gb-announcements-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            </ul>
          </div>
          <div class="dropdown">
            <a class="dropdown-toggle gb-messages-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            </ul>
          </div>
          <div class="dropdown">
            <a class="dropdown-toggle gb-requests-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
              <?php
              $requests = RequestNotifications::getRequestsNotifications(6);
              if (count($requests) != 0):
                ?>
                <div class="display-number">
                  <?php echo count($requests); ?>
                </div>
              <?php else: ?>
                <div class="gb-hidden display-number">
                </div>
              <?php endif; ?>
            </a>
            <ul id="gb-requests-dropdown-menu" class="dropdown-menu " role="menu" aria-labelledby="dLabel">
              <?php foreach ($requests as $request): ?>
                <?php
                echo $this->renderPartial('//site/_request_notification', array(
                 'request' => $request
                ));
                ?>
              <?php endforeach; ?>
            </ul>
          </div>
          <input type="text" class="input-large search-query" placeholder="search">

          <ul class="nav inline nav-pills pull-right">
            <li>
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="nav-header">User Settings</li>
                <li><a href="#">Account Settings</a></li>
                <li><a href="#">Privacy Settings </a></li>
                <li class="divider"></li>
                <li class="nav-header">Commitments</li>
                <li><a href="#">Reports</a></li>
              </ul>
            </li>
            <li><a href="<?php echo Yii::app()->createUrl("user/logout"); ?>">Logout</a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="gb-topbar" class="">
  <div class="container">
    <div class="row">
      <ul class="nav inline nav-pills">
        <li><a href="<?php echo Yii::app()->createUrl("site/connections"); ?>" ><i class="gb-btn btn-link icon-white icon-home"></i>Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("site/connections"); ?>" ><i class="gb-btn btn-link icon-white icon-home"></i>Profile</a></li>
        <li class="dropdown">
          <a  class="gb-btn btn-link btn-mini" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            Skills 
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">
            <li><a href="<?php echo Yii::app()->createUrl("goal/goal/skillhome", array()); ?>"><i class="icon icon-marketplace"></i>My Skill</a></li>
            <li><a href="<?php echo Yii::app()->createUrl("goal/goal/skillhome", array()); ?>"><i class="icon icon-marketplace"></i>Skill Bank</a></li>
          </ul>
        </li>
        <li class="dropdown pull-right">
          <a id="topbar-menu-dropdown-toggle" class="gb-btn btn-mini gb-btn-blue-2" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            Menu <i class="pull-right icon-white icon-arrow-down"></i>
          </a>
          <ul id="sidebar-selecto" class="dropdown-menu " role="menu" aria-labelledby="dLabel">
            <li><a href="<?php echo Yii::app()->createUrl("site/connections"); ?>" ><div class="icon icon-home"></div><br>Home</a></li>
            <li><a href="<?php echo Yii::app()->createUrl("user/profile"); ?>"><div class="icon icon-profile"></div><br>Profile</a></li>
            <li><a href="#"><div class="icon icon-characters"></div><br>Groups</a></li>
            <li><a href="<?php echo Yii::app()->createUrl("goal/goal/skillhome", array()); ?>"><div class="icon icon-marketplace"></div><br>Skills</a></li>
            <li><a href="#"><div class="icon icon-scripts"></div><br>Goals</a></li>
            <li><a href="#" ><div class="icon icon-da-stash"></div><br>Promises</a></li>
            <li><a href="#"><div class="icon icon-scripts"></div><br>Timelines</a></li>
            <li><a href="#" ><div class="icon icon-da-stash"></div><br>More</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="content">
  <?php echo $content ?>
</div>
<?php $this->endContent(); ?>

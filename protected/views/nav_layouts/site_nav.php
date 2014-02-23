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
              $requests = RequestNotification::getRequestsNotifications(6);
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
          <div class="offset1 input-prepend input-append">
            <div class="btn-group">
              <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
                All
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">All</a></li>
                <li><a href="#">People</a></li>
                <li><a href="#">Goals</a></li>
                <li><a href="#">Skills</a></li>
                <li><a href="#">Promises</a></li>
              </ul>
            </div>
            <input class="span3" id="appendedPrependedDropdownButton" type="text" placeholder="Search anything. e.g. awesome, dentist">
            <div class="btn-group">
              <button class="btn " >
                Search
              </button>
            </div>
          </div>
          <ul class="nav nav-list inline pull-right">
            <li>
              <a><img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="" class="profile-img"></a>
            </li>
            <li class="dropdown">
              <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="nav-header">User Settings</li>
                <li><a href="#">Account Settings</a></li>
                <li><a href="#">Privacy Settings </a></li>
                <li class="divider"></li>
                <li class="nav-header">Commitments</li>
                <li><a href="#">Reports</a></li>
              </ul>
            </li>
            <li><a href="<?php echo Yii::app()->createUrl("user/logout"); ?>" class="btn btn-link text-error">Logout</a></li>

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
        <li><a href="<?php echo Yii::app()->createUrl("site/home"); ?>" ><i class="gb-btn btn-link icon-white icon-home"></i>Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("user/profile/profile", array("user" => Yii::app()->user->id)); ?>" ><i class="gb-btn btn-link icon-white icon-home"></i>Profile</a></li>
        <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="gb-btn btn-link btn-mini">
            Skills 
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">
            <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>"><i class="icon icon-marketplace"></i>My Skills</a></li>
            <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>"><i class="icon icon-marketplace"></i>Skill Bank</a></li>
          </ul>
        </li>
       <!-- <li class="dropdown">
          <a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>" class="gb-btn btn-link btn-mini">
            Goals 
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">
            <li><a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>"><i class="icon icon-marketplace"></i>My Goals</a></li>
            <li><a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>"><i class="icon icon-marketplace"></i>Goal Bank</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array()); ?>" class="gb-btn btn-link btn-mini">
            Promises
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">
            <li><a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array()); ?>"><i class="icon icon-marketplace"></i>My Promises</a></li>
            <li><a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array()); ?>"><i class="icon icon-marketplace"></i>Promise Bank</a></li>
          </ul>
        </li> -->
        <li class="dropdown">
          <a href="#" class="gb-btn btn-link btn-mini">
            Connections
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">
            <?php foreach (Connection::getAllConnections() as $connection): ?>
              <li>
                <a href="<?php echo Yii::app()->createUrl('connection/connection/connection', array('connectionId' => $connection->id)); ?>">
                  <?php echo $connection->name ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array()); ?>" class="gb-btn btn-link btn-mini">
            Mentorships
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
         <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome", array()); ?>" class="gb-btn btn-link btn-mini">
            Advice Pages 
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
         <li class="dropdown">
          <a href="<?php echo "#";//Yii::app()->createUrl("pages/pages/pageshome", array()); ?>" class="gb-btn btn-link btn-mini">
            Developers
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
        <li class="dropdown pull-right">
          <a id="topbar-menu-dropdown-toggle" class="gb-btn btn-mini" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            More <i class="pull-right icon-white icon-arrow-down"></i>
          </a>
          <ul id="sidebar-selecto" class="dropdown-menu " role="menu" aria-labelledby="dLabel">
            <li><a href="#" ><div class="icon icon-home"></div>Groups</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>Templates</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>Timelines</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>Events</a></li>
            <li><a href="#" ><div class="icon icon-home"></div>All</a></li>
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

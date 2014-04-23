<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
    <title>Skill Section Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap3/bootstrap.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-tour.css" type="text/css" rel="stylesheet"/>

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- top nav -->
    <div class="navbar gb-navbar navbar-static-top">  
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
          </button>
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class=" gb-img-logo" alt="Goalbook">
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
          <ul class="nav nav-pills pull-left gb-notifications-nav">
            <li>
              <div class="dropdown">
                <a class="dropdown-toggle gb-announcements-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                </ul>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <a class="dropdown-toggle gb-messages-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                </ul>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <a class="dropdown-toggle gb-requests-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                  <?php
                  $requests = RequestNotification::getRequestNotifications(6);
                  if (count($requests) != 0):
                    ?>
                    <div class="display-number">
                      <?php echo count($requests); ?>
                    </div>
                  <?php else: ?>
                    <div class="gb-hide display-number">
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
            </li>
          </ul>
          <form class="navbar-form navbar-left col-sm-offset-2 col-lg-offset-1 col-md-offset-1">
            <div id="gb-navbar-search" class="input-group input-group-md">
              <div class="input-group-btn">
                <button id="gb-post-type-btn" class="hidden-xs btn btn-default dropdown-toggle" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>">Skill Bank</a></li>
                  <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_MENTORSHIP; ?>">Mentorships</a></li>
                  <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_ADVICE_PAGE; ?>">Advice Pages</a></li>
                  <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_PEOPLE; ?>">People</a></li>
                </ul>
              </div>
              <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
              <div class="input-group-btn">
                <button id="gb-keyword-search-btn" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>
          <ul class="nav nav-pills pull-right">
            <li>
              <a class="btn btn-link"><?php echo Profile::getFirstName(); ?></a>
            </li>
            <li class="dropdown">
              <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i> <b class="caret"></b></a>
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
        </nav>
      </div>
    </div>
    <div id="gb-topbar" class="visible-lg">
      <div class="container">
        <div class="row">
          <ul id="gb-topbar-nav" class="nav inline nav-pills">
            <li><a href="<?php echo Yii::app()->createUrl("site/home"); ?>" class="gb-btn btn-link">Home</a></li>
            <li><a href="<?php echo Yii::app()->createUrl("user/profile/profile", array("user" => Yii::app()->user->id)); ?>" class="gb-btn btn-link">Profile</a></li>
            <li class="dropdown">
              <a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="gb-btn btn-link btn-mini">
                Skills 
              </a>
              <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>">My Skills</a></li>
                <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>">Skill Bank</a></li>
              </ul>
            </li>
            <!-- <li class="dropdown">
               <a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array());           ?>" class="gb-btn btn-link btn-mini">
                 Goals 
               </a>
               <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                 <li><a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array());           ?>"><i class="icon icon-marketplace"></i>My Goals</a></li>
                 <li><a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array());           ?>"><i class="icon icon-marketplace"></i>Goal Bank</a></li>
               </ul>
             </li>
             <li class="dropdown">
               <a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array());           ?>" class="gb-btn btn-link btn-mini">
                 Promises
               </a>
               <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                 <li><a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array());           ?>"><i class="icon icon-marketplace"></i>My Promises</a></li>
                 <li><a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array());           ?>"><i class="icon icon-marketplace"></i>Promise Bank</a></li>
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
              <a href="<?php echo "#"; //Yii::app()->createUrl("pages/pages/pageshome", array());           ?>" class="gb-btn btn-link btn-mini">
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
                <li><a href="<?php echo Yii::app()->createUrl("people/", array()); ?>" class="">People</a></li>
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
    <!-- /top nav -->
    <div class="" id="main-container">
      <div class="gb-no-padding ">
        <?php echo $content; ?>
      </div>
    </div>
    <!-- /container -->


    <!-- JavaScript -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap3/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tour.js"></script>
    <script type='text/javascript'>
      $(document).ready(function() {
        /* off-canvas sidebar toggle */
        $('[data-toggle=offcanvas]').click(function() {
          $(this).toggleClass('visible-xs text-center');
          $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
          $('.row-offcanvas').toggleClass('active');
          $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
          $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
          $('#btnShow').toggle();
        });
      });
    </script>
  </body>
</html>



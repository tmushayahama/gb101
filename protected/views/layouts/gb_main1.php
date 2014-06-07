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
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery1.9.0.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
    <title>Skill Section Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap3/bootstrap.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-tour.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-themes-1.10.2/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet"/>


    <?php
    Yii::app()->clientScript->registerScriptFile(
      Yii::app()->baseUrl . '/js/gb_init.js', CClientScript::POS_END
    );
    ?>
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
      <div class="gb-backdrop in gb-hide">
    </div>
    <!-- top nav -->
    <div class="navbar gb-navbar navbar-static-top">  
      <div class="container">
        <div class="row">
          <div class="navbar-header col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
            <a href="<?php echo Yii::app()->createUrl("site/home"); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="Goalbook"></a>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
            <ul id="gb-nav-collapse" class="collapse navbar-collapse nav gb-no-padding">
              <li class="row">
                <div id="gb-navbar-search" class=" col-lg-7 col-md-6 col-sm-6 col-xs-12 gb-no-padding">
                  <div class="input-group input-group-sm gb-padding-thin">
                    <div class="input-group-btn">
                      <button id="gb-post-type-btn" class="btn btn-default dropdown-toggle" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
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
                </div>
                <ul class="nav nav-pills gb-notifications-nav col-lg-2 col-md-3 col-sm-3 col-xs-6">
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
                      <a class="dropdown-toggle gb-messages-notifications"  role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                      </a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                      </ul>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown">
                      <a class="dropdown-toggle gb-requests-notifications" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
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
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 gb-no-padding">
                  <div class="btn-group pull-right gb-padding-thin">
                    <a class="btn btn-link dropdown-toggle" data-toggle="dropdown"><?php echo Profile::getFirstName(); ?> <b class="caret"></b></a>
                    <ul class="nav dropdown-menu">
                      <li class="gb-disabled"><a href="#">Account Settings</a></li>
                      <li class="gb-disabled"><a href="#">Privacy Settings </a></li>
                    </ul>
                    <a href="<?php echo Yii::app()->createUrl("user/logout"); ?>" class="btn btn-link text-error"><i class="glyphicon glyphicon-off"></i></a>
                  </div>
                </div>
              </li>
              <li id="gb-topbar" class="row">
                <ul  class="nav nav-pills col-lg-12 col-md-12 col-sm-5 col-xs-10">
                  <li><a href="<?php echo Yii::app()->createUrl("site/home"); ?>" class="gb-btn btn-link">Home</a></li>
                  <li id="gb-tour-explore-2"><a href="<?php echo Yii::app()->createUrl("user/profile/profile", array("user" => Yii::app()->user->id)); ?>" class="gb-btn btn-link">Profile</a></li>
                  <li id="gb-tour-skill-3"><a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>">My Skills</a></li>
                  <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>">Skill Bank</a></li>

                  <!--<li class="dropdown">
                    <a href="<?php //echo Yii::app()->createUrl("skill/skill/skillhome", array());          ?>" class="gb-btn btn-link btn-mini">
                      Skills 
                    </a>
                    <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                      <li><a href="<?php //echo Yii::app()->createUrl("skill/skill/skillhome", array());          ?>">My Skills</a></li>
                      <li><a href="<?php //echo Yii::app()->createUrl("skill/skill/skillbank", array());          ?>">Skill Bank</a></li>
                    </ul>
                  </li> -->
                  <!-- <li class="dropdown">
                     <a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array());                                   ?>" class="gb-btn btn-link btn-mini">
                       Goals 
                     </a>
                     <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                       <li><a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array());                                   ?>"><i class="icon icon-marketplace"></i>My Goals</a></li>
                       <li><a href="<?php //echo Yii::app()->createUrl("goal/goal/goalhome", array());                                   ?>"><i class="icon icon-marketplace"></i>Goal Bank</a></li>
                     </ul>
                   </li>
                   <li class="dropdown">
                     <a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array());                                   ?>" class="gb-btn btn-link btn-mini">
                       Promises
                     </a>
                     <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                       <li><a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array());                                   ?>"><i class="icon icon-marketplace"></i>My Promises</a></li>
                       <li><a href="<?php //echo Yii::app()->createUrl("promise/promise/promisehome", array());                                   ?>"><i class="icon icon-marketplace"></i>Promise Bank</a></li>
                     </ul>
                   </li> -->
                  <!--  <li class="dropdown">
                      <a href="#" class="gb-btn btn-link btn-mini">
                        Connections
                      </a>
                      <ul  class="dropdown-menu " role="menu" aria-labelledby="">
                  <?php //foreach (Connection::getAllConnections() as $connection): ?>
                          <li>
                            <a href="<?php //echo Yii::app()->createUrl('connection/connection/connection', array('connectionId' => $connection->id));          ?>">
                  <?php //echo $connection->name ?>
                            </a>
                          </li>
                  <?php //endforeach; ?>
                      </ul>
                    </li> -->

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
                    <a href="<?php echo "#"; //Yii::app()->createUrl("pages/pages/pageshome", array());                                   ?>" class="gb-btn btn-link btn-mini">
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
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container hidden-lg hidden-md">
        <a type="button" data-toggle="collapse" data-target="#gb-nav-collapse" class="col-sm-12 col-xs-12 btn btn-xs gb-nav-collapse-toggle row">
          <i class="glyphicon glyphicon-align-justify"></i>
        </a>
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



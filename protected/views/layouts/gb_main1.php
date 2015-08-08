<?php ?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery1.9.0.min.js"></script>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Skill Section Main</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/smartadmin.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_components.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-tour.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jscrollpane.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/gb-timeline.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-themes-1.10.2/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet"/>
  <link id="gb-theme" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_theme_1.css" type="text/css" rel="stylesheet"/>
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
 </head>
 <body>
  <?php
  $requests = Notification::getNotifications(null, null, null, Yii::app()->user->id, 10);
  ?>
  <!-- top nav -->
  <div id="gb-navbar" class="navbar navbar-static-top">
   <div class="wrapper toggled">
    <div class="page-content-wrapper">
     <div class="container gb-padding-none">
      <div class="row">
       <div class="navbar-header col-lg-9 col-md-9 col-sm-10 col-xs-10">
        <a class="gb-logo gb-ellipsis" href="<?php echo Yii::app()->createUrl("app/skill"); ?>">
         <span class="">
          <i class="gb-padding-thin pull-left gb-close-middle-nav fa fa-bars hidden-lg hidden-md hidden-sm visible-xs">
          </i>
          <strong>SKILL</strong>SECTION
         </span>
         <small class="">BETA</small>
        </a>
        <a id="gb-browse-trigger"
           class="gb-hide gb-browse btn btn-default gb-dropdown-toggle"
           gb-target="#gb-browse-dropdown">
         Skills: All <b class="caret"></b>
        </a>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 gb-padding-none">
        <ul id="gb-navbar-nav" class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
         <li class="col-lg-4 col-md-4 hidden-sm hidden-xs gb-padding-none">
          <a class="gb-dropdown-toggle col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none"
             gb-target="#gb-notifications-dropdown">
           <h3 class="glyphicon glyphicon-bell"></h3>
          </a>
         </li>
         <li class="col-lg-4 col-md-4 hidden-sm hidden-xs gb-padding-none">
          <a class="gb-dropdown-toggle col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none"
             gb-target="#gb-messages-dropdown">
           <h3 class="glyphicon glyphicon-envelope"></h3>
          </a>
         </li>
         <li class="col-lg-4 col-md-4 hidden-sm hidden-xs gb-padding-none">
          <a href="<?php echo Yii::app()->createUrl("user/logout"); ?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
           <h3 class="glyphicon glyphicon-off"></h3>
          </a>
         </li>
         <li class="hidden-lg hidden-md visible-sm visible-xs gb-padding-none">
          <div class="btn-group">
           <a class="dropdown-toggle"
              data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . Profile::getAvatarUrl(); ?>" class="gb-icon" alt="">
           </a>
           <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <li class="">
             <a class="text-left gb-link row gb-ellipsis"
                data-gb-link-type="redirects"
                data-gb-url="<?php echo Yii::app()->createUrl("user/profile/profile", array("userId" => Yii::app()->user->id)); ?>">
                 <?php echo Profile::getFullName(); ?>
             </a>
            </li>
            <li class="">
             <a class="text-left gb-link row"
                data-gb-type="app-menu"
                gb-data-toggle='gb-expandable-tab'
                data-gb-url="<?php echo Yii::app()->createUrl("community/communityTab/communityOverview", array()); ?>"
                data-gb-target-pane-id="#gb-main-tab-pane">
              Community
             </a>
            </li>
            <li class="">
             <a class="text-left gb-dropdown-toggle"
                gb-target="#gb-notifications-dropdown">
              <i class="glyphicon glyphicon-bell"></i> Notifications
             </a>
            </li>
            <li class="">
             <a class="text-left gb-dropdown-toggle"
                gb-target="#gb-messages-dropdown">
              <i class="glyphicon glyphicon-envelope"></i> Messages
             </a>
            </li>
            <li class="">
             <a class="text-left" href="<?php echo Yii::app()->createUrl("user/logout"); ?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
              <i class="glyphicon glyphicon-off"></i> Log Out
             </a>
            </li>
           </ul>
          </div>
         </li>
        </ul>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div id="gb-browse-dropdown" class="container-fluid gb-mega-dropdown gb-hide gb-background-light-grey-1">

   </div>
   <div id="gb-messages-dropdown" class="container-fluid gb-mega-dropdown gb-hide gb-background-light-grey-1">
    <br>
    <div class="container">
     <h4 class="gb-heading-2">Messages</h4>
     <div class="row">
      <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-none">
      </div>
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
       <div class="tab-content gb-padding-left-3 gb-height-7 gb-scrollable">

       </div>
      </div>
     </div>
    </div>
   </div>
   <div id="gb-notifications-dropdown" class="container-fluid gb-mega-dropdown gb-hide gb-background-light-grey-1">
    <br>
    <div class="container">
     <h4 class="gb-heading-2">Notifications</h4>
     <div class="row">
      <div class="gb-home-left-nav col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-padding-none">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-padding-none">
       <div class="tab-content gb-padding-left-3 gb-height-7 gb-scrollable">
        <?php foreach ($requests as $request): ?>
         <?php
         echo $this->renderPartial('//site/_request_notification', array(
           'request' => $request
         ));
         ?>
        <?php endforeach; ?>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="container hidden-lg hidden-md hidden-sm hidden-xs">
    <a type="button" data-toggle="collapse" data-target="#gb-nav-collapse" class="col-sm-12 col-xs-12 btn btn-sm gb-nav-collapse-toggle row">
     <i class="fa fa-bars"></i>
    </a>
   </div>
  </div>
  <!-- /top nav -->
  <div class="" id="main-container">
   <?php echo $content; ?>
   <div id="gb-navbar-search" class="gb-hide col-lg-7 col-md-6 col-sm-6 col-xs-12 gb-padding-none">
    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-4 gb-padding-none">
     <div class="row pull-right">
      <ul class="nav nav-pills gb-notifications-nav col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-thinner">
       <li class="dropdown pull-right">
        <button class="btn btn-default dropdown-toggle gb-requests-notifications" type="button" id="dropdownMenu1" data-toggle="dropdown">
         <?php
         if (count($requests) != 0):
          ?>
          <div class="display-number">
           <?php echo count($requests); ?>
          </div>
         <?php else: ?>
          <div class="gb-hide display-number">
          </div>
         <?php endif; ?>
         <span class="caret"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right gb-notification-display panel panel-default" role="menu" aria-labelledby="dropdownMenu1">
         <div class="panel-heading">
          <h2>Requests</h2>
         </div>
         <div class="panel-body"></div>
       </li>
       <li class="dropdown pull-right">
        <button class="btn btn-default dropdown-toggle gb-messages-notifications" type="button" id="dropdownMenu1" data-toggle="dropdown">

         <span class="caret"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right gb-notification-display" role="menu" aria-labelledby="dropdownMenu1">

        </div>
       </li>
       <li class="dropdown pull-right">
        <button class="btn btn-default dropdown-toggle gb-announcements-notifications" type="button" id="dropdownMenu1" data-toggle="dropdown">

         <span class="caret"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right gb-notification-display" role="menu" aria-labelledby="dropdownMenu1">

        </div>
       </li>
      </ul>
      <div class="btn-group row gb-padding-thinner col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <a href="<?php echo Yii::app()->createUrl("user/logout"); ?>" class="btn btn-link text-error pull-right"><i class="glyphicon glyphicon-off"></i></a>
       <a class="btn btn-link dropdown-toggle pull-right" data-toggle="dropdown"><?php echo Profile::getFirstName(); ?> <b class="caret"></b></a>
       <ul class="nav dropdown-menu">
        <li class="gb-disabled"><a href="#">Account Settings</a></li>
        <li class="gb-disabled"><a href="#">Privacy Settings </a></li>
       </ul>
      </div>
     </div>
    </li>
    <div class="input-group input-group-sm gb-padding-thin">
     <div class="input-group-btn">
      <button id="gb-post-type-btn" class="btn btn-default dropdown-toggle" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
      <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
       <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
       <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>">Skill Bank</a></li>
       <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_MENTORSHIP; ?>">Mentorships</a></li>
       <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_ADVICE; ?>">Advice Pages</a></li>
       <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_PEOPLE; ?>">People</a></li>
      </ul>
     </div>
     <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
     <div class="input-group-btn">
      <button id="gb-keyword-search-btn" class="btn btn-default form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
     </div>
    </div>
   </div>
  </div>
  <!-- ---------------------MODALS ------------------- -->
  <?php
  echo $this->renderPartial('application.views.site.modals._delete_confirmation_modal'
    , array());
  echo $this->renderPartial('application.views.site.modals._notification_modal'
    , array());
  echo $this->renderPartial('application.views.site.modals._notification_viewer_modal'
    , array());
  ?>

  <script id="" type="text/javascript">
   var getPostsUrl = "<?php echo Yii::app()->createUrl("site/getPosts", array()); ?>";
   var EDIT_ME_URL = "<?php echo Yii::app()->createUrl("site/editMe", array()); ?>";
   var DELETE_ME_URL = "<?php echo Yii::app()->createUrl("site/deleteMe", array()); ?>";
   var APPEND_MORE_URL = "<?php echo Yii::app()->createUrl("site/appendMore", array()); ?>";
   var POPULATE_DATA_URL = "<?php echo Yii::app()->createUrl("site/populateData", array()); ?>";

   var getSelectPeopleListUrl = "<?php echo Yii::app()->createUrl("site/getSelectPeopleList", array()); ?>";
   var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptRequest", array()); ?>";
   var submitTagUrl = "<?php echo Yii::app()->createUrl("site/submitTag", array()); ?>";

   var DEL_TYPE_REMOVE = "<?php echo Type::$DEL_TYPE_REMOVE; ?>";
   var DEL_TYPE_REPLACE = "<?php echo Type::$DEL_TYPE_REPLACE; ?>";

   /* ---------REQUEST NOTIFICATIONS --------- */
   var REQUEST_FROM_OWNER = "<?php echo Notification::$REQUEST_FROM_OWNER; ?>";
   var REQUEST_FROM_FRIEND = "<?php echo Notification::$REQUEST_FROM_FRIEND; ?>";

   hideContainers();
   $("#gb-screen-height").height($("body").height() - 100);
   $(window).resize(function () {
    $("#gb-screen-height").height($("body").height() - 100);
    hideContainers();
   });

   function hideContainers() {
    if (window.matchMedia('(min-width: 767px)').matches) {
     $(".nav-container").show();
     $(".gb-close-right-nav").hide();
    } else {
     $("#gb-middle-nav-3").closest(".nav-container").hide();
    }
   }
  </script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.0.custom.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap3/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tour.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jscrollpane.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/gb_init.js"></script>
 </body>
</html>
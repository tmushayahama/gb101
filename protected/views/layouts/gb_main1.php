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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_components.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-tour.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-themes-1.10.2/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet"/>

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
    <div class="gb-backdrop in gb-hide">
    </div>
    <!-- top nav -->
    <div id="gb-navbar" class="navbar navbar-static-top">  
      <div class="container">
        <div class="row">
          <div class="navbar-header col-lg-2 col-md-2 col-sm-12 col-xs-12 gb-no-padding">
            <a href="<?php echo Yii::app()->createUrl("site/home"); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="Goalbook"></a>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 gb-no-padding">
            <ul id="gb-nav-collapse" class="collapse navbar-collapse nav gb-no-padding">
              <li id="gb-navbar-nav" class="row">
                <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-8 gb-no-padding">
                  <a href="<?php echo Yii::app()->createUrl("site/home"); ?>" class="col-lg-1 col-md-1 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/home_icon_0.png" alt="">
                      <div class="caption">
                        <h6 class="text-center">Home</h6>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("project/project/projecthome"); ?>" class="col-lg-2 col-md-2 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_0.png" alt="">
                      <div class="caption">
                        <h6 class="text-center">Project</h6>
                      </div>
                    </div>
                  </a>
                  <a id="gb-tour-skill-3" href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="col-lg-2 col-md-2 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_0.png" alt="">
                      <div class="caption">
                        <h6 class="text-center">My Skills</h6>
                      </div>
                    </div>
                  </a>
                  <a id="gb-tour-explore-2" href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>" class="col-lg-2 col-md-2 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_0.png" alt=""><div class="caption">
                        <h6 class="text-center">Skill Bank</h6>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array()); ?>" class="col-lg-2 col-md-2 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_0.png" alt="">
                      <div class="caption">
                        <h6 class="text-center">Mentorships</h6>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome", array()); ?>" class="col-lg-2 col-md-2 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_0.png" alt="">
                      <div class="caption">
                        <h6 class="text-center">Advice</h6>
                      </div>
                    </div>
                  </a>
                  <a class="gb-disabled col-lg-1 col-md-1 col-sm-3 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_0.png" alt="">
                      <div class="caption">
                        <h6 class="text-center">More</h6>
                      </div>
                    </div>
                  </a>
                </div>
                <div id="gb-navbar-search" class="gb-hide col-lg-7 col-md-6 col-sm-6 col-xs-12 gb-no-padding">
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
                      <button id="gb-keyword-search-btn" class="btn btn-default form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0 col-lg-3 col-md-3 col-sm-3 col-xs-4 gb-no-padding">
                  <div class="row pull-right">
                    <ul class="nav nav-pills gb-notifications-nav col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-thinner">
                      <li class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle gb-requests-notifications" type="button" id="dropdownMenu1" data-toggle="dropdown">
                          <?php
                          $requests = Notification::getNotifications(null, 10);
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
                          <div class="panel-body">
                            <?php foreach ($requests as $request): ?>
                              <?php
                              echo $this->renderPartial('//site/_request_notification', array(
                               'request' => $request
                              ));
                              ?>
                            <?php endforeach; ?>
                          </div>
                        </div>
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
                </div>
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
      <?php echo $content; ?>
    </div>
    <div class="gb-dummy-height">
    </div>
    <!-- ---------------------MODALS ------------------- -->
    <?php
    echo $this->renderPartial('application.views.site.modals._delete_confirmation_modal'
      , array());
    ?>

    <!-- JavaScript -->
    <script id="" type="text/javascript">
      var REQUEST_TYPE = {
        MENTOR_REQUEST: <?php echo Type::$SOURCE_MENTOR_REQUESTS ; ?>,
        MENTEE_REQUEST: <?php echo Type::$SOURCE_MENTEE_REQUESTS ; ?>,
        MENTOR_ASSIGN_OWNER: <?php echo Notification::$NOTIFICATION_MENTOR_ASSIGN_OWNER; ?>,
        MENTOR_ASSIGN_FRIEND: <?php echo Notification::$NOTIFICATION_MENTOR_ASSIGN_FRIEND; ?>,
        MENTEE_ASSIGN_OWNER: <?php echo Notification::$NOTIFICATION_MENTEE_ASSIGN_OWNER; ?>,
        MENTEE_ASSIGN_FRIEND: <?php echo Notification::$NOTIFICATION_MENTEE_ASSIGN_FRIEND; ?>
      };



      var getPostsUrl = "<?php echo Yii::app()->createUrl("site/getPosts", array()); ?>";
      var editMeUrl = "<?php echo Yii::app()->createUrl("site/editMe", array()); ?>";
      var deleteMeUrl = "<?php echo Yii::app()->createUrl("site/deleteMe", array()); ?>";
      var getSelectPeopleListUrl = "<?php echo Yii::app()->createUrl("site/getSelectPeopleList", array()); ?>";
      var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptRequest", array()); ?>";
      var submitTagUrl = "<?php echo Yii::app()->createUrl("site/submitTag", array()); ?>";

      var DEL_TYPE_REMOVE = "<?php echo Type::$DEL_TYPE_REMOVE; ?>";
      var DEL_TYPE_REPLACE = "<?php echo Type::$DEL_TYPE_REPLACE; ?>";

      /* ---------REQUEST NOTIFICATIONS --------- */
      var REQUEST_FROM_OWNER = "<?php echo Notification::$REQUEST_FROM_OWNER; ?>";
      var REQUEST_FROM_FRIEND = "<?php echo Notification::$REQUEST_FROM_FRIEND; ?>";

    </script>

    <?php
    Yii::app()->clientScript->registerScriptFile(
      Yii::app()->baseUrl . '/js/gb_init.js', CClientScript::POS_END
    );
    ?>
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



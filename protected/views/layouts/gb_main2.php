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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-tour.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss.css" type="text/css" rel="stylesheet"/>

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php
    Yii::app()->clientScript->registerScriptFile(
      Yii::app()->baseUrl . '/js/gb_init.js', CClientScript::POS_END
    );
    Yii::app()->clientScript->registerScriptFile(
      Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
    );
    ?>
    <script id="" type="text/javascript">
      var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
      var ajaxSearchUrl = "<?php echo Yii::app()->createUrl("search/ajaxSearch"); ?>";
    </script>
  </head>
  <body>
    <!-- top nav -->
    <div class="navbar gb-navbar navbar-static-top">  
      <div class="container">
        <div class="row">
          <div class="navbar-header col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
            <a href="<?php echo Yii::app()->createUrl(""); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="Goalbook"></a>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
            <ul id="gb-nav-collapse" class="collapse navbar-collapse nav gb-no-padding">
              <li class="row">
                <div id="gb-navbar-search" class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 gb-no-padding">
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
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 pull-right gb-padding-thin">
                  <a href="#gb-registration-modal" role="button" class="btn btn-success col-lg-6 col-md-6 col-sm-6 col-xs-6" data-toggle="modal"> Sign Up</a>
                  <a href="#gb-login-modal" role="button" class="btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-6" data-toggle="modal">Login</a>
                </div>
              </li>
              <li id="gb-topbar" class="row">
                <ul  class="nav nav-pills col-lg-12 col-md-12 col-sm-5 col-xs-10">
                  <li><a href="<?php echo Yii::app()->createUrl("user/login"); ?>" class="gb-btn btn-link btn-mini">Guest Home</a></li>
                  <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>" class="gb-btn btn-link btn-mini">Skill Bank</a></li>
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
                  <li><a href="<?php echo Yii::app()->createUrl("people/", array()); ?>" class="gb-btn btn-link btn-mini">People</a></li>
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



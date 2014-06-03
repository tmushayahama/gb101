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
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="glyphicon glyphicon-chevron-down"></span>
          </button>
          <a href="<?php echo Yii::app()->createUrl("user/login"); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="Goalbook"></a>
          <ul class="nav gb-hide nav-pills pull-right">
            <li class="">
              <a href="#gb-registration-modal" role="button" class="navbar-btn" data-toggle="modal"> Sign Up</a>
            </li>
            <li>
              <a href="#gb-login-modal" role="button" class="navbar-btn" data-toggle="modal">Login</a>
            </li>
            <li class="col-lg-4">
            </li>
          </ul>
        </div>
        <ul class="nav gb-hide-on-threshold nav-pills pull-right">
          <li class="">
            <a href="#gb-registration-modal" role="button" class="navbar-btn" data-toggle="modal"> Sign Up</a>
          </li>
          <li>
            <a href="#gb-login-modal" role="button" class="navbar-btn" data-toggle="modal">Login</a>
          </li>
          <li class="col-lg-4">
          </li>
        </ul>
        <ul class="collapse navbar-collapse pull-left nav" role="navigation">
          <li class="row">
            <form class="navbar-form pull-left ">
              <div class="input-group input-group-sm">
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

          </li>
          <li id="gb-topbar" class="row">
            <ul class="nav inline nav-pills">
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



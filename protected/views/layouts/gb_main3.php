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
    <div class="navbar gb-navbar gb-navbar-guest navbar-static-top">  
      <div class="container">
        <div class="row">
          <div class="navbar-header col-lg-2 col-md-2 col-sm-12 col-xs-12 gb-no-padding">
            <a href="<?php echo Yii::app()->createUrl(""); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="Goalbook"></a>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 gb-no-padding">
            <ul id="gb-nav-collapse" class="collapse navbar-collapse nav gb-no-padding">
              <li class="row">
                <div id="gb-navbar-nav" class="row col-lg-9 col-md-9 col-sm-9 col-xs-12">
                  <a href="<?php echo Yii::app()->createUrl("user/login"); ?>" class="col-lg-3 col-md-3 col-sm-2 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/home_icon_6.png" alt="">
                      <div class="caption">
                        <h5 class="text-center">Guest Home</h5>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_6.png" alt=""><div class="caption">
                        <h5 class="text-center">Skill Bank</h5>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array()); ?>" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_6.png" alt="">
                      <div class="caption">
                        <h5 class="text-center">Mentorships</h5>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome", array()); ?>" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_6.png" alt="">
                      <div class="caption">
                        <h5 class="text-center">Advice</h5>
                      </div>
                    </div>
                  </a>
                  <a href="<?php echo Yii::app()->createUrl("people/", array()); ?>" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/people_icon_6.png" alt="">
                      <div class="caption">
                        <h5 class="text-center">People</h5>
                      </div>
                    </div>
                  </a>
                  <a class="gb-disabled col-lg-1 col-md-1 col-sm-2 col-xs-4 gb-no-padding">
                    <div class="thumbnail">
                      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_6.png" alt="">
                      <div class="caption">
                        <h5 class="text-center">More</h5>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="gb-navbar-btns col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="pull-right col-xs-12 gb-padding-thin">
                    <a href="#gb-registration-modal" role="button" class="btn btn-success col-lg-6 col-md-6 col-sm-6 col-xs-6" data-toggle="modal"> Sign Up</a>
                    <a href="#gb-login-modal" role="button" class="btn btn-info col-lg-6 col-md-6 col-sm-6 col-xs-6" data-toggle="modal">Login</a>
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

    <div class="" id="main-container">
      <div class="gb-no-padding ">
        <?php echo $content; ?>
      </div>
    </div>
    <div class="gb-dummy-height">

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



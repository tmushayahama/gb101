<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_profile.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
</script>
<div class="container-fluid gb-white-background">
  <br>
  <div class="container">
    <div id="gb-profile-header" class="row">
      <div class="col-lg-2 col-sm-3 col-xs-12">
        <img href="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
      </div>
      <div class="col-lg-10 col-sm-9 col-xs-12 gb-no-padding user-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="name"><?php echo $profile->firstname . " " . $profile->lastname; ?></h3>

          </div>
          <div class="panel-body description row">
            <p>Add a one line describing yourself <a>Edit</a></p>
            <!--  <a>
                <blockquote>
                  If you have no one to encourage you, instead of using that as an excuse for failure, encourage yourself and use that as 
                  a reason why you must succeed.
                  <small>
                    <cite title="Source Title">Kevin Ngo</cite>
                  </small>
                </blockquote>
              </a> -->
          </div>
          <div class="panel-footer">
            <a class="btn btn-link">
              How others see your profile
            </a>
            <span class="pull-right">
              <a class="btn btn-primary">
                <i class="glyphicon glyphicon-bookmark"></i> 
                Manage Profile 
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/profile_icon_6.png" alt="">
      <h2 class="pull-left">My Profile</h2> </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#profile-skill-pane" data-toggle="tab">Skills</a></li>
        <li class=""><a href="#profile-about-pane" data-toggle="tab">About</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
  <br>
  <div class="tab-content">
    <div class="tab-pane active" id="profile-skill-pane">
      <div class="row">
        <div id="" class="col-lg-9 col-sm-12 col-xs-12">
          <div class="row">
            <div id="" class="col-lg-4 col-sm-4 col-xs-12 gb-home-left-nav">
              <div class="panel panel-default">
                <div class="panel-body gb-no-padding">
                  <ul id="gb-skill-nav" class="gb-side-nav-1">
                    <?php foreach ($skillGainedList as $skillGained): ?>
                      <li><a href="<?php echo '#skill-gained-' . $skillGained->id; ?>" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left"><?php echo $skillGained->goal->title ?></p><i class="pull-right glyphicon glyphicon-chevron-right"></i></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-sm-8 col-xs-12 gb-padding-thin gb-white-background">
              <div class="tab-content">
                <?php foreach ($skillGainedList as $skillGained): ?>
                  <div class="tab-pane" id="<?php echo 'skill-gained-' . $skillGained->id; ?>">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4><?php echo $skillGained->goal->title; ?></h4>
                      </div>
                      <div class="panel-body gb-no-padding">
                        <div class="row">
                          <a href="<?php echo '#profile-summary-pane-' . $skillGained->id; ?>" class="menu-box-4 col-lg-3 col-sm-3 col-xs-3" data-toggle="tab">
                            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/templates_icon_3.png" alt="">
                            <div class="menu-heading">
                              Summary
                            </div>
                          </a>
                          <a href="<?php echo '#profile-mentorship-pane-' . $skillGained->id; ?>" class="menu-box-4 col-lg-3 col-sm-3 col-xs-3" data-toggle="tab"><img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
                            <div class="menu-heading">
                              Mentorships
                              <h4 class="text-success">0</h4>
                            </div>
                          </a>
                          <a href="<?php echo '#profile-advice-pages-pane-' . $skillGained->id; ?>" class="menu-box-4 col-lg-3 col-sm-3 col-xs-3" data-toggle="tab"> <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pages_icon.png" alt="">
                            <div class="menu-heading">
                              Advice Pages
                              <h4 class="text-success">0</h4>
                            </div>
                          </a>
                          <div class="pull-right btn-group">
                            <a type="button" class="btn menu-box-4 dropdown-toggle" data-toggle="dropdown">
                              More <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#" ><div class="icon icon-home"></div>Groups</a></li>
                              <li><a href="#" ><div class="icon icon-home"></div>Templates</a></li>
                              <li><a href="#" ><div class="icon icon-home"></div>Timelines</a></li>
                              <li><a href="#" ><div class="icon icon-home"></div>Events</a></li>
                              <li><a href="#" ><div class="icon icon-home"></div>All</a></li>
                            </ul>
                          </div>

                        </div>
                        <br>
                        <div class="tab-content">
                          <div class="tab-pane active" id="<?php echo 'profile-summary-pane-' . $skillGained->id; ?>">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5>Skill Description</h5>
                              </div>
                              <div class="panel-body">
                                <?php echo $skillGained->goal->description; ?>

                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5>External Links</h5>
                              </div>
                              <div class="panel-body">


                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="<?php echo 'profile-mentorship-pane-' . $skillGained->id; ?>">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5><a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipHome'); ?>">Mentorships</a></h5>
                              </div>
                              <div class="panel-body">
                                <?php foreach (Mentorship::getMentoringList($skillGained->goal_id) as $mentorship): ?>
                                  <?php
                                  echo $this->renderPartial('application.modules.mentorship.views.mentorship._mentorship_row', array(
                                   "mentorship" => $mentorship,
                                  ));
                                  ?>
                                <?php endforeach; ?>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="<?php echo 'profile-advice-pages-pane-' . $skillGained->id; ?>">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5><a href="<?php echo Yii::app()->createUrl('pages/pages/pagesHome'); ?>">Advice Pages</a></h5>
                              </div>
                              <div class="panel-body">
                                <?php foreach (AdvicePage::getAdvicePages($skillGained->goal_id) as $advicePage): ?>
                                  <?php
                                  echo $this->renderPartial('application.modules.pages.views.pages._goal_page_row', array(
                                   "advicePage" => $advicePage->page,
                                  ));
                                  ?>
                                <?php endforeach; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="profile-about-pane">
      <div  class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>About Me</h4>
            </div>
            <div class="panel-body">

            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Inspiration Quote</h4>
            </div>
            <div class="panel-body">

            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Basic Info</h4>
            </div>
            <div class="panel-body">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php $this->endContent() ?>
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
<div class="container">
  <br>
  <div class="row">
    <div id="" class="col-lg-9 col-sm-12 col-xs-12">
      <div id="gb-profile-header" class="row">
        <div class="col-lg-3 col-sm-3 col-xs-12">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
        </div>
        <div class="col-lg-9 col-sm-9 col-xs-12 gb-no-padding user-info">
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
      <br>
      <br>
      <div class="row gb-bottom-border-grey-3">
        <h4 class="pull-left">My Profile</h4>
        <ul id="gb-profile-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#skill-all-pane" data-toggle="tab">Skills</a></li>
          <li class=""><a href="#skill-list-pane" data-toggle="tab">My Skill List</a></li>
        </ul>
      </div>
      <div class="row">
        <div id="" class="col-lg-4 col-sm-4 col-xs-12 gb-no-padding">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h5 class=""><a>Skill Gained </a><a class="pull-right"></a></h5>
            </div>
            <div class="panel-body gb-no-padding">
              <ul id="gb-skill-nav" class="gb-side-nav-1">
                <?php foreach ($skillGainedList as $skillGained): ?>
                  <li><a href="<?php echo '#skill-gained-' . $skillGained->id; ?>" class="pull-left" data-toggle="tab"><?php echo $skillGained->goal->title ?></a><i class="pull-right glyphicon glyphicon-chevron-right"></i></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-sm-8 col-xs-12 gb-no-padding">
          <div class="tab-content">
            <?php foreach ($skillGainedList as $skillGained): ?>
              <div class="tab-pane" id="<?php echo 'skill-gained-' . $skillGained->id; ?>">
                <br>
                <h5><?php echo $skillGained->goal->title ?></h5>
                <br>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5><a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipHome'); ?>">Mentorships</a></a></h5>
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
                <br>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5><a href="<?php echo Yii::app()->createUrl('pages/pages/pagesHome'); ?>">Advice Pages</a></a></h5>
                  </div>
                  <div class="panel-body">
                    <?php foreach (GoalPage::getAdvicePages($skillGained->goal_id) as $advicePage): ?>
                      <?php
                      echo $this->renderPartial('application.modules.pages.views.pages._goal_page_row', array(
                       "goalPage" => $advicePage->page,
                      ));
                      ?>
                    <?php endforeach; ?>
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
<!-- -------------------------------MODALS --------------------------->
<?php $this->endContent() ?>
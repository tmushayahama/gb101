<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_management.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addNewDiscussionUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('skillId' => $skillListItem->skill_id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('skillId' => $skillListItem->skill_id)); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('skillId' => $skillListItem->skill_id)); ?>";
  var addSkillWeblinkUrl = "<?php echo Yii::app()->createUrl("site/addSkillWeblink", array('skillId' => $skillListItem->skill_id)); ?>";
</script>

<div class="container-fluid gb-heading-bar-2">
  <br>
  <div class="container">
    <div class="gb-top-heading row">
      <h2 class="gb-ellipsis">Skill Management</h2>
      <ul id="" class="row gb-nav-1">
        <li class="active col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding"><a href="#skill-management-welcome-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding pull-left gb-ellipsis"><?php echo $skillListItem->skill->title; ?></p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-apps-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Skill Apps</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Timeline</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-members-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis">Monitors</p></a></li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container gb-background-light-grey-1">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content">
      <div class="tab-pane active" id="skill-management-welcome-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-2 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-overview-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-book pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview & Tools</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-tasks-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Tasks</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-discussions-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-th-list pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-ask-answer-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-question-sign pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Ask & Answer</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-external-links-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-globe pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-files-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-file pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-skill-welcome-overview-pane">
              <div class="gb-box-1 row">
                <h3 class="gb-heading-2">Skill Description</h3>
                <p>
                  <strong><?php $skillListItem->skill->title; ?></strong>
                  <?php $skillListItem->skill->description; ?>
                </p>
              </div>
              <br>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-tasks-pane">
              <h3 class="gb-heading-2">Tasks</h3>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-discussions-pane">
              <h3 class="gb-heading-2">Discussions</h3>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-ask-answer-pane">
              <h3 class="gb-heading-2">Ask Answer</h3>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-external-links-pane">
              <h3 class="gb-heading-2">External Links</h3>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-files-pane">
              <h3 class="gb-heading-2">Files</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="skill-management-apps-pane">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-no-padding">
          <ul class="gb-side-nav-1 gb-nav-for-background-2 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-skill-app-skill-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Sub Skills</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-skill-app-mentorship-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_2.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Mentorships</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-skill-app-advice-pages-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_2.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Advice Pages</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 gb-no-padding">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-skill-app-skill-pane">
              <h3 class="gb-heading-2">Skills</h3>

            </div>
            <div class="tab-pane" id="gb-skill-app-mentorship-pane">
              <h3 class="gb-heading-2">Skill Mentorships</h3>

            </div>
            <div class="tab-pane" id="gb-skill-app-advice-pages-pane">
              <h3 class="gb-heading-2">Skill Advice Pages</h3>

            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="skill-management-timeline-pane">
        <h3 class="gb-heading-2">Timeline</h3>
      </div>
      <div class="tab-pane" id="skill-management-members-pane">
        <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
          <br>

        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1 ">
          <br>
          <h3 class="gb-heading-2">Members</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 gb-no-padding hidden-sm hidden-xs">
    <div class="row gb-box-1">
      <h5 class="gb-heading-2">Other People</h5>
      <br>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>
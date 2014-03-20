<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
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
  // var addNewDiscussionUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('goalId' => $skillListItem->goal_id));   ?>";
  //var getDiscussionPostsUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('goalId' => $skillListItem->goal_id));   ?>";
  //var discussionReplyUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('goalId' => $skillListItem->goal_id));   ?>";
  // var addGoalWebLinkUrl = "<?php //echo Yii::app()->createUrl("site/addGoalWebLink");   ?>";
</script>
<link href="css/leveledito.css?v=1.11" rel="stylesheet">

<style>
  body {
    /* padding-top: 60px; */
  }
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png?v=1.11">

<div class="row-fluid">
  <div class="gb-skill-management-container span9">
    <div class="row-fluid">

      <?php
      echo $this->renderPartial('_skill_bank_item_row_guest', array(
       'skillBankItem' => $skillBankItem,
       'count' => 1));
      ?>
    </div>
    <br>
    <div class=" row-fluid">
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">Skill Participation</h4>
        <ul id="gb-skill-management-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#skill-activity-tab-pane" data-toggle="tab">Activity</a></li>
          <li class=""><a href="#skill-contributors-pane" data-toggle="tab">Contributions</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active row-fluid" id="skill-activity-tab-pane">
          <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
            <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
            <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-ask-pane" data-toggle="tab">Ask<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
          </ul>
          <div class="gb-skill-activity-content tab-content">
            <div class="tab-pane " id="gb-skill-activity-all-pane">
              <h3 class="sub-heading-9">All</h3>
            </div>
            <div class="tab-pane" id="gb-skill-activity-ask-pane">
              <h3 class="sub-heading-9">Ask</h3>
            </div>
            <div class="tab-pane active" id="gb-skill-activity-discussion-pane">
              <h3 class="sub-heading-9">Skill Discussion <a class="pull-right gb-discussion-input-toggle-btn">Add New Discussion</a></h3>
              <div class="row-fluid gb-discussion-input hide">

              </div>
              <div id="gb-discussions" class="row-fluid">

              </div>
            </div>
            <div class="tab-pane" id="gb-skill-activity-web-links-pane">

              <div id="gb-skill-management-web-links" class="">   

              </div>
            </div>
            <div class="tab-pane" id="gb-skill-activity-calendar-pane">
            </div>
            <div class="tab-pane" id="gb-skill-activity-message-pane">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="skill-contributors-pane">

        </div>
      </div>
    </div>
  </div>
  <div id="" class="span3">
    <div class="row-fluid">
      <?php
      echo $this->renderPartial('user.views.user.registration', array(
       'registerModel' => $registerModel,
       'profile' => $profile
      ));
      ?>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent(); ?>
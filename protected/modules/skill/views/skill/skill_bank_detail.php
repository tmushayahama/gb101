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
  // var addNewDiscussionUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('goalId' => $skillListItem->goal_id));  ?>";
  //var getDiscussionPostsUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('goalId' => $skillListItem->goal_id));  ?>";
  //var discussionReplyUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('goalId' => $skillListItem->goal_id));  ?>";
  // var addGoalWebLinkUrl = "<?php //echo Yii::app()->createUrl("site/addGoalWebLink");  ?>";
</script>
<div class="container">
  <br>
  <div class="row">
    <div class="gb-skill-management-container col-lg-9 col-sm-12 col-xs-12">
      <div class="row">
        <?php
        echo $this->renderPartial('_skill_bank_item_row_guest', array(
         'skillBankItem' => $skillBankItem,
         'count' => 1));
        ?>
      </div>
      <br>
      <div class=" row">
        <div class="row gb-bottom-border-grey-3">
          <h4 class="pull-left">Skill Participation</h4>
          <ul id="gb-mentorship-all-activity-nav" class="pull-right gb-nav-1">
            <li class="active"><a href="#skill-activity-tab-pane" data-toggle="tab">Activity</a></li>
            <li class=""><a href="#skill-contributors-pane" data-toggle="tab">Contributions</a></li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane active row" id="skill-activity-tab-pane">
            <div class="gb-no-padding col-lg-4 col-sm-4 col-xs-12">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 hidden-xs">
                <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-ask-pane" data-toggle="tab">Ask<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              </ul>
              <div class="input-group-btn btn-block visible-xs">
                <button id="gb-post-type-btn" class="btn btn-default col-xs-12 dropdown-toggle"  data-toggle="dropdown">All</button>
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-ask-pane" data-toggle="tab">Ask<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-8 col-sm-8 col-xs-12 tab-content">
              <br>
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
  </div>
</div>
<?php echo $this->endContent() ?>
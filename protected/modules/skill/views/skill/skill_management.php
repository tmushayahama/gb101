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
<script  type="text/javascript">
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
        <li class="active col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding"><a href="#skill-management-welcome-pane" gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillTodo", array('skillListId' => $skillListItem->id)); ?>" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding pull-left gb-ellipsis"><?php echo $skillListItem->skill->title; ?></p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-apps-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Skill Apps</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Timeline</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-contributors-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis">Contributors</p></a></li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container gb-background-light-grey-1">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content">
      <div class="tab-pane active" id="skill-management-welcome-pane">
        <!------------------SKILL MANAGEMENT PANE ----------------->
        <?php
        $this->renderPartial('skill.views.skill.welcome_tab._skill_welcome_pane', array(
         "skillListItem" => $skillListItem,
        ));
        ?>
      </div>
      <div class="tab-pane" id="skill-management-apps-pane">

      </div>
      <div class="tab-pane" id="skill-management-timeline-pane">

      </div>
      <div class="tab-pane" id="skill-management-contributors-pane">

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

<!-- ------------------------------- MODALS --------------------------->

<?php
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "modalType" => Type::$REQUEST_SHARE));
?>

<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
  <?php
  $this->renderPartial('skill.views.skill.forms._skill_todo_form', array(
   "todoModel" => $todoModel,
   "skillTodoPriorities" => $skillTodoPriorities,
   "skillId" => $skill->id,
  ));
  ?>

  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<?php $this->endContent(); ?>
<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_subskills.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">

  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container-fluid gb-heading-bar-1">
  <br>
  <?php
  echo $this->renderPartial('pages.views.pages.management._management_header', array(
   "advicePage" => $advicePage));
  ?>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#skill_pages-all-pane" data-toggle="tab">Activity</a></li>
        <li class="gb-disabled-1"><a href="#skill_pages-my-skill_pages-pane" data-toggle="tab">Summary</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container gb-background-light-grey-1">
  <div class="tab-content">
    <div class="tab-pane active" id="skill_pages-all-pane">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <?php
        echo $this->renderPartial('pages.views.pages.management._summary_sidebar', array(
         "advicePage" => $advicePage,
         "otherAdvicePages" => $otherAdvicePages,
         "mentorships" => $mentorships));
        ?>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <div class="row gb-side-margin-thick">
          <br>
          <div class="panel panel-default gb-no-padding gb-background-light-grey-1">
            <div id="gb-advice-page-subskills" class="panel-body">
              <?php
              foreach ($subskills as $subskill):
                ?>
                <?php
                echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                 'skillListItem' => $subskill->subskillList,
                 'source' => SkillList::$SOURCE_ADVICE_PAGE
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="skill_pages-my-skill_pages-pane">

    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._registration_modal', array(
 'registerModel' => $registerModel,
 'profile' => $profile
));
?>
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>
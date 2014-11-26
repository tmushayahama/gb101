<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_skills.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";

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
        <li class=""><a href="#skill_pages-my-skill_pages-pane" data-toggle="tab">Summary</a></li>
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
          <textarea class="gb-form-show form-control col-lg-12 col-sm-12 col-xs-12" rows="2" readonly
                    gb-form-slide-target="#gb-advice-page-skill-form-container"
                    gb-form-target="#gb-advice-page-skill-form"
                    name="input-message"><?php echo 'Add more ' . $advicePage->level->name . " " . $advicePage->page->title; ?>
          </textarea>
          <div  class="panel panel-default"> 
            <div class="panel-body gb-no-padding"> 
              <div id="gb-advice-page-skill-form-container" class="row gb-panel-form gb-hide">
                <?php
                echo $this->renderPartial('pages.views.pages.forms._add_advice_page_skill_form', array(
                 'skillModel' => $skillModel,
                 'advicePageId' => $advicePage->id));
                ?>
              </div>
            </div>
          </div>
          <div class="panel panel-default gb-no-padding gb-background-light-grey-1">
            <div id="gb-advice-page-skills" class="panel-body">
              <?php
              foreach ($skills as $skill):
                ?>
                <?php
                echo $this->renderPartial('skill.views.skill._skill_post_row', array(
                 'skill' => $skill->skill,
                 'source' => Skill::$SOURCE_ADVICE_PAGE
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

<div id="gb-forms-home" class="gb-hide">
  <?php
  echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
   'formType' => SkillType::$FORM_TYPE_ADVICE_PAGE_HOME,
   'pageModel' => $pageModel,
   'advicePageModel' => $advicePageModel,
   'pageLevelList' => $pageLevelList));
  ?>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('skill.views.skill.modals.skill_bank_list', array("skillBank" => $skillBank));
?>
<div id="gb-skill-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-skill-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Skill
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<div id="gb-advice-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-advice-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Advice Page
      </div>
      <div class="modal-body gb-padding-thin">

      </div>
    </div>
  </div>
</div>
<?php $this->endContent() ?>
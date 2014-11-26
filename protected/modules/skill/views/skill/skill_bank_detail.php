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
  // var addNewDiscussionUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('skillId' => $skill->skill_id));      ?>";
  //var getDiscussionPostsUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('skillId' => $skill->skill_id));      ?>";
  //var discussionReplyUrl = "<?php //echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('skillId' => $skill->skill_id));      ?>";
  // var addSkillWeblinkUrl = "<?php //echo Yii::app()->createUrl("site/addSkillWeblink");      ?>";
</script>
<div class="container-fluid gb-heading-bar-1">
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
        <?php
        echo $this->renderPartial('_skill_bank_item_row', array(
         'skillBankItem' => $skillBankItem,
         'count' => 1));
        ?>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="gb-top-heading row">
       <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_5.png" alt="">
      <h2 class="pull-left">Skill Bank Participation</h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#skill-activity-tab-pane" data-toggle="tab">Activity</a></li>
        <li class=""><a href="#skill-contributors-pane" data-toggle="tab">Contributions</a></li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="gb-skill-management-container col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class=" row">
        <div class="tab-content">
          <div class="tab-pane active row" id="skill-activity-tab-pane">
            <div class="gb-no-padding col-lg-4 col-sm-4 col-xs-12">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 hidden-xs">
                <li class="active"><a href="#gb-skill-activity-all-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Recent Activities</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-ask-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Ask</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Files</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-weblinks-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Web Links</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-say-anything-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Say Anything</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
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
                  <li class=""><a href="#gb-skill-activity-weblinks-pane" data-toggle="tab">Web Links<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                  <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-8 col-sm-8 col-xs-12 tab-content">
              <div class="tab-pane active" id="gb-skill-activity-all-pane">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4 class="">Recent Activities<span class="pull-right"><a class="gb-disabled btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="gb-skill-activity-ask-pane">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4 class="">Ask<span class="pull-right"><a class="gb-disabled btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="gb-skill-activity-discussion-pane">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4 class="">Discussion<span class="pull-right"><a class="gb-disabled btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="gb-skill-activity-weblinks-pane">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4 class="">Web Links<span class="pull-right"><a class="gb-disabled btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="gb-skill-activity-files-pane">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4 class="">Files<span class="pull-right"><a class="gb-disabled btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="gb-skill-activity-say-anything-pane">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4 class="">Say Anything<span class="pull-right"><a class="gb-disabled btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
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
</div>
<?php echo $this->endContent() ?>
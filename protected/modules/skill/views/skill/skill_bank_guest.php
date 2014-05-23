<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skillbank.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
  var ajaxSearchUrl = "<?php echo Yii::app()->createUrl("search/ajaxSearch"); ?>";
  var skillBankType = "<?php echo Post::$TYPE_LIST_BANK; ?>";
</script>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Skill Bank</h2>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Logged In</strong> you will be limited.<br>
        You will not be able to add a skill.<br>
        You cannot share a a skill.<br>
        You cannot assign a skill to someone.
      </div>
      <div class="row gb-blue-background ">
        <div class="col-lg-4 col-sm-4 col-xs-12 gb-padding-thin">
          <div class="input-group input-group-sm">
            <input class="form-control" id="gb-skillbank-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="input-group-btn">
              <button id="gb-skillbank-keyword-search-btn" class="btn btn-primary" >
                <i class='glyphicon glyphicon-search'></i>
              </button>
            </div>
          </div>
          <br>
          <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
            <li class="active"><a href="#gb-skill-verified-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Verified List</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-not-verified-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Not Verified List</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 col-sm-8 col-xs-12 gb-padding-thin">
          <div class="tab-content gb-white-background">
            <div class="tab-pane active" id="gb-skill-verified-pane"><div id="gb-skillbank-search-result" class=" row">
                <div id="gb-skillbank-search-result" class="panel panel-default gb-padding-thin">
                  <?php
                  $count = 1;
                  foreach ($skillListBank as $skillBankItem):
                    ?> 
                    <?php
                    echo $this->renderPartial('_skill_bank_item_row_guest', array(
                     'skillBankItem' => $skillBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                  ?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="gb-skill-not-verified-pane">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-12 col-xs-12">
      <div class="row">
        <div class="panel panel-default">
          <h4 class="panel-heading">Skills To Explore</h4>
          <div class="panel-body">

          </div>
        </div>
      </div>
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
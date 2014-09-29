<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";
  var mentorshipEnrollRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipEnrollRequest"); ?>";
  // $("#gb-topbar-heading-title").text("Skills");
</script> 
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-4 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container tab-content">
  <div class="tab-pane active row" id="skill-mentorships-all-pane">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-dark-4">
      <br>
      <div class="gb-top-heading row">
         <h1 class="pull-left">Mentorships</h1>
      </div>
      <br>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-background-light-grey-1 gb-no-padding">
      <br>
      <br>
      <div class="row gb-hide">
        <div id="" class="input-group input-group-sm">
          <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
          <div class="input-group-btn">
            <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
      <div class="tab-content row">
        <div class="tab-pane active" id="gb-mentorship-all-list-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Recent Mentorships</h3>
            <br>
            <div id="gb-posts"class="panel-body gb-background-light-grey-1">
              <?php
              foreach ($postShares as $postShare):
                switch ($postShare->post->type) {
                  case Post::$TYPE_MENTORSHIP:
                    $mentorship = Mentorship::model()->findByPk($postShare->post->source_id);
                    echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
                     "mentorship" => $mentorship,
                    ));
                    break;
                }
              endforeach;
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="gb-dummy-height">

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
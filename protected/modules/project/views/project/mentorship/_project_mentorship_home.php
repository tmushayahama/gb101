<div class="gb-no-padding">
 <div class="row gb-box-1 gb-home-nav">
    <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       gb-form-slide-target="#gb-mentorship-form-tab-container"
       gb-form-target="#gb-mentorship-form">
      <div class="thumbnail">
        <br>
        <div class="gb-img-container">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
        </div>
        <div class="caption">
          <h5 class="text-center">Create<br>Mentorship</h5>
        </div>
      </div>
    </a>
  </div>
  <div id="gb-mentorship-form-tab-container" class="gb-hide gb-panel-form">

  </div>
</div>
<div class="gb-background-light-grey-1 gb-no-padding">
  <div class="row">
    <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-7 gb-skill-leftbar">
      <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-mentorship-all-list-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">Recent Mentorships</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
      <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-mentorship-all-enrolled-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Mentorships</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
    </ul>
  </div>
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
        <div id="skill-posts"class="panel-body gb-background-light-grey-1">
          <?php
          foreach ($mentorships as $mentorship):
            echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
             "mentorship" => $mentorship,
            ));
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
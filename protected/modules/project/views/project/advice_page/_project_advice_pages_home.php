<div class="gb-padding-none">
   <div class="row gb-box-1 gb-home-nav">
    <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       data-gb-target-container="#gb-advice-page-form-tab-container"
       data-gb-target="#gb-advice-page-form">
      <div class="thumbnail">
        <br>
        <div class="gb-img-container">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
        </div>
        <div class="caption">
          <h5 class="text-center">Add a<br>Project Advice</h5>
        </div>
      </div>
    </a>
  </div>
  <div id="gb-advice-page-form-tab-container" class="gb-hide gb-panel-form">
    
  </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none gb-background-light-grey-1">
  <div class="row">
    <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-7 gb-skill-leftbar">
      <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-advice-pages-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Advice Pages</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
      <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-advice-pages-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Advice Pages</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
    </ul>
  </div>
  <br>
  <div class="tab-content row gb-side-margin-thick gb-padding-none gb-background-light-grey-1">
    <div class="tab-pane active" id="gb-advice-pages-all-pane">
      <h3 class="gb-heading-2">Recent Advice Pages</h3>
      <br>
      <div id="skill-posts"class="panel-body gb-padding-none gb-background-light-grey-1">
        <?php foreach ($advicePages as $advicePage): ?>
          <?php
          echo $this->renderPartial('pages.views.pages._skill_page_row', array(
           "advicePage" => $advicePage,
          ));
          ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="tab-pane" id="gb-my-advice-pages-pane">
      <h3 class="gb-heading-2">My Advice Pages</h3>
    </div>
  </div>
</div>
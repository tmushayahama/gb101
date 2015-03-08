<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Timeline</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $skillTimelineDaysCount; ?></i>
   </div>
  </h5>

  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding"
         type="text"
         data-gb-target-container="#gb-timeline-form-container"
         data-gb-target="#gb-timeline-form"
         readonly
         placeholder="Write a Timeline"
         />
  <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
   <div class="row">
    <?php
    $this->renderPartial('timeline.views.timeline.forms._timeline_form', array(
      "formId" => "gb-timeline-form",
      "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillTimeline", array("skillId" => $skill->id)),
      "prependTo" => "#gb-skill-timelines-overview",
      'timelineModel' => $timelineModel,
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
    ));
    ?>
   </div>
  </div>
 </div>
 <!--
 <div class="row">
  <ul class="timeline col-lg-12">
   <li>
    <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
      <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
     </div>
    </div>
   </li>
   <li class="timeline-inverted">
    <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
      <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
     </div>
    </div>
   </li>
   <li>
    <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
     </div>
    </div>
   </li>
   <li class="timeline-inverted">
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
     </div>
    </div>
   </li>
   <li>
    <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
      <hr>
      <div class="btn-group">
       <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li><a href="#">Separated link</a></li>
       </ul>
      </div>
     </div>
    </div>
   </li>
   <li>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
     </div>
    </div>
   </li>
   <li class="timeline-inverted">
    <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
     </div>
     <div class="timeline-body">
      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
     </div>
    </div>
   </li>
  </ul>
 </div>
 -->

 <div id="gb-skill-timelines-overview"
      class="row gb-post-entry"
      data-gb-source-pk="<?php echo $skill->id; ?>"
      data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>"
      data-gb-del-message-key="TIMELINE">
  <ul class="gb-timeline col-lg-12 col-md-12 col-sm-12">
   <?php
   $this->renderPartial('skill.views.skill.activity.timeline._skill_timelines', array(
     "skill" => $skill,
     "skillTimelineDays" => $skillTimelineDays,
     "skillTimelineDaysCount" => $skillTimelineDaysCount,
     "offset" => 1
   ));
   ?>
   <?php
   if ($skillTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE):
    ?>
    <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
       gb-purpose="redirects"
       gb-target="a[href='#gb-skill-item-timelines-pane']">
     see more
    </a>
   <?php endif; ?>
  </ul>
 </div>
</div>


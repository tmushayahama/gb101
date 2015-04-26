<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-skill-item row" gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
     data-gb-source-pk="<?php echo $skill->id; ?>">
 <div class="row">
  <div class="gb-icon-nav row">
   <ul id="" class="gb-icon-top-nav-1 row gb-nav">
    <li class="active col-lg-8 col-sm-2 col-xs-12">
     <a  class="gb-link" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillOverview", array('skillId' => $skill->id)); ?>"
         data-gb-target-pane-id="#gb-skill-item-tab-pane">
      <p class="gb-title gb-ellipsis">
       <strong><?php echo $skill->title; ?></strong>
       <?php echo " " . $skill->description; ?>
      </p>
     </a>
    </li>
    <li class="col-lg-1 col-sm-2 col-xs-12">
     <a  class="gb-link" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillComments", array('skillId' => $skill->id)); ?>"
         data-gb-target-pane-id="#gb-skill-item-tab-pane">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     </a>
    </li>
    <li class="col-lg-1 col-sm-2 col-xs-12">
     <a  class="gb-link" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillNotes", array('skillId' => $skill->id)); ?>"
         data-gb-target-pane-id="#gb-skill-item-tab-pane">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     </a>
    </li>
    <li class="col-lg-1 col-sm-2 col-xs-12">
     <a href="#gb-skill-item-contributors-pane" data-toggle="tab"
        data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContributors", array('skillId' => $skill->id)); ?>"
        data-gb-target-pane-id="#gb-skill-item-tab-pane">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     </a>
    </li>
    <li class="col-lg-1 col-sm-2 col-xs-12 gb-no-">
     <a href="#gb-skill-item-contributors-pane" data-toggle="tab"
        data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContributors", array('skillId' => $skill->id)); ?>"
        data-gb-target-pane-id="#gb-skill-item-tab-pane">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     </a>
    </li>
   </ul>
  </div>
 </div>
 <div class="tab-content">
  <div class="tab-pane active">
   <div id="gb-skill-item-tab-pane" class="row gb-tab-pane-body gb-padding-medium">
    <?php
    $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_overview_pane', array(
      'skill' => $skill,
      'skillId' => $skillId,
      //CONTRIBUTOR
      "contributorModel" => $contributorModel,
      "contributorTypes" => $contributorTypes,
      "skillContributors" => $skillContributors,
      "skillContributorsCount" => $skillContributorsCount,
      //COMMENT
      'commentModel' => $commentModel,
      'skillComments' => $skillComments,
      'skillCommentsCount' => $skillCommentsCount,
      //DISCUSSION
      "discussionModel" => $discussionModel,
      'skillDiscussions' => $skillDiscussions,
      'skillDiscussionsCount' => $skillDiscussionsCount,
      //NOTES
      "noteModel" => $noteModel,
      'skillNotes' => $skillNotes,
      'skillNotesCount' => $skillNotesCount,
      //TODO
      "todoModel" => $todoModel,
      "todoPriorities" => $todoPriorities,
      'skillTodos' => $skillTodos,
      'skillTodosCount' => $skillTodosCount,
      //WEBLINKS
      "weblinkModel" => $weblinkModel,
      'skillWeblinks' => $skillWeblinks,
      'skillWeblinksCount' => $skillWeblinksCount,
      //TIMELINE
      'timelineModel' => $timelineModel,
      'skillTimelineDays' => $skillTimelineDays,
      'skillTimelineDaysCount' => $skillTimelineDaysCount,
    ))
    ?>
    <br>
   </div>
  </div>

 </div>
</div>


<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-skill-item row" gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
     data-gb-source-pk="<?php echo $skill->id; ?>">
 <div class="gb-box-3 gb-background-white">
  <div class="row gb-bottom-border-grey-1 gb-padding-medium">
   <?php
   $this->renderPartial('skill.views.skill.activity.skill._skill_item_row', array(
     "skill" => $skill,
   ));
   ?>
  </div>
  <div class="row ">
   <div class="gb-icon-nav row">
    <ul id="" class="gb-icon-top-nav-1 row ">
     <li class="active col-lg-2 col-sm-2 col-xs-12">
      <a href="#gb-skill-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillOverview", array('skillId' => $skill->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/overview_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <h6 class="gb-small-text">Activities</h6>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-skill-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillTodos", array('skillId' => $skill->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/todo_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <h6 class="gb-small-text">Todos</h6>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="row" href="#gb-skill-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillComments", array('skillId' => $skill->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <h6 class="gb-small-text">Comments</h6>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="row" href="#gb-skill-item-notes-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillNotes", array('skillId' => $skill->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <h6 class="gb-small-text">Notes</h6>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="row" href="#gb-skill-item-contributors-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContributors", array('skillId' => $skill->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <h6 class="gb-small-text">Contributors</h6>
      </a>
     </li>

     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" data-toggle="dropdown">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/more_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <h6 class="gb-small-text">More</h6>
      </a>
      <ul class="dropdown-menu" role="menu">
       <li>
        <a class="row" href="#gb-skill-welcome-note-pane" data-toggle="tab"
           gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillSkills", array('skillListId' => $skill->id)); ?>">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
        </a>
       </li>
      </ul>
     </li>
    </ul>
   </div>
  </div>
 </div>
 <div class="tab-content">
  <div class="tab-pane active" id="gb-skill-item-tab-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_overview_pane', array(
      'skill' => $skill,
      //'skillChecklists' => $skillChecklists,
      //'skillChecklistsCount' => $skillChecklistsCount,
      //'skillChecklistsProgressCount' => $skillChecklistsProgressCount,
      // 'skillContributors' => $skillContributors,
      // 'skillContributorsCount' => $skillContributorsCount,
      'skillComments' => $skillComments,
      'skillCommentsCount' => $skillCommentsCount,
      // 'skillNotes' => $skillNotes,
      // 'skillNotesCount' => $skillNotesCount,
      //'skillWeblinks' => $skillWeblinks,
      // 'skillWeblinksCount' => $skillWeblinksCount,
    ))
    ?>
    <br>
   </div>
  </div>

 </div>
</div>


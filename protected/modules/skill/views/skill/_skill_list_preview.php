
<?php foreach (Level::getLevels(Level::$LEVEL_CATEGORY_SKILL) as $skillLevel): ?>
  <div class="gb-list-preview panel panel-default panel-borderless"
       gb-level-id="<?php echo $skillLevel->id; ?>">
    <h4 class="gb-heading-1">
      <?php echo $skillLevel->level_name; ?>
      <span class="pull-right badge badge-info"><?php echo SkillList::getSkillListCount(Level::$LEVEL_CATEGORY_SKILL, $skillLevel->id, Yii::app()->user->id); ?></span>
    </h4>
    <div class="panel-body gb-no-padding row">
      <?php
      $count = 1;
      foreach (SkillList::getSkillList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, array($skillLevel->id), 5) as $skillListItem):
        echo $this->renderPartial('_skill_preview_list_row', array(
         'skillListItem' => $skillListItem));
      endforeach;
      ?>
    </div>
  </div>
<?php endforeach; ?>


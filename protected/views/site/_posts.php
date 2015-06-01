<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>

<div id="gb-posts" class="panel-body gb-padding-none gb-background-light-grey-1">
  <br>
  <h3 class="gb-heading-2"><?php echo $heading; ?></h3>
  <br>
  <?php
  $count = 1;
  foreach ($postShares as $postShare):
    switch ($postShare->post->type) {
      case Post::$TYPE_GOAL_LIST:
        $skill = Skill::model()->findByPk($postShare->post->source_id);
        echo $this->renderPartial('skill.views.skill._skill_post_row', array(
         'skill' => $skill,
         'source' => Skill::$SOURCE_SKILL
        ));
        break;
      case Post::$TYPE_MENTORSHIP:
        $mentorship = Mentorship::model()->findByPk($postShare->post->source_id);
        echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
         "mentorship" => $mentorship,
        ));
        break;
      case Post::$TYPE_NEED_MENTEE:
        $mentorshipRequest = Notification::model()->findByPk($postShare->post->source_id);
        if ($mentorshipRequest != null) {
          echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
           "mentorshipRequest" => $mentorshipRequest,
          ));
        }
        break;
      case Post::$TYPE_ADVICE_PAGE:
        $advicePage = AdvicePage::model()->findByPk($postShare->post->source_id);
        echo $this->renderPartial('pages.views.pages._goal_page_row', array(
         "advicePage" => $advicePage,
        ));
        break;
    }
  endforeach;
  ?>
</div>
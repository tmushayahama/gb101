<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($hobbyQuestionnairesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no questionnaires
 </h5>
<?php endif; ?>

<?php
$questionnaireCounter = 1;
foreach ($hobbyQuestionnaires as $hobbyQuestionnaire):
 ?>
 <?php
 $this->renderPartial('questionnaire.views.questionnaire.activity._questionnaire_parent', array(
   "questionnaire" => $hobbyQuestionnaire->questionnaire,
   "questionnaireCounter" => $questionnaireCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Questionnaire::$QUESTIONNAIRES_PER_PAGE;
if ($offset < $hobbyQuestionnairesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_HOBBY_QUESTIONNAIRE; ?>"
    data-gb-source-pk="<?php echo $hobbyId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-hobby-questionnaires">
  More Questionnaires
 </a>
<?php endif; ?>


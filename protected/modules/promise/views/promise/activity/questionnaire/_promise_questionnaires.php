<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($promiseQuestionnairesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no questionnaires
 </h5>
<?php endif; ?>

<?php
$questionnaireCounter = 1;
foreach ($promiseQuestionnaires as $promiseQuestionnaire):
 ?>
 <?php
 $this->renderPartial('questionnaire.views.questionnaire.activity._questionnaire_parent', array(
   "questionnaire" => $promiseQuestionnaire->questionnaire,
   "questionnaireCounter" => $questionnaireCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Questionnaire::$QUESTIONNAIRES_PER_PAGE;
if ($offset < $promiseQuestionnairesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_PROMISE_QUESTIONNAIRE; ?>"
    data-gb-source-pk="<?php echo $promiseId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-promise-questionnaires">
  More Questionnaires
 </a>
<?php endif; ?>


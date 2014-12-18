<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
 <div class="gb-heading-7b col-lg-12 col-sm-12 col-xs-12">
  <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
   <p class="gb-ellipsis">Welcome to Skills App</p>
  </div>
 </div>
</div>
<?php
$this->renderPartial('application.views.site.tools._stat_row', array(
  "posts" => $skillsGained,
  "postsCount" => $skillsGainedCount,
  "title" => "Skills Gained",
  "levelClass" => "gb-level-4"
));
?>
<br>
<?php
$this->renderPartial('application.views.site.tools._stat_row', array(
  "posts" => $skillsToImprove,
  "postsCount" => $skillsToImproveCount,
  "title" => "Skills To Improve",
  "levelClass" => "gb-level-3"
));
?>
<br>
<?php
$this->renderPartial('application.views.site.tools._stat_row', array(
  "posts" => $skillsToLearn,
  "postsCount" => $skillsToLearnCount,
  "title" => "Skills To Learn",
  "levelClass" => "gb-level-2"
));
?>

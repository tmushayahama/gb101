<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-discussion-posts-container">
  <?php foreach ($discussions as $discussion): ?>
    <?php
    echo $this->renderPartial('discussion.views.discussion._discussion_post_row', array(
     'discussion' => $discussion));
    ?>
  <?php endforeach; ?>
</div>




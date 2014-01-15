<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row-fluid gb-discussion-posts-container">
  <?php foreach ($discussions as $discussion): ?>
    <?php
    echo $this->renderPartial('discussion.views.discussion._discussion_post_row', array(
     'discussion' => $discussion));
    ?>
  <?php endforeach; ?>
</div>
<div class="row-fluid gb-discussion-posts-actions">
  <textarea class="gb-discussion-reply-text input-block-level" rows="2" placeholder="Your Reply Here"></textarea>
  <div class="gb-footer ">
    <button class="gb-discussion-reply-btn gb-btn gb-btn-blue-2">Reply</button>
    <button class="gb-discussion-cancel-reply-btn gb-btn gb-btn-grey-1">Cancel</button>
  </div>
</div>
<!-- these should be next to each other for JS-->
<input class="input-block-level gb-discussion-post-another-reply" placeholder="Click here to post another reply" 
       type="text" style="display: none;">




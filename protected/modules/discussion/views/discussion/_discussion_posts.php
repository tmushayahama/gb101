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
<div class="row gb-discussion-posts-actions">
  <textarea class="gb-discussion-reply-text col-lg-12 col-sm-12 col-xs-12" rows="2" placeholder="Your Reply Here"></textarea>
  <div class="gb-footer ">
    <button class="gb-discussion-reply-btn btn btn-xs btn-success">Reply</button>
    <button class="gb-discussion-cancel-reply-btn btn btn-xs btn-default">Cancel</button>
  </div>
</div>
<!-- these should be next to each other for JS-->
<input class="col-lg-12 col-sm-12 col-xs-12 gb-discussion-post-another-reply" placeholder="Click here to post another reply" 
       type="text" style="display: none;">




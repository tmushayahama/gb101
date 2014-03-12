<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-start-mentoring-modal" class="modal gb-modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Start Mentoring
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="modal-body">
    <div class="gb-pages-start-writing row-fluid">
      <div class="row-fluid">
        <p>
          <i>To manage the mentorship, you can only mentor a skill or a goal you've
            listed in your skill gained or goal achieved. 
          </i>
        </p>
        <input id="gb-start-mentoring-skill-name-input" type="text" class="input-block-level" readonly>
        <select id="gb-mentoring-level-selector" class="input-block-level">
          <option value="" disabled="disabled" selected="selected">Select Your Level</option>
          <?php for ($optionCount = 0; $optionCount < 4; $optionCount++): ?>
            <option value="<?php echo $optionCount; ?>"><?php echo Mentorship::$OPTION_LEVEL[$optionCount]; ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <button id="gb-start-mentorship-btn" class="gb-btn gb-btn-blue-2">Start Mentoring</button>
    </div>
  </div>
</div>


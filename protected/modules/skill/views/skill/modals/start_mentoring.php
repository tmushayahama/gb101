<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-start-mentoring-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Start Mentoring
      </div>
      <div class="modal-body">
        <div class="gb-pages-start-writing row">
          <p>
            <i>To manage the mentorship, you can only mentor a skill or a goal you've
              listed in your skill gained or goal achieved. 
            </i>
          </p>
          <div class="form-group row">
            <input id="gb-start-mentoring-skill-name-input" type="text" class="input-lg ol-lg-12 col-sm-12 col-xs-12" readonly>
          </div>
          <div class="form-group row">
            <select id="gb-mentoring-level-selector" class="input-lg col-lg-12 col-sm-12 col-xs-12">
              <option value="" disabled="disabled" selected="selected">Select Your Level</option>
              <?php for ($optionCount = 0; $optionCount < 4; $optionCount++): ?>
                <option value="<?php echo $optionCount; ?>"><?php echo Mentorship::$OPTION_LEVEL[$optionCount]; ?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="gb-start-mentorship-btn" class="btn btn-primary">Start Mentoring</a>
      </div>
    </div>
  </div>
</div>


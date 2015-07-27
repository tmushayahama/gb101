<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-input-append input-append">
  <div class="btn-group">
    <button id="gb-post-type-btn" class="btn dropdown-toggle span2" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>" data-toggle="dropdown">Skill Bank</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_LIST_BANK; ?>">Skill Bank</a></li>
      <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_MENTORSHIP; ?>">Mentorships</a></li>
      <li><a class="gb-search-type" search-type="<?php echo Post::$TYPE_ADVICE; ?>">Advice Pages</a></li>
      <li><a class="gb-search-type" >People</a></li>
    </ul>
  </div>
  <input class="span8" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
  <div class="btn-group">
    <button id="gb-keyword-search-btn" class="btn span2" >
      Search
    </button>
  </div>
</div>


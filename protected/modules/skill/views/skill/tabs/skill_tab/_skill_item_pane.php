<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="gb-skill-item row" gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
     data-gb-source-pk="<?php echo $skill->id; ?>">
 <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
    <div id="myCarousel" class="carousel slide profile-carousel" data-ride="carousel">
     <div class="air air-bottom-right padding-10">
      <a href="" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Follow</a>&nbsp; <a href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-link"></i> Connect</a>
     </div>
     <div class="air air-top-left padding-10">
      <h4 class="txt-color-white font-md">Jan 1, 2014</h4>
     </div>
     <ol class="carousel-indicators" role="listbox">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
     </ol>
     <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="item active">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/demo/s1.jpg"; ?>" alt="demo user">
      </div>
      <!-- Slide 2 -->
      <div class="item">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/demo/s2.jpg"; ?>" alt="demo user">
      </div>
      <!-- Slide 3 -->
      <div class="item">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/demo/m3.jpg"; ?>" alt="demo user">
      </div>
     </div>
     <!-- Controls -->
     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
     </a>
    </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
    <div class="row">
     <div class="col-sm-3 profile-pic">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
      <div class="padding-10">
       <h4 class="font-md"><strong>41</strong>
        <br>
        <small>Contributors</small></h4>
      </div>
     </div>
     <div class="col-sm-6">
      <h4 class="gb-title">
       By: <a class="gb-ellipsis">
        <?php
        echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
        ?>
       </a>
      </h4>
      <?php
      $this->renderPartial('skill.views.skill.activity.skill._skill_item_heading', array(
        'skill' => $skill,
        'skillLevelList' => $skillLevelList
      ));
      ?>
      <br>
      <a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a>
      <br>
      <br>

     </div>
     <div class="col-sm-3">
      <h1><small>Contributors</small></h1>
      <ul class="list-inline friends-list">
       <li><img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/1.png"; ?>" alt="friend-1">
       </li>
       <li><img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/2.png"; ?>" alt="friend-2">
       </li>
       <li><img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/3.png"; ?>" alt="friend-3">
       </li>
       <li><img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/4.png"; ?>" alt="friend-4">
       </li>
       <li><img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/5.png"; ?>" alt="friend-5">
       </li>
       <li><img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="friend-6">
       </li>
       <li>
        <a>41 more</a>
       </li>
      </ul>

      <h1><small>Recent visitors</small></h1>
      <ul class="list-unstyled">
       <li>
        <p class="gb-ellipsis gb-description">
         <strong class="text-info"><?php echo $skill->level->name; ?></strong>
        </p>
       </li>
       <li>
        <p class="gb-ellipsis gb-description">
         Created on
         <i>
          <a>
           <?php echo date_format(date_create($skill->created_date), 'M jS \a\t g:ia'); ?>
          </a>
         </i>
        </p>
       </li>
       <li>
        <p class="gb-ellipsis gb-description">
         <a class="gb-faded-link"><i class="fa fa-share"></i> Share</a> •
         <a class="gb-faded-link"><i class="fa fa-clipboard"></i> Clone Request</a>
        </p>
       </li>
      </ul>
      <br>

     </div>

    </div>

   </div>


   <div class="row">

    <div class="col-sm-12">

     <hr>

     <div class="padding-10">
      <div class="row">
       <div class="gb-icon-nav row">
        <ul id="" class="gb-icon-top-nav-1 row gb-nav">
         <li class="active col-lg-9 col-sm-2 col-xs-12">
          <a  class="gb-link" data-toggle="tab"
              data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillOverview", array('skillId' => $skill->id)); ?>"
              data-gb-target-pane-id="#gb-skill-item-tab-pane">
           <p class="gb-title gb-ellipsis">
            <strong><?php echo $skill->title; ?></strong>
            <?php echo " " . $skill->description; ?>
           </p>
          </a>
         </li>
         <li class="col-lg-1 col-sm-2 col-xs-12">
          <a  class="gb-link" data-toggle="tab"
              data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContent", array('skillId' => $skill->id)); ?>"
              data-gb-target-pane-id="#gb-skill-item-tab-pane">
           <i class="fa fa-files-o"></i>
          </a>
         </li>
         <li class="col-lg-1 col-sm-2 col-xs-12">
          <a  class="gb-link" data-toggle="tab"
              data-gb-url="<?php echo Yii::app()->createUrl('skill/skillTab/skillContribution', array('skillId' => $skill->id)); ?>"
              data-gb-target-pane-id="#gb-skill-item-tab-pane">
           <i class="fa fa-users"></i>
          </a>
         </li>
         <li class="col-lg-1 col-sm-2 col-xs-12 gb-no-">
          <a href="#gb-skill-item-contributors-pane" data-toggle="tab"
             data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillSettings", array('skillId' => $skill->id)); ?>"
             data-gb-target-pane-id="#gb-skill-item-tab-pane">
           <i class="fa fa-cog"></i>
          </a>
         </li>
        </ul>
       </div>
      </div>

      <ul class="gb-hide nav nav-tabs tabs-pull-right">
       <li class="active">
        <a href="#a1" data-toggle="tab">Recent Articles</a>
       </li>
       <li>
        <a href="#a2" data-toggle="tab">New Members</a>
       </li>
       <li class="pull-left">
        <span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
       </li>
      </ul>

      <div class="tab-content padding-top-10">
       <div class="tab-pane fade in active" id="a1">

        <div class="row">

         <div class="col-xs-2 col-sm-1">
          <time datetime="2014-09-20" class="icon">
           <strong>Jan</strong>
           <span>10</span>
          </time>
         </div>

         <div class="col-xs-10 col-sm-11">
          <h6 class="no-margin"><a href="javascript:void(0);">Allice in Wonderland</a></h6>
          <p>
           Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi Nam eget dui.
           Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
           sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel.
          </p>
         </div>

         <div class="col-sm-12">

          <hr>

         </div>

         <div class="col-xs-2 col-sm-1">
          <time datetime="2014-09-20" class="icon">
           <strong>Jan</strong>
           <span>10</span>
          </time>
         </div>

         <div class="col-xs-10 col-sm-11">
          <h6 class="no-margin"><a href="javascript:void(0);">World Report</a></h6>
          <p>
           Morning our be dry. Life also third land after first beginning to evening cattle created let subdue you'll winged don't Face firmament.
           You winged you're was Fruit divided signs lights i living cattle yielding over light life life sea, so deep.
           Abundantly given years bring were after. Greater you're meat beast creeping behold he unto She'd doesn't. Replenish brought kind gathering Meat.
          </p>
         </div>

         <div class="col-sm-12">

          <br>

         </div>

        </div>

       </div>
       <div class="tab-pane fade" id="a2">

        <div class="alert alert-info fade in">
         <button class="close" data-dismiss="alert">
          ×
         </button>
         <i class="fa-fw fa fa-info"></i>
         <strong>51 new members </strong>joined today!
        </div>

        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/female.png"; ?>" alt="demo user"><a href="javascript:void(0);">Jenn Wilson</a>
         <div class="email">
          travis@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Marshall Hitt</a>
         <div class="email">
          marshall@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Joe Cadena</a>
         <div class="email">
          joe@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Mike McBride</a>
         <div class="email">
          mike@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Travis Wilson</a>
         <div class="email">
          travis@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Marshall Hitt</a>
         <div class="email">
          marshall@company.com
         </div>
        </div>
        <div class="user" title="Joe Cadena joe@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Joe Cadena</a>
         <div class="email">
          joe@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Mike McBride</a>
         <div class="email">
          mike@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Marshall Hitt</a>
         <div class="email">
          marshall@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);">Joe Cadena</a>
         <div class="email">
          joe@company.com
         </div>
        </div>
        <div class="user" title="email@company.com">
         <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/male.png"; ?>" alt="demo user"><a href="javascript:void(0);"> Mike McBride</a>
         <div class="email">
          mike@company.com
         </div>
        </div>

        <div class="text-center">
         <ul class="pagination pagination-sm">
          <li class="disabled">
           <a href="javascript:void(0);">Prev</a>
          </li>
          <li class="active">
           <a href="javascript:void(0);">1</a>
          </li>
          <li>
           <a href="javascript:void(0);">2</a>
          </li>
          <li>
           <a href="javascript:void(0);">3</a>
          </li>
          <li>
           <a href="javascript:void(0);">...</a>
          </li>
          <li>
           <a href="javascript:void(0);">99</a>
          </li>
          <li>
           <a href="javascript:void(0);">Next</a>
          </li>
         </ul>
        </div>

       </div><!-- end tab -->
      </div>

     </div>

    </div>

   </div>
   <!-- end row -->


   <div class="col-sm-12 col-md-12 col-lg-6">

    <form method="post" class="well padding-bottom-10" onsubmit="return false;">
     <textarea rows="2" class="form-control" placeholder="What are you thinking?"></textarea>
     <div class="margin-top-10">
      <button type="submit" class="btn btn-sm btn-primary pull-right">
       Post
      </button>
      <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
      <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Voice"><i class="fa fa-microphone"></i></a>
      <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Photo"><i class="fa fa-camera"></i></a>
      <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add File"><i class="fa fa-file"></i></a>
     </div>
    </form>

    <div class="timeline-seperator text-center"> <span>10:30PM January 1st, 2013</span>
     <div class="btn-group pull-right">
      <a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
      <ul class="dropdown-menu text-left">
       <li>
        <a href="javascript:void(0);">Hide this post</a>
       </li>
       <li>
        <a href="javascript:void(0);">Hide future posts from this user</a>
       </li>
       <li>
        <a href="javascript:void(0);">Mark as spam</a>
       </li>
      </ul>
     </div>
    </div>
    <div class="chat-body no-padding profile-message">
     <ul>
      <li class="message">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/sunny.png"; ?>" class="online" alt="sunny">
       <span class="message-text"> <a href="javascript:void(0);" class="username">John Doe <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very
        image let unto fowl isn't in blessed fill life yielding above all moved </span>
       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-muted">Show All Comments (14)</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-primary">Edit</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger">Delete</a>
        </li>
       </ul>
      </li>
      <li class="message message-reply">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/3.png"; ?>" class="online" alt="user">
       <span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-muted">1 minute ago </a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
       </ul>

      </li>
      <li class="message message-reply">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/4.png"; ?>" class="online" alt="user">
       <span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-muted">a moment ago </a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
       </ul>
       <input class="form-control input-xs" placeholder="Type and enter" type="text">
      </li>
     </ul>

    </div>

    <div class="timeline-seperator text-center"> <span>11:30PM November 27th, 2013</span>
     <div class="btn-group pull-right">
      <a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
      <ul class="dropdown-menu text-left">
       <li>
        <a href="javascript:void(0);">Hide this post</a>
       </li>
       <li>
        <a href="javascript:void(0);">Hide future posts from this user</a>
       </li>
       <li>
        <a href="javascript:void(0);">Mark as spam</a>
       </li>
      </ul>
     </div>
    </div>
    <div class="chat-body no-padding profile-message">
     <ul>
      <li class="message">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/1.png"; ?>" class="online" alt="user">
       <span class="message-text"> <a href="javascript:void(0);" class="username">John Doe <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very image let unto fowl isn't in blessed fill life yielding above all moved </span>
       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-muted">Show All Comments (14)</a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-primary">Hide</a>
        </li>
       </ul>
      </li>
      <li class="message message-reply">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/3.png"; ?>" class="online" alt="user">
       <span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-muted">1 minute ago </a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
       </ul>

      </li>
      <li class="message message-reply">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/4.png"; ?>" class="online" alt="user">
       <span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-muted">a moment ago </a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
       </ul>

      </li>
      <li class="message message-reply">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/avatars/4.png"; ?>" class="online" alt="user">
       <span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

       <ul class="list-inline font-xs">
        <li>
         <a href="javascript:void(0);" class="text-muted">a moment ago </a>
        </li>
        <li>
         <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
        </li>
       </ul>

      </li>
      <li>
       <div class="input-group wall-comment-reply">
        <input id="btn-input" type="text" class="form-control" placeholder="Type your message here...">
        <span class="input-group-btn">
         <button class="btn btn-primary" id="btn-chat">
          <i class="fa fa-reply"></i> Reply
         </button> </span>
       </div>
      </li>
     </ul>

    </div>


   </div>
  </div>




  <div class="gb-app-item-heading row">
   <div class="col-lg-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-7 gb-padding-left-1 text-left">
    <p class="gb-title">
     <a class="gb-ellipsis">
      <?php
      echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
      ?>
     </a>
    </p>
    <p class="gb-ellipsis gb-description">
     <strong><?php echo $skill->level->name; ?></strong>
    </p>
    <div class="gb-ellipsis gb-description">
     Created on
     <i>
      <a>
       <?php echo date_format(date_create($skill->created_date), 'M jS \a\t g:ia'); ?>
      </a>
     </i>
    </div>
    <p class="gb-ellipsis gb-description">
     <a class="gb-faded-link"><i class="fa fa-share"></i> Share</a> •
     <a class="gb-faded-link"><i class="fa fa-clipboard"></i> Clone Request</a>
    </p>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-thinner">
    <div class="row">
     <a class="btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12" data-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-star"></i> Subscribe
     </a>
     <br>
     <a class="btn dropdown-toggle btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12"
        gb-purpose="gb-expandables-modal-trigger"
        data-gb-modal-target="#gb-contribute-modal">
      <i class="fa fa-user-plus"></i> Contribute
     </a>
    </div>
   </div>
  </div>
  <div class="tab-content">
   <div class="tab-pane active">
    <div id="gb-skill-item-tab-pane" class="row gb-tab-pane-body gb-padding-medium">
     <?php
     $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_overview_pane', array(
       'skill' => $skill,
       'skillId' => $skillId,
       "skillLevelList" => $skillLevelList,
       //CONTRIBUTOR
       "contributorModel" => $contributorModel,
       "contributorTypes" => $contributorTypes,
       "skillContributors" => $skillContributors,
       "skillContributorsCount" => $skillContributorsCount,
       //COMMENT
       'commentModel' => $commentModel,
       'skillComments' => $skillComments,
       'skillCommentsCount' => $skillCommentsCount,
       //DISCUSSION
       "discussionModel" => $discussionModel,
       'skillDiscussions' => $skillDiscussions,
       'skillDiscussionsCount' => $skillDiscussionsCount,
       //NOTES
       "noteModel" => $noteModel,
       'skillNotes' => $skillNotes,
       'skillNotesCount' => $skillNotesCount,
       //TODO
       "todoModel" => $todoModel,
       "todoPriorities" => $todoPriorities,
       'skillTodos' => $skillTodos,
       'skillTodosCount' => $skillTodosCount,
       //WEBLINKS
       "weblinkModel" => $weblinkModel,
       'skillWeblinks' => $skillWeblinks,
       'skillWeblinksCount' => $skillWeblinksCount,
       //TIMELINE
       'timelineModel' => $timelineModel,
       'skillTimelineDays' => $skillTimelineDays,
       'skillTimelineDaysCount' => $skillTimelineDaysCount,
     ))
     ?>
     <br>
    </div>
   </div>
  </div>
 </div>
</div>


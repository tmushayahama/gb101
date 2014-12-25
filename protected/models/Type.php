<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Type {

 PUBLIC STATIC $NO_CONTENT_SKILL = 1;
 PUBLIC STATIC $NO_CONTENT_GOAL = 2;
 PUBLIC STATIC $NO_CONTENT_PROMISE = 3;
 PUBLIC STATIC $NO_CONTENT_HOBBY = 4;
 public static $SKILL_SHARE = 1;
 public static $GOAL_SHARE = 2;
 public static $PROMISE_SHARE = 3;
 public static $HOBBY_SHARE = 4;
 public static $MENTORSHIP_SHARE = 1;
 public static $PAGE_SHARE = 2;
 public static $REQUEST_SHARE = 3;

 /* Sharing */
 public static $SHARE_PRIVATE = 0;
 public static $SHARE_PUBLIC = 1;
 public static $SHARE_CUSTOMIZE = 2;

 /* Delete Target */
 public static $SOURCE_GENERAl = 0;
 public static $SOURCE_SKILL = 1;
 public static $SOURCE_MENTORSHIP = 2;
 public static $SOURCE_PAGE = 3;
 public static $SOURCE_QUESTION = 4;
 public static $SOURCE_ANSWER = 5;
 public static $SOURCE_TIMELINE = 6;
 public static $SOURCE_ANNOUNCEMENT = 7;
 public static $SOURCE_TODO = 8;
 public static $SOURCE_WEBLINK = 9;
 public static $SOURCE_MENTORSHIP_ASK_QUESTION = 10;
 public static $SOURCE_MENTORSHIP_ASK_ANSWER = 11;
 public static $SOURCE_DISCUSSION_TITLE = 12;
 public static $SOURCE_DISCUSSION_POST = 13;
 public static $SOURCE_PROJECT = 14;
 public static $SOURCE_MENTOR_REQUESTS = 15;
 public static $SOURCE_MENTEE_REQUESTS = 16;
 public static $SOURCE_MENTORSHIP_ASSIGNMENT_REQUESTS = 17;
 public static $SOURCE_PROJECT_MEMBER_REQUESTS = 18;
 public static $SOURCE_HOBBY_ASSIGN_REQUESTS = 19;
 public static $SOURCE_OBSERVER_REQUESTS = 20;
 public static $SOURCE_JUDGE_REQUESTS = 21;
 public static $SOURCE_NOTIFICATION = 22;
 public static $SOURCE_COMMENT = 23;
 public static $SOURCE_QUESTIONNAIRE = 24;
 public static $SOURCE_SKILL_TODO = 25;
 public static $SOURCE_DISCUSSION = 26;
 public static $SOURCE_NOTE = 27;
 public static $SOURCE_SKILL_NOTE = 28;
 public static $SOURCE_SKILL_DISCUSSION = 29;
 public static $SOURCE_SKILL_WEBLINK = 30;
 public static $SOURCE_SKILL_COMMENT = 31;
 public static $SOURCE_SKILL_QUESTIONNAIRE = 32;
 public static $SOURCE_PERSON = 33;
 public static $SOURCE_CONTRIBUTOR = 34;
 public static $SOURCE_SKILL_CONTRIBUTOR = 35;
 //GOAL
 public static $SOURCE_GOAL_TODO = 36;
 public static $SOURCE_GOAL = 37;
 public static $SOURCE_GOAL_NOTE = 38;
 public static $SOURCE_GOAL_DISCUSSION = 39;
 public static $SOURCE_GOAL_WEBLINK = 40;
 public static $SOURCE_GOAL_COMMENT = 41;
 public static $SOURCE_GOAL_QUESTIONNAIRE = 42;
 public static $SOURCE_GOAL_CONTRIBUTOR = 43;
 //HOBBY
 public static $SOURCE_HOBBY_TODO = 44;
 public static $SOURCE_HOBBY = 45;
 public static $SOURCE_HOBBY_NOTE = 46;
 public static $SOURCE_HOBBY_DISCUSSION = 47;
 public static $SOURCE_HOBBY_WEBLINK = 48;
 public static $SOURCE_HOBBY_COMMENT = 49;
 public static $SOURCE_HOBBY_QUESTIONNAIRE = 50;
 public static $SOURCE_HOBBY_CONTRIBUTOR = 51;
 //PROMISE
 public static $SOURCE_PROMISE_TODO = 52;
 public static $SOURCE_PROMISE = 53;
 public static $SOURCE_PROMISE_NOTE = 54;
 public static $SOURCE_PROMISE_DISCUSSION = 55;
 public static $SOURCE_PROMISE_WEBLINK = 56;
 public static $SOURCE_PROMISE_COMMENT = 57;
 public static $SOURCE_PROMISE_QUESTIONNAIRE = 58;
 public static $SOURCE_PROMISE_CONTRIBUTOR = 59;

 /* Source Type */
 public static $SOURCE_TYPE_PARENT = 1;
 public static $SOURCE_TYPE_CHILD = 2;

 /* Forms */
 public static $FORM_SKILL = 0;
 public static $FORM_GOAL = 1;
 public static $FORM_HOBBY = 2;
 public static $FORM_PROMISE = 3;
 public static $FORM_MENTORSHIP = 1;
 public static $FORM_PAGE = 2;

 /* DELETE TYPE */
 public static $DEL_TYPE_REMOVE = 0;
 public static $DEL_TYPE_REPLACE = 1;

 /* AJAX RETYPE TYPE */
 public static $AJAX_RETURN_ACTION_PREPEND = 1;
 public static $AJAX_RETURN_ACTION_EDIT = 2;
 public static $AJAX_RETURN_ACTION_REDIRECTS = 3;
 public static $AJAX_RETURN_ACTION_REPLACE = 4;
 public static $AJAX_RETURN_ACTION_NOTIFY = 5;

 /* TAGS */
 public static $SKILL_TAG = 0;
 public static $GOAL_TAG = 1;
 public static $HOBBY_TAG = 2;
 public static $PROMISE_TAG = 3;
 public static $PRIVACY = array("Private", "Public", "Customized");

 /* Row Types */
 public static $ROW_TYPE_NAV = 1;

}

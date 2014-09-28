<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Type {

  public static $SKILL_SHARE = 0;
  public static $MENTORSHIP_SHARE = 1;
  public static $PAGE_SHARE = 2;
  public static $REQUEST_SHARE = 3;

  /* Sharing */
  public static $SHARE_PRIVATE = 0;
  public static $SHARE_PUBLIC = 1;
  public static $SHARE_CUSTOMIZE = 2;

  /* Delete Target */
  public static $SOURCE_SKILL = 0;
  public static $SOURCE_MENTORSHIP = 1;
  public static $SOURCE_PAGE = 2;
  public static $SOURCE_QUESTION = 3;
  public static $SOURCE_ANSWER = 4;
  public static $SOURCE_TIMELINE = 5;
  public static $SOURCE_ANNOUNCEMENT = 6;
  public static $SOURCE_TODO = 7;
  public static $SOURCE_WEBLINK = 8;
  public static $SOURCE_MENTORSHIP_ASK_QUESTION = 9;
  public static $SOURCE_MENTORSHIP_ASK_ANSWER = 10;
  public static $SOURCE_DISCUSSION_TITLE = 11;
  public static $SOURCE_DISCUSSION_POST = 12;
  public static $SOURCE_NOTIFICATION = 13;
  public static $SOURCE_PROJECT = 14;
  public static $SOURCE_MENTOR_REQUESTS = 15;
  public static $SOURCE_MENTEE_REQUESTS = 16;
  public static $SOURCE_MENTORSHIP_ASSIGNMENT_REQUESTS = 17;
  public static $SOURCE_PROJECT_MEMBER_REQUESTS = 18;

  /* Forms */
  public static $FORM_SKILL = 0;
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

  /* TAGS */
  public static $SKILL_TAG = 0;

}

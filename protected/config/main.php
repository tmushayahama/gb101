<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
 'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
 'name' => 'Skill Section',
 'defaultController' => 'user/login',
 // preloading 'log' component
 'preload' => array('log'),
 // autoloading model and component classes
 'import' => array(
  'application.models.*',
  'application.components.*',
  'application.modules.user.models.*',
  'application.modules.user.components.*',
  'application.modules.goal.models.*',
  'application.modules.goal.components.*',
  'application.modules.hobby.models.*',
  'application.modules.hobby.components.*',
  'application.modules.skill.models.*',
  'application.modules.skill.components.*',
  'application.modules.promise.models.*',
  'application.modules.promise.components.*',
  'application.modules.connection.models.*',
  'application.modules.connection.components.*',
  'application.modules.message.models.*',
  'application.modules.message.components.*',
  'application.modules.pages.models.*',
  'application.modules.pages.components.*',
  'application.modules.project.models.*',
  'application.modules.project.components.*',
  'application.modules.journal.models.*',
  'application.modules.journal.components.*',
  'application.modules.group.models.*',
  'application.modules.group.components.*',
  'application.modules.mentorship.models.*',
  'application.modules.mentorship.components.*',
  'application.modules.templates.models.*',
  'application.modules.templates.components.*',
  'application.modules.todo.models.*',
  'application.modules.todo.components.*',
  'application.modules.rights.*',
  'application.modules.rights.components.*',
 ),
 'modules' => array(
  // uncomment the following to enable the Gii tool
  'user' => array(
   'tableUsers' => 'gb_user',
   'tableProfiles' => 'gb_profile',
   'tableProfileFields' => 'gb_profiles_field',
   # encrypting method (php hash function)
   'hash' => 'md5',
   # send activation email
   'sendActivationMail' => true,
   # allow access for non-activated users
   'loginNotActiv' => false,
   # activate user on registration (only sendActivationMail = false)
   'activeAfterRegister' => true,
   # automatically login from registration
   'autoLogin' => true,
   # registration path
   'registrationUrl' => array('/user/login'),
   # recovery password path
   'recoveryUrl' => array('/user/recovery'),
   # login form path
   'loginUrl' => array('/user/login'),
   # page after login
   //'returnUrl' => array('/site/home/connectionId/0'),
   'returnUrl' => array('/site/home'),
   # page after logout
   'returnLogoutUrl' => array('/user/login'),
  # profile
  //'profileUrl' => array('/user/profile'),
  ),
  'rights' => array(
   'install' => true,
  ),
  'goal',
  'hobby',
  'skill',
  'promise',
  'connection',
  'message',
  'pages',
  'project',
  'mentorship',
  'journal',
  'group',
  'templates',
  'todo',
  'gii' => array(
   'class' => 'system.gii.GiiModule',
   'password' => 'awesome++',
   // If removed, Gii defaults to localhost only. Edit carefully to taste.
   'ipFilters' => array('127.0.0.1', '::1'),
  ),
 ),
 // application components
 'components' => array(
  // do not use built-in jquery.js library
  'clientScript' => array(
   'class' => 'CClientScript',
   'scriptMap' => array(
    'jquery.js' => false,
   ),
   'coreScriptPosition' => CClientScript::POS_BEGIN,
  ),
  'user' => array(
   // enable cookie-based authentication
   'class' => 'RWebUser',
   'allowAutoLogin' => true,
   'loginUrl' => array('/user/login'),
  ),
  // uncomment the following to enable URLs in path-format
  'authManager' => array(
   'class' => 'RDbAuthManager',
   'connectionID' => 'db',
  ),
  'urlManager' => array(
   'urlFormat' => 'path',
   'showScriptName' => false,
   'rules' => array(
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
   ),
  ),
  // uncomment the following to use a MySQL database
  'db' => array(
   'connectionString' => 'mysql:host=localhost;dbname=goalbook',
   'emulatePrepare' => true,
   'username' => 'root',
   'password' => '',
   'charset' => 'utf8',
   'tablePrefix' => 'gb_',
  ),
  'errorHandler' => array(
   // use 'site/error' action to display errors
   'errorAction' => 'site/error',
  ),
  'log' => array(
   'class' => 'CLogRouter',
   'routes' => array(
    array(
     'class' => 'CFileLogRoute',
     'levels' => 'error, warning',
    ),
   // uncomment the following to show log messages on web pages
   /*
     array(
     'class'=>'CWebLogRoute',
     ),
    */
   ),
  ),
 ),
 // application-level parameters that can be accessed
 // using Yii::app()->params['paramName']
 'params' => array(
  // this is used in contact page
  'adminEmail' => 'tmtrigga@gmail.com',
 ),
);

<?php

class SearchController extends Controller {

  public function actionSearch($type, $keyword) {
//$keyword = Yii::app()->request->getParam('keyword');
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      $searchResults = $this->getSearch($type, $keyword, 50);
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);

      $this->render('search_guest', array(
       'searchResults' => $searchResults,
       'searchType' => $type,
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $searchResults = $this->getSearch($type, $keyword, 50);
      $this->render('search', array(
      'searchResults' => $searchResults,
      'searchType' => $type
      ));
    }
  }

  public function actionAjaxSearch() {
    if (Yii::app()->request->isAjaxRequest) {
      $keyword = Yii::app()->request->getParam('keyword');
      $type = Yii::app()->request->getParam('type');
      $searchResults = $this->getSearch($type, $keyword, 50);
      echo CJSON::encode(array(
       '_search_result' => $this->renderPartial('application.views.search._search_result', array(
        'searchResults' => $searchResults,
        'searchType' => $type)
         , true
         , true)));
    }
    Yii::app()->end();
  }

  private function getSearch($type, $keyword = null, $limit = null) {
    switch ($type) {
      case Post::$TYPE_PEOPLE:
        return Profile::getPeople();
      case Post::$TYPE_ADVICE_PAGE:
        return Page::getPages($keyword, $limit);
      case Post::$TYPE_LIST_BANK:
        return ListBank::getListBank(GoalType::$CATEGORY_SKILL, $keyword, null, $limit);
      case Post::$TYPE_MENTORSHIP:
        return Mentorship::getAllMentorshipList($keyword, $limit);
      case Post::$TYPE_MENTORSHIP_REQUEST:
        return null;
    }
  }

// Uncomment the following methods and override them if needed
  /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
   */
}

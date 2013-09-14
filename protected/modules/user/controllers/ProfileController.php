<?php

class ProfileController extends Controller {

	public $defaultAction = 'profile';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Shows a particular model.
	 */
	public function actionProfile() {
		$goalModel = new Goal;
		$connectionModel = new Connection;
		$userConnectionModel = new UserConnection;
		if (isset($_POST['UserConnection']['userIdList'])) {
			foreach ($_POST['UserConnection']['userIdList'] as $connectionId) {
				$userConnectionModel->connection_id = $connectionId;
				$userConnectionModel->owner_id = Yii::app()->user->id;
				$userConnectionModel->connection_member_id = $_POST['UserConnection']['connection_member_id'];
				$userConnectionModel->added_date = date("Y-m-d");
				$userConnectionModel->save(false);
				$userConnectionModel = new UserConnection;
			}
		}
		if (isset($_POST['Connection'])) {
			$connectionModel->attributes = $_POST['Connection'];
			$connectionModel->created_date = date("Y-m-d");
			if ($connectionModel->save()) {
				$createConnectionModel = new UserConnection;
				$createConnectionModel->owner_id = Yii::app()->user->id;
				$createConnectionModel->connection_member_id = Yii::app()->user->id;
				$createConnectionModel->connection_id = $connectionModel->id;
				$createConnectionModel->added_date = date("Y-m-d");
				$createConnectionModel->save(false);
			}
		}
		$this->render('profile', array(
				'goalModel' => $goalModel,
				'userConnectionModel' => $userConnectionModel,
				'connectionModel' => $connectionModel,
				'userConnections' => UserConnection::getUserConnections(),
				'goalTypes' => GoalType::Model()->findAll(),
				'posts' => GoalCommitment::getAllPost(0),
				'nonConnectionMembers' => UserConnection::getNonConnectionMembers(1, 4),
				'connectionMembers' => UserConnection::getConnectionMembers(1, 4),
				'todos' => GoalAssignment::getTodos()
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit() {
		$model = $this->loadUser();
		$profile = $model->profile;

		// ajax validator
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'profile-form') {
			echo UActiveForm::validate(array($model, $profile));
			Yii::app()->end();
		}

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			$profile->attributes = $_POST['Profile'];

			if ($model->validate() && $profile->validate()) {
				$model->save();
				$profile->save();
				Yii::app()->user->updateSession();
				Yii::app()->user->setFlash('profileMessage', UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			}
			else
				$profile->validate();
		}

		$this->render('edit', array(
				'model' => $model,
				'profile' => $profile,
		));
	}

	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {

			// ajax validator
			if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}

			if (isset($_POST['UserChangePassword'])) {
				$model->attributes = $_POST['UserChangePassword'];
				if ($model->validate()) {
					$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
					$new_password->password = UserModule::encrypting($model->password);
					$new_password->activkey = UserModule::encrypting(microtime() . $model->password);
					$new_password->save();
					Yii::app()->user->setFlash('profileMessage', UserModule::t("New password is saved."));
					$this->redirect(array("profile"));
				}
			}
			$this->render('changepassword', array('model' => $model));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser() {
		if ($this->_model === null) {
			if (Yii::app()->user->id)
				$this->_model = Yii::app()->controller->module->user();
			if ($this->_model === null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}

}
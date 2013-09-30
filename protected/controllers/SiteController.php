<?php

class SiteController extends Controller {

	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array(
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF,
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page' => array(
						'class' => 'CViewAction',
				),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionHome($connectionId) {
		$goalModel = new Goal;
		$connectionModel = new Connection;
		$userConnectionModel = new UserConnection;
		if (isset($_POST['UserConnection']['userIdList'])) {
			foreach ($_POST['UserConnection']['userIdList'] as $postConnectionId) {
				$userConnectionModel->connection_id = $postConnectionId;
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
		$this->render('home', array(
				'goalModel' => $goalModel,
				'userConnectionModel' => $userConnectionModel,
				'connectionModel' => $connectionModel,
				'activeConnectionId' => $connectionId,
				'userConnections' => UserConnection::getUserConnections(),
				'goalTypes' => GoalType::Model()->findAll(),
				'posts' => GoalCommitment::getAllPost($connectionId),
				'nonConnectionMembers' => UserConnection::getNonConnectionMembers($connectionId, 4),
				'connectionMembers' => UserConnection::getConnectionMembers($connectionId, 4),
				'todos' => GoalAssignment::getTodos()
		));
	}

	public function actionConnections() {
		$goalModel = new Goal;
		$connectionModel = new Connection;
		$userConnectionModel = new UserConnection;
		if (isset($_POST['UserConnection']['userIdList'])) {
			foreach ($_POST['UserConnection']['userIdList'] as $postConnectionId) {
				$userConnectionModel->connection_id = $postConnectionId;
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
		$this->render('connections', array(
				'goalModel' => $goalModel,
				'userConnectionModel' => $userConnectionModel,
				'connectionModel' => $connectionModel,
				'userConnections' => UserConnection::getUserConnections(),
				'goalTypes' => GoalType::Model()->findAll(),
				'nonConnectionMembers' => UserConnection::getNonConnectionMembers(1, 4),
				//'connectionMembers' => UserConnection::getConnectionMembers($connectionId, 4),
				'todos' => GoalAssignment::getTodos()
		));
	}

	public function actionCreateConnection() {
		if (Yii::app()->request->isAjaxRequest) {
			$connectionModel = new Connection;
			$connectionName = Yii::app()->request->getParam('connection_name');
			if (isset($_POST['Connection'])) {
				$connectionModel->attributes = $_POST['Connection'];
				$connectionModel->created_date = date("Y-m-d");
				if ($connectionModel->save()) {
					$userConnectionModel = new UserConnection;
					$userConnectionModel->owner_id = Yii::app()->user->id;
					$userConnectionModel->connection_member_id = Yii::app()->user->id;
					$userConnectionModel->connection_id = $connectionModel->id;
					$userConnectionModel->save();
					$this->actionHome($userConnectionModel->id);
				}
			}
			Yii::app()->end();
		}
	}

	public function actionRecordGoalCommitment($connectionId) {
		if (Yii::app()->request->isAjaxRequest) {
			$goalModel = new Goal;
			//$connectionId= Yii::app()->request->getParam('connection_id');
			if (isset($_POST['Goal'])) {
				$goalModel->attributes = $_POST['Goal'];
				//if ($goalCommitmentModel->validate()) {
				$goalModel->assign_date = date("Y-m-d");
				$goalModel->save(false);
				$connectionName = "";
				if ($connectionId == 0) {
					GoalCommitment::saveToAllCrcles($goalModel->id);
					$connectionName = "All";
				} else {
					$goalCommitmentModel = new GoalCommitment;
					$goalCommitmentModel->owner_id = Yii::app()->user->id;
					$goalCommitmentModel->goal_commitment_id = $goalModel->id;
					$goalCommitmentModel->connection_id = $connectionId;
					$goalCommitmentModel->save();
					$connectionName = $goalCommitmentModel->connection->name;
				}

				echo CJSON::encode(array(
						'new_goal_post' => $this->renderPartial('_goal_commitment_post', array(
								'description' => $goalModel->description,
								"title" => $goalModel->type->type,
								'connection_name' => $connectionName,
								"points_pledged" => $goalModel->points_pledged)
										, true)));
			}
			Yii::app()->end();
		}
	}

	public function actionDisplayAddConnectionMemberForm() {
		if (Yii::app()->request->isAjaxRequest) {
			$goalCommitmentModel = new GoalCommitment;
			$newConnectionMemberId = Yii::app()->request->getParam('new_connection_member_id');

			echo CJSON::encode(array(
					'memberExistInConnection' => UserConnection::getMemberExistInConnection($newConnectionMemberId)
			));
		}
		Yii::app()->end();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
								"Reply-To: {$model->email}\r\n" .
								"MIME-Version: 1.0\r\n" .
								"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}
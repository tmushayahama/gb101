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
	public function actionIndex() {
		$goalCommitmentModel = new GoalCommitment;
		$this->render('home', array(
				'goalCommitmentModel' => $goalCommitmentModel,
				'goalTypes' => GoalType::Model()->findAll(),
				'posts'=> GoalCommitment::getAllPost()
		));
	}

	public function actionRecordGoalCommitment() {
		if (Yii::app()->request->isAjaxRequest) {
			$goalCommitmentModel = new GoalCommitment;
			//$d= Yii::app()->request->getParam('current_task_id');
			if (isset($_POST['GoalCommitment'])) {
				$goalCommitmentModel->attributes = $_POST['GoalCommitment'];
			//if ($goalCommitmentModel->validate()) {
					$goalCommitmentModel->user_id = Yii::app()->user->id;
					$goalCommitmentModel->assign_date = date("Y-m-d");
					 $goalCommitmentModel->save(false) ;
						echo CJSON::encode(array(
								'new_goal_post' => $this->renderPartial('_goal_commitment_post', array(
										'description' => $goalCommitmentModel->description)
												, true)));
			//		}
			//	}
			}
			Yii::app()->end();
		}
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
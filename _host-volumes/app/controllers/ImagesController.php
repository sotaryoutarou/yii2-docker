<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\forms\ImageUploadForm;

class ImagesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays upload form.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ImageUploadForm();
        return $this->render('index', ['model' => $model]);
    }

    /**
     * recieve image file.
     *
     * @return string
     */
    public function actionUpload()
    {
        $model = new ImageUploadForm();

        if (Yii::$app->request->isPost) {
            $model->picture = $_FILES['picture'];
            if ($model->validate()) {
                // ファイルのアップロードが成功
                exit('aaaaaaaa');
            }
        }
        exit('vvvvvvvvvv');

        return $this->render('upload', ['model' => $model]);
    }
}

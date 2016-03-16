<?php
/**
 * Created by PhpStorm.
 * User: Artur
 * Date: 2/24/2016
 * Time: 13:12
 */
namespace api\controllers;

use common\models\Banner;
use common\models\Category;
use common\models\Country;
use common\models\Slider;
use common\models\User;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\Response;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    //'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['GET', 'HEAD'],
                    'view' => ['GET', 'HEAD'],
                    'create' => ['POST'],
                    'update' => ['PUT', 'PATCH'],
                    'delete' => ['DELETE'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $index = [
            'country_tvs' => Country::find()->with('tvs')->asArray()->all(),
            'category' => Category::find()->orderBy(['updated' => SORT_DESC])->asArray()->all(),
            'banner' => Banner::find()->orderBy(['id' => SORT_DESC])->asArray()->all(),
            'slider' => Slider::find()->orderBy(['id' => SORT_DESC])->asArray()->all(),
        ];
        return $index;
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {

    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {

        return $this->render('about', [
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {

    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {

    }
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {

    }
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws ActivateAccount
     */
    public function actionActivateAccount($token)
    {

    }
}

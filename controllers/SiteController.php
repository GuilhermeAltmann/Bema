<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Pedidos;

class SiteController extends Controller
{
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $pedidos = Pedidos::find()->all();
        return $this->render('index', ['pedidos' => $pedidos]);
    }

    public function actionDescricaocompleta()
    {

        return "lalalallala<br>asdsa";
    }
}

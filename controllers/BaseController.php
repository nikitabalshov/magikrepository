<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UrlManager;

class BaseController extends Controller
{
    public string $suffix='';
    public function init():void
    {
        $this->suffix = array_flip[Yii::$app->UrlManager->languages][Yii::$app->language];
        parent::init();
    }

}
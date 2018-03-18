<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15 0015
 * Time: 20:39
 */

namespace frontend\models;


use yii\db\ActiveRecord;

class UserController extends Controller
{

//关闭CSRF
    public $enableCsrfValidation = false;


    public function actionIndex()
    {
        $brands = Brand::find()->all();
       var_dump($brands);
       exit();
//       $data=['caoge','wangge'];
        return $this->render('index', ['branads' => $brands]);
    }
}
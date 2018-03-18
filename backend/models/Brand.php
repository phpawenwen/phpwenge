<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15 0015
 * Time: 21:42
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Brand extends ActiveRecord
{
//    public $img;
    public function rules()
    {
        return [
            [['name','sort','status','intro','logo'],'required'],
//            [['img'],'image','skipOnEmpty'=>true,'extensions'=>'png,jpg,gif']
        ];

    }

    public function attributeLabels()
  {
      return [
         'name'=>'姓名',
          'sort'=>'姓名',
          'status'=>'姓名',
          'intro'=>'简介'
      ];
  }
}
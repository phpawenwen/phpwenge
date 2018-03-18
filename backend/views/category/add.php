<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/18 0018
 * Time: 20:12
 */
$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($cate,'name');
echo $form->field($cate,'panten_id');
echo $form->field($cate,'intor')->textarea();
echo \yii\bootstrap\Html::submitButton('提交',['class'=>'btn btn-info']);
\yii\bootstrap\ActiveForm::end();
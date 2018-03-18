<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Brand */
/* @var $form ActiveForm */
?>
<div class="article-cate-add">

    <?php $form = ActiveForm::begin(); ?>
        <?=$form->field($model,'name')?>
        <?=$form->field($model,'sort')?>
        <?=$form->field($model,'status')->inline()->radioList(['禁用','激活'],['value'=>1])?>
        <?=$form->field($model,'is_help')->inline()->radioList(['否','是'],['value'=>1])?>
        <?=$form->field($model,'intor')->textarea()?>
        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>

        </div>
    <?php ActiveForm::end(); ?>

</div><!-- brand-add -->

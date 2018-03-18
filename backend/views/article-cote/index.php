<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15 0015
 * Time: 20:42
 */
?>

<h1>文章列表</h1>
<p>
<?=\yii\bootstrap\Html::a('添加',['add'],['class' =>'btn btn-info'])?>
<table class="table">
    <tr>
        <td>ID</td>
        <td>名字</td>
        <td>排序</td>
        <td>状态</td>
        <td>帮助</td>
        <td>简介</td>
        <td>操作</td>

    </tr>

   <?php foreach ($cate as $cate):?>
        <tr>
            <td><?=$cate->id?></td>
            <td><?=$cate->name?></td>
            <td><?=$cate->sort?></td>
            <td><?=$cate->status?></td>
            <td><?=$cate->is_help?></td>
            <td><?=$cate->intor?></td>
            <td><?=\yii\bootstrap\Html::a("编辑",['edit','id'=>$cate->id],['class' =>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a("删除",['del','id'=>$cate->id],['class' =>'btn btn-info'])?></td>

        </tr>
    <?php endforeach;?>
</table>
</p>
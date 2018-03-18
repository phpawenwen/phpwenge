<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15 0015
 * Time: 20:42
 */
?>

<h1>品牌列表</h1>
<p>
<?=\yii\bootstrap\Html::a('添加',['add'],['class' =>'btn btn-info'])?>
<table class="table">
    <tr>
        <td>ID</td>
        <td>名字</td>
        <td>图像</td>
        <td>排序</td>
        <td>状态</td>
        <td>简介</td>
        <td>操作</td>

    </tr>

   <?php foreach ($models as $brand):?>
        <tr>
            <td><?=$brand->id?></td>
            <td><?=$brand->name?></td>
            <td><img src="/<?=$brand->logo?>" width="40"></td>
            <td><?=$brand->sort?></td>
            <td><?=$brand->status?></td>
            <td><?=$brand->intro?></td>
            <td><?=\yii\bootstrap\Html::a("编辑",['edit','id'=>$brand->id],['class' =>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a("删除",['del','id'=>$brand->id],['class' =>'btn btn-info'])?></td>

        </tr>
    <?php endforeach;?>
</table>
</p>
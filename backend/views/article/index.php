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
        <td>题目</td>
        <td>分类</td>
        <td>排序</td>
        <td>状态</td>
        <td>简介</td>
        <td>创建时间</td>
        <td>操作</td>

    </tr>

   <?php foreach ($articles as $article):?>
        <tr>
            <td><?=$article->id?></td>
            <td><?=$article->title?></td>
            <td><?=$article->cate->name?></td>
            <td><?=$article->sort?></td>
            <td><?=$article->status?></td>
            <td><?=$article->intro?></td>
            <td><?=date("Ymd H:i:s",$article->create_time)?></td>
            <td><?=\yii\bootstrap\Html::a("编辑",['edit','id'=>$article->id],['class' =>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a("删除",['del','id'=>$article->id],['class' =>'btn btn-info'])?></td>

        </tr>
    <?php endforeach;?>
</table>
</p>
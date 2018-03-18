<?php

namespace backend\controllers;

use backend\models\Article;
use backend\models\ArticleCategory;
use backend\models\ArticleContent;
use yii\helpers\ArrayHelper;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex()

    {
        $articles=Article::find()->all();
        return $this->render('index',compact('articles'));
    }
   public function actionAdd(){
        $model=new Article();
//        创建文章内容模型对象
       $content=new ArticleContent();
//        获取分类数据
           $cates=ArticleCategory::find()->all();
//           把二维数组转化成为一维的
          $catesArr=ArrayHelper::map($cates,'id','name');
//          判断是不是post提交
           $request=\Yii::$app->request;
                if($request->isPost){
//                    数据绑定
                    $model->load($request->post());
//                    后台验证
                  if($model->validate()){
                     if($model->save()){
//                         数据绑定（文章内容）
                         $content->load($request->post());
                         if($content->validate()){
                             $content->arcitle_id=$model->id;
                             if($content->save()){
                                 \Yii::$app->session->setFlash('success','添加成功');
                                 return $this->redirect('index');
                             }
                         }
                     }
                  }else{
                      var_dump($model->errors);exit();
                  }

                }



        return $this->render('add',compact('catesArr','content','model'));
   }
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
            ]
        ];
    }
}

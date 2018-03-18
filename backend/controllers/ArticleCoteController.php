<?php

namespace backend\controllers;

use backend\models\ArticleCategory;

class ArticleCoteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cate=ArticleCategory::find()->all();
        return $this->render('index',compact('cate'));
    }


    public function actionAdd(){
//        创建一个数据模型处理对象
        $model=new ArticleCategory();
//         判断是否是post提交
        $request=\Yii::$app->request;
        if ($request->isPost){
//               绑定数据
            $model->load($request->post());
//             后台验证
           if($model->validate()){
//                 绑定数据
               if($model->save()){
                   \Yii::$app->session->setFlash('success','添加分类成功');
                   return $this->redirect('index');
               }
           }else{
//               var_dump($model->errors);exit();
                  var_dump($model->firstErrors);
//               $model->addError('name');

           }

        }
//        返回视图
        return $this->render('add',compact('model'));

  }
    public function actionEdit($id){
//        创建一个数据模型处理对象
        $model=ArticleCategory::findOne($id);
//         判断是否是post提交
        $request=\Yii::$app->request;
        if ($request->isPost){
//               绑定数据
            $model->load($request->post());
//             后台验证
            if($model->validate()){
//                 绑定数据
                if($model->save()){
                    \Yii::$app->session->setFlash('success','添加分类成功');
                    return $this->redirect('index');
                }
            }else{
//               var_dump($model->errors);exit();
                var_dump($model->firstErrors);
//               $model->addError('name');

            }

        }
//        返回视图
        return $this->render('add',compact('model'));

    }
    public function actionDel(){

    }
}

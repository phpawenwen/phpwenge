<?php

namespace backend\controllers;

use backend\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTest(){
//        $cate=new Category();
//        $cate->name="电脑";
////        创建一个一级分类
//
//         $cate->makeRoot();
//         添加一个子分类
//        1找到父亲分类
        $cateParent=Category::findOne(31);

//        2创建一个新的分类
        $cate =new Category();
        $cate->name="小米";
        $cate->panten_id="31";
//        3把新的分类放在父亲分类中
         $cate->prependTo($cateParent);
         var_dump($cate->errors);
    }
  public function actionAdd(){
        $cate=new Category();
//        判断提交方式
      $request=\Yii::$app->request;
      if($request->isPost ){
//          数据绑定
          $cate->load($request->post());
//          后台验证
          if($cate->validate()){
              if($cate->panten_id==0){
//                  $cate=new Category();
//       $cate->name="电脑";
////        创建一个一级分类

        $cate->makeRoot();
        \Yii::$app->session->setFlash("success","创建一级分类:".$cate->name."成功");
        return $this->refresh();
              }else{
                  $cateParent=Category::findOne($cate->panten_id);
//             $cate=new Category();
//                  $cate->name="长虹";
//                  $cate->panten_id=1;
                  $cate->prependTo($cateParent);
                  \Yii::$app->session->setFlash("success","创建子类分类:".$cate->name."成功");
                  return $this->refresh();
              }

          }else{

              var_dump($cate->errors);exit();
          }
      }

        return $this->render('add',compact('cate'));
  }
}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15 0015
 * Time: 21:29
 */

namespace backend\controllers;


use backend\models\Brand;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;

class BrandController extends Controller
{
    public function actionIndex()
    {
//   echo "ververv";
//   exit();
        $models = Brand::find()->all();
        return $this->render('index', compact('models'));
    }

    public function actionAdd()
    {
        $model = new Brand();
        $request = new Request();
//      判断是否是post提交
        if ($request->isPost) {
            $model->load(\Yii::$app->request->post());
////          上传图片
//          $model->img=UploadedFile::getInstance($model,'img');
////          判断是否上传图片
//          $imgPath="";
//          if($model->img!==null){
//              $imgPath="imgage/".time().".".$model->img->extension;
////              移动图片
//              $model->img->saveAs($imgPath,false);
//          }
//          var_dump($model);exit;
//          后台验证
            if ($model->validate()) {
//              $model->logo=$imgPath;
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', '添加成功');
                    return $this->redirect('index');
                }
            }
        }

        return $this->render('add', compact('model'));
    }

    public function actionEdit($id)
    {
        $model = Brand::findOne($id);

//      判断是否是post提交
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
//          上传图片
            $model->img = UploadedFile::getInstance($model, 'img');
//          判断是否上传图片
            $imgPath = "";
            if ($model->img !== null) {
                $imgPath = "imgage/" . time() . "." . $model->img->extension;
//              移动图片
                $model->img->saveAs($imgPath, false);
            }
//          var_dump($model);exit;
//          后台验证
            if ($model->validate()) {
                if ($imgPath) {
                    $model->logo = $imgPath;
                }

                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', '添加成功');
                    return $this->redirect('index');
                }
            }
        }

        return $this->render('add', compact('model'));
    }

    public function actionDel($id)
    {
        if (Brand::findOne($id)->delete()) {
            \Yii::$app->session->setFlash('success', '删除成功');
            return $this->redirect(['index']);
        }

    }

    public function actionUpload()
    {
//        通过name值得到文件上传的对象
        $fileObj = UploadedFile::getInstanceByName('file');
//        判定文件是否为空
        if ($fileObj !== null) {
//            路径
            $filePath = "imgage/" . time() . "." . $fileObj->extension;
//            移动
            if ($fileObj->saveAs($filePath, false)) {
                // 正确时， 其中 attachment 指的是保存在数据库中的路径，url 是该图片在web可访问的地址
//                {"code": 0, "url": "http://domain/图片地址", "attachment": "图片地址"}
                $ok = [
                    'code' => 0,
                    'url' => "/" . $filePath,
                    'attachment' => $filePath,
                ];
                return json_encode($ok);
            } else {
                // 错误时
//                {"code": 1, "msg": "error"}
                $result = [
                    'cole' => 1,
                    'msg' => 'error',
                ];
                return Json::encode($result);
            }
        }

    }
}

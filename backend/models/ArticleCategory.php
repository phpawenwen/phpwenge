<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
 * @property string $name 名字
 * @property int $sort 排序
 * @property int $status 状态
 * @property int $is_help 是否帮助
 * @property string $intor 简介
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','sort','is_help','status'], 'required'],
             [['intor'],'safe'],
            [['name'],'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名字',
            'sort' => '排序',
            'status' => '状态',
            'is_help' => '是否帮助',
            'intor' => '简介',
        ];
    }
}

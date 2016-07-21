<?php

namespace common\modules\brancon\cms\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bcw_page".
 *
 * @property integer $id
 * @property integer $isHome
 * @property integer $isOnline
 * @property integer $isMenu
 * @property integer $menuParent
 * @property integer $created_at
 *
 * @property BcwPageInfo[] $bcwPageInfos
 */
class BcwPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcw_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 225],
            [['isHome', 'isOnline', 'isMenu', 'menuParent', 'menuPosition', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'isHome' => Yii::t('app', 'Is Home'),
            'isOnline' => Yii::t('app', 'Is Online'),
            'isMenu' => Yii::t('app', 'Is Menu'),
            'menuParent' => Yii::t('app', 'Menu Parent'),
            'menuPosition' => Yii::t('app', 'Menu Position'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcwPageInfos()
    {
        return $this->hasMany(BcwPageInfo::className(), ['FK_pageid' => 'id']);
    }
    
    public function getMenuEntries(){
        //$arr1 = null; //[0 => 'kein Elternelement'];
        $arr2 = ArrayHelper::map(BcwPage::find()
                                            ->orderby('name asc')
                                            ->all(), 'id', 
                            function($model, $defaultValue) {
                                return $model->name; // . " (ID: " . $model->id . ")";
                            });
                            
        return $arr2;
    }
    
    public function getParentMenuEntries() {
        $arrPreSelect = BcwPage::find()->select('distinct(menuParent)');
        
        $arr2 = ArrayHelper::map(BcwPage::find()
                                            ->andFilterWhere(['id' => $arrPreSelect])
                                            ->orderby('name asc')
                                            ->all(), 'id', 
                            function($model, $defaultValue) {
                                return $model->name; // . " (ID: " . $model->id . ")";
                            });
                            
        return $arr2;
        
    }
}

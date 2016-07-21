<?php

namespace common\modules\brancon\cms\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bcw_pageInfo".
 *
 * @property integer $id
 * @property integer $FK_pageid
 * @property string $lang
 * @property string $name
 * @property string $slug
 *
 * @property BcwContent[] $bcwContents
 * @property BcwPage $fKPage
 */
class BcwPageInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcw_pageInfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['FK_pageid'], 'required'],
            [['FK_pageid'], 'integer'],
            [['lang'], 'string', 'max' => 5],
            [['name', 'slug'], 'string', 'max' => 225],
            //[['FK_pageid'], 'exist', 'skipOnError' => true, 'targetClass' => BcwPage::className(), 'targetAttribute' => ['FK_pageid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'FK_pageid' => Yii::t('app', 'Menüeintrag'),
            'lang' => Yii::t('app', 'Lang'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcwContents()
    {
        return $this->hasMany(BcwContent::className(), ['FK_pageId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getFKPage()
    {
        return $this->hasOne(BcwPage::className(), ['id' => 'FK_pageid']);
    }
    */
    
    public function getPages() 
    {
         return ArrayHelper::map(BcwPageInfo::find()
                                            ->orderby('name asc')
                                            ->all(), 'id', 
                            function($model, $defaultValue) {
                                return $model->name . " (" . $model->lang . "/page/" . $model->slug . ")";
                            });
    }
    
    public function getPagesForMenu() 
    {
        $arr1 = [0 => 'kein Elternelement'];
        $arr2 = ArrayHelper::map(BcwPageInfo::find()
                                            ->orderby('name asc')
                                            ->all(), 'id', 
                            function($model, $defaultValue) {
                                return $model->name . " (" . $model->lang . ")";
                            });
                            
        return array_merge($arr1, $arr2);
    }
    
}

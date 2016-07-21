<?php

namespace common\modules\brancon\cms\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sys_list".
 *
 * @property string $syslist
 * @property string $beschreibung
 * @property integer $isEditable
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property SysListValue[] $sysListValues
 */
class SysList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['syslist', 'beschreibung', 'isEditable', 'created_at', 'updated_at'], 'required'],
            [['beschreibung'], 'string'],
            [['isEditable', 'created_at', 'updated_at'], 'integer'],
            [['syslist'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'syslist' => Yii::t('app', 'Syslist'),
            'beschreibung' => Yii::t('app', 'Beschreibung'),
            'isEditable' => Yii::t('app', 'Is Editable'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysListValues()
    {
        return $this->hasMany(SysListValue::className(), ['FK_syslistid' => 'syslist']);
    }
    
    public function getSysLists() {       
        
        $arr2 = ArrayHelper::map(SysList::find()
                                    ->orderby('syslist asc')
                                    ->all(), 'syslist', 
                            function($model, $defaultValue) {
                                return $model->syslist;
                            });
                            
        return $arr2;
        
    }
}

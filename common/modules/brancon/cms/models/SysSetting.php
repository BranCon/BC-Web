<?php

namespace common\modules\brancon\cms\models;

use Yii;

/**
 * This is the model class for table "sys_setting".
 *
 * @property string $sys_key
 * @property string $value
 * @property string $default_value
 * @property string $description
 */
class SysSetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sys_key', 'value', 'default_value', 'description'], 'required'],
            [['description'], 'string'],
            [['sys_key'], 'string', 'max' => 50],
            [['value', 'default_value'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_key' => Yii::t('app', 'Sys Key'),
            'value' => Yii::t('app', 'Value'),
            'default_value' => Yii::t('app', 'Default Value'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
    
    
    public function getBySysKey($sysKey)
    {
        $row = SysSetting::find()->andFilterWhere(['sys_key' => $sysKey])->One();
        
        if(strlen($row->value) > 0){
            return $row->value;
        } else {
            return $row->default_value;
        }
    }
    
     public function getJNSelect2() {       
                            
        return array (1 => 'Ja', 0 => 'Nein');
        
    }
}

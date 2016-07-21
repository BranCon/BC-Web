<?php

namespace common\modules\brancon\cms\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sys_list_value".
 *
 * @property integer $id
 * @property string $FK_syslistid
 * @property string $value
 * @property string $label
 * @property string $label_default
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property SysList $fKSyslist
 */
class SysListValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_list_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FK_syslistid', 'value', 'label', 'label_default', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'isActive'], 'integer'],
            [['FK_syslistid', 'value', 'label', 'label_default'], 'string', 'max' => 225],
            [['FK_syslistid'], 'exist', 'skipOnError' => true, 'targetClass' => SysList::className(), 'targetAttribute' => ['FK_syslistid' => 'syslist']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'FK_syslistid' => Yii::t('app', 'Systemliste'),
            'value' => Yii::t('app', 'Value'),
            'label' => Yii::t('app', 'Label'),
            'label_default' => Yii::t('app', 'Label Default'),
            'isActive' => Yii::t('app', 'Aktiv'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFKSyslist()
    {
        return $this->hasOne(SysList::className(), ['syslist' => 'FK_syslistid']);
    }
    
    /**
     * 
     * @param type $category
     * @param type $companies
     * @return type
     */
    public function getAllValuesForCategoryArrayMap($category, $companies = []) 
    {
        
        return ArrayHelper::map(SysListValue::find()->where(['FK_syslistid' => $category])
                                            //->andWhere([])
                                            ->orderBy('label ASC')
                                            ->all(), 'value', 
                            function($model, $defaultValue) {
                                if (strlen($model->label) > 0){
                                    return $model->label;
                                } else {
                                    $model->label_default;
                                }
                            });
    }
    
}

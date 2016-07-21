<?php

namespace common\modules\brancon\cms\models;

use Yii;

/**
 * This is the model class for table "bcw_content".
 *
 * @property integer $id
 * @property integer $FK_pageId
 * @property string $content
 * @property integer $created_at
 *
 * @property BcwPageInfo $fKPage
 */
class BcwContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcw_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FK_pageId', 'created_at', 'position', 'isActive'], 'integer'],
            [['content'], 'string'],
            [['type'], 'string', 'max' => 50],
            [['FK_pageId'], 'exist', 'skipOnError' => true, 'targetClass' => BcwPageInfo::className(), 'targetAttribute' => ['FK_pageId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'FK_pageId' => Yii::t('app', 'Fk Page ID'),
            'type' => Yii::t('app', 'Type'),
            'content' => Yii::t('app', 'Content'),
            'isActive' => Yii::t('app', 'Aktiv'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFKPage()
    {
        return $this->hasOne(BcwPageInfo::className(), ['id' => 'FK_pageId']);
    }
}

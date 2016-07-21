<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Select2;
use common\modules\brancon\cms\models\SysListValue;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPageInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcw-page-info-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <div class="col-lg-6">
        <?= $form->field($model, 'FK_pageid')->widget(Select2::classname(),[
            'data' => \common\modules\brancon\cms\models\BcwPage::getMenuEntries(),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label("Menüzuweisung") ?>
        
    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'lang')->widget(Select2::classname(),[
            'data' => SysListValue::getAllValuesForCategoryArrayMap('LangCd'),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]) ?>
    </div>
    
    <div class="col-lg-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="col-lg-6">
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

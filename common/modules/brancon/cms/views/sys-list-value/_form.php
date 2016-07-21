<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysListValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-list-value-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <div class="col-lg-6">
        <?= $form->field($model, 'FK_syslistid')->widget(Select2::classname(),[
            'data' => \common\modules\brancon\cms\models\SysList::getSysLists(),
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
        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>        
    </div>
    
    <div class="col-lg-6">
        <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>  
    </div>
    
    <div class="col-lg-6">
        <?= $form->field($model, 'label_default')->textInput(['maxlength' => true]) ?>
    </div>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

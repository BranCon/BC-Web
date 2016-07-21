<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Select2;
use common\modules\brancon\cms\models\SysListValue;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcw-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-8">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'isHome')->widget(Select2::classname(),[
            'data' => SysListValue::getAllValuesForCategoryArrayMap('JNCd'),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label("Startseite") ?>
    </div>
    
    <div class="col-lg-2">
        <?= $form->field($model, 'isOnline')->widget(Select2::classname(),[
            'data' => SysListValue::getAllValuesForCategoryArrayMap('JNCd'),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label("Online Aktiv") ?>
    </div>
    
    <div class="col-lg-3">
        <?= $form->field($model, 'isMenu')->widget(Select2::classname(),[
            'data' => SysListValue::getAllValuesForCategoryArrayMap('JNCd'),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label("ist ein Menüeintrag") ?>
    </div>
    
    <div class="col-lg-6">
        <?= $form->field($model, 'menuParent')->widget(Select2::classname(),[
            'data' => \common\modules\brancon\cms\models\BcwPage::getMenuentries(),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label("Elternelement im Menü") ?>
        
    </div>
    
    <div class="col-lg-3">
        <?= $form->field($model, 'menuPosition')->textInput(['maxlength' => true]) ?>
        
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

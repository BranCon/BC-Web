<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'syslist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beschreibung')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isEditable')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

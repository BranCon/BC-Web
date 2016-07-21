<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Select2;
use kartik\widgets\DateTimePicker;

use common\modules\brancon\cms\models\SysList;
use common\modules\brancon\cms\models\SysListValue;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcw-content-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-4">
        <?= $form->field($model, 'FK_pageId')->widget(Select2::classname(),[
            'data' => \common\modules\brancon\cms\models\BcwPageInfo::getPages(),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label("Seite") ?>
    </div>
    
    <div class="col-lg-4">
        <?= $form->field($model, 'position')->textInput() ?>
    </div>
    
    <div class="col-lg-4">
        <?= $form->field($model, 'type')->widget(Select2::classname(),[
            'data' => SysListValue::getAllValuesForCategoryArrayMap('ContentType'),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]) ?>
    </div>
    
    <div class="col-lg-4">
        <?= $form->field($model, 'isActive')->widget(Select2::classname(),[
            'data' => SysListValue::getAllValuesForCategoryArrayMap('JNCd'),
            'options' => [
                'placeholder' => '...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]) ?>
    </div>
    
    <div class="col-lg-4">
        <?= $form->field($model, 'showFrom')->widget(DateTimePicker::className(), [
            'language' => 'de',
            'size' => 'ms',
            'value' => date("d.m.Y H:i:s"),
            'options' => ['placeholder' => 'Startdatum ...'],
            'pluginOptions' => [
		'autoclose' => true,
                'language' => 'de',
		
            ]
            //'template' => '{input}',
            //'pickButtonIcon' => 'glyphicon glyphicon-time',
            //'inline' => false,
            /*
            'clientOptions' => [
                'startView' => 4,
                'minView' => 0,
                'maxView' => 4,
                'autoclose' => true,
                //'linkFormat' => 'HH:ii P', // if inline = true
                'format' => 'yyyy-mm-dd  HH:ii', // if inline = false
                'todayBtn' => true
            ]
             * 
             */
        ]);?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'showTill')->widget(DateTimePicker::className(), [
            'language' => 'de',
            'size' => 'ms',
            //'template' => '{input}',
            //'pickButtonIcon' => 'glyphicon glyphicon-time',
            //'inline' => false,
            /*
            'clientOptions' => [
                'startView' => 4,
                'minView' => 0,
                'maxView' => 4,
                'autoclose' => true,
                //'linkFormat' => 'HH:ii P', // if inline = true
                'format' => 'yyyy-mm-dd  HH:ii', // if inline = false
                'todayBtn' => true
            ]
             * 
             */
        ]);?>
    </div>
    
    <div class="col-lg-12">
        <?= $form->field($model, 'content')->widget(dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 13],
            'preset' => 'custom',
            'clientOptions' => [
                'allowedContent' => true,
                'filebrowserImageBrowseUrl' => '../../vendor/sunhater/kcfinder/browse.php?type=images',
                'filebrowserImageUploadUrl' => '../../vendor/sunhater/kcfinder/upload.php?type=images',
                'filebrowserBrowseUrl' => '../../vendor/sunhater/kcfinder/browse.php?type=files',
                'filebrowserUploadUrl' => '../../vendor/sunhater/kcfinder/upload.php?type=files',

                'toolbar' => [
                    [
                        'name' => 'row1',
                        'items' => [
                            'Source', '-',
                            'Bold', 'Italic', 'Underline', 'Strike', '-',
                            'Subscript', 'Superscript', 'RemoveFormat', '-',
                            'TextColor', 'BGColor', '-',
                            'NumberedList', 'BulletedList', '-',
                            'Outdent', 'Indent', '-', 'Blockquote', '-',
                            'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'list', 'indent', 'blocks', 'align', 'bidi', '-',
                            'Link', 'Unlink', 'Anchor', '-',
                            'ShowBlocks', 'Maximize',
                            'ShowBlocks', 'Maximize',
                        ],
                    ],
                    [
                        'name' => 'row2',
                        'items' => [
                            'Image', 'Youtube', 'Table', 'HorizontalRule', 'SpecialChar', 'Iframe', '-',
                            'NewPage', 'Print', 'Templates', '-',
                            'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
                            'Undo', 'Redo', '-',
                            'Find', 'SelectAll', 'Format', 'Font', 'FontSize',
                        ],
                    ],
                    [
                        'name' => 'row3',
                        'items' => [
                            'Form', 'Checkbox', 'Radio', 
                            'TextField', 'Textarea', 'Select', 
                            'Button', 'ImageButton', 'HiddenField' 
                        ],
                    ],
                ],
            ],
        ]) ?> 
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysSetting */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sys Setting',
]) . $model->sys_key;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sys Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sys_key, 'url' => ['view', 'id' => $model->sys_key]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sys-setting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

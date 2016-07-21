<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysListValue */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sys List Value',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sys List Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sys-list-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

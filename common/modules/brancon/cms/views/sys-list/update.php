<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysList */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sys List',
]) . $model->syslist;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sys Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->syslist, 'url' => ['view', 'id' => $model->syslist]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sys-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

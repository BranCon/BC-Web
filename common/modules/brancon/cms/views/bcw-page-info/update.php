<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPageInfo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bcw Page Info',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bcw Page Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bcw-page-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

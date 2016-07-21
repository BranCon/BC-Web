<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwContent */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bcw Content',
]) . $model->id;



$objTopic = \common\modules\brancon\cms\models\BcwPageInfo::findOne($model->FK_pageId);
$this->title = "Update : " . $objTopic->name . " (Slug: " . $objTopic->slug . ")";

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bcw Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bcw-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

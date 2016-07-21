<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysSetting */

$this->title = Yii::t('app', 'Create Sys Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sys Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

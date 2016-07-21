<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\SysListValue */

$this->title = Yii::t('app', 'Create Sys List Value');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sys List Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-list-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

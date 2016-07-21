<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPage */

$this->title = Yii::t('app', 'Create Bcw Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bcw Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

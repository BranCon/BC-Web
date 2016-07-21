<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwContent */

$this->title = Yii::t('app', 'Create Bcw Content');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bcw Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

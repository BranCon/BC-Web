<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPageInfo */

$this->title = Yii::t('app', 'Create Bcw Page Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bcw Page Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-page-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

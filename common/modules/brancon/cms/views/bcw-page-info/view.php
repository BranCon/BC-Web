<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPageInfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bcw Page Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-page-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'FK_pageid',
            [
                'attribute' => 'FK_pageid',
                'value' => \common\modules\brancon\cms\models\BcwPage::find()->andFilterWhere(['id' => $model->FK_pageid])->One()->name,            
            ],
            'lang',
            'name',
            'slug',
            
        ],
    ]) ?>
    
    <h3>Content</h3>
    <?php
        $arrPageInfo = common\modules\brancon\cms\models\BcwContent::find()->andFilterWhere(['FK_pageid' => $model->id])->orderby('position asc')->All();
        for($i = 0; $i < sizeof($arrPageInfo); $i++){
            $row = $arrPageInfo[$i];
            echo "<a href='?r=CMS%2Fbcw-content%2Fview&id=".$row->id."'>".$row->type . "</a><br />";
        }
    ?>

</div>

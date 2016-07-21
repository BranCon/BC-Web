<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\brancon\cms\models\BcwPage */

$this->title = ""; //$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-page-view">

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
            'name',
            'isHome',
            'isOnline',
            'isMenu',
            //'menuParent',
            [
                'attribute' => 'menuParent',
                'value' => \common\modules\brancon\cms\models\BcwPage::find()->andFilterWhere(['id' => $model->menuParent])->One()->name,            
            ],
            'menuPosition',
            'created_at',
        ],
    ]) ?>
    
    <h3>SeitenInfos</h3>
    <?php
        $arrPageInfo = common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['FK_pageid' => $model->id])->orderby('lang asc')->All();
        for($i = 0; $i < sizeof($arrPageInfo); $i++){
            $row = $arrPageInfo[$i];
            echo "<a href='?r=CMS%2Fbcw-page-info%2Fview&id=".$row->id."'>".$row->lang . " - " . $row->name."</a><br />";
        }
    ?>

</div>

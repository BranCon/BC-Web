<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\brancon\cms\models\BcwContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Content');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Content'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',            
            [
                'attribute' => 'FK_pageId',
                'format' => 'raw',
                'value' => function ($model){
                    $objPageInfo = \common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['id' => $model->FK_pageId])->One();
                    if(!is_null($objPageInfo)){
                        
                        return $objPageInfo->name . " (".$objPageInfo->lang.")";
                    } else {
                        return null;
                    }
                } 
            ],
            [
                'attribute' => 'Url',
                'format' => 'raw',
                'value' => function ($model){
                    $obj = \common\modules\brancon\cms\models\BcwPageInfo::findOne($model->FK_pageId);
                    return $obj->lang. "/page/" . $obj->slug;
                } 
            ],
            //'FK_pageId',
            'position',
            'type',
            //'content:ntext',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

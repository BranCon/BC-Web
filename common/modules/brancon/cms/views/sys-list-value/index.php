<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\brancon\cms\models\SysListValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sys List Values');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-list-value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sys List Value'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'FK_syslistid',
            [
                'attribute' => 'FK_syslistid',
                'label' => 'Menü',
                'value' => function ($model){
                    if ($model->FK_syslistid == null){
                        return "";
                    } else {
                        $obj = \common\modules\brancon\cms\models\SysList::find()->andFilterWhere(['syslist' => $model->FK_syslistid])->One();
                        if(is_object($obj) ){
                            return $obj->syslist;
                        } else {
                            return '-';
                        }
                    }
                },                        
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  \common\modules\brancon\cms\models\SysList::getSysLists(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw',
            ],
            'value',
            'label',
            'label_default',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use common\modules\brancon\cms\models\SysSetting;


/* @var $this yii\web\View */
/* @var $searchModel common\modules\brancon\cms\models\BcwContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menu');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'isHome',
            'menuPosition',
            'name',
            [
                'attribute' => 'isHome',
                'format' => 'raw',
                'value' => function ($model){
                    if($model->isHome == 1){
                        return '<span class="glyphicon glyphicon-home"></span>';
                    } else {
                        return '';
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> SysSetting::getJNSelect2(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw', 
            ],
            [
                'attribute' => 'menuParent',
                'value' => function ($model){
                    $obj = \common\modules\brancon\cms\models\BcwPage::find()->andFilterWhere(['id' => $model->menuParent])->One();
                    if($obj && $obj->id != 0) {
                        return $obj->name;
                    } else {
                        return '';
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> \common\modules\brancon\cms\models\BcwPage::getParentMenuEntries(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw',
            ],
            //'isOnline',
            [
                'attribute' => 'isOnline',
                'format' => 'raw',
                'value' => function ($model){
                    if($model->isOnline == 1){
                        return '<span class="glyphicon glyphicon-eye-open"></span>';
                    } else {
                        return '<span class="glyphicon glyphicon-eye-close"></span>';
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> SysSetting::getJNSelect2(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw',
            ],
            //'isMenu',
            [
                'attribute' => 'isMenu',
                'format' => 'raw',
                'value' => function ($model){
                    if($model->isMenu == 1){
                        return '<span class="glyphicon glyphicon-menu-hamburger"></span>';
                    } else {
                        return '';
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> SysSetting::getJNSelect2(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw',
            ],  
            /*
            [
                'attribute' => 'Name',
                'format' => 'raw',
                'value' => function ($model){
                    $obj = \common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['FK_Pageid' => $model->id])->andFilterWhere(['lang' => SysSetting::getBySysKey('language_administration_default')])->One();
                    if(!is_null($obj)) {
                        return $obj->name;
                    } else {
                        return '';
                    }
                } 
            ],
                   
            [
                'attribute' => 'Parent',
                'format' => 'raw',
                'value' => function ($model){
                    $obj = \common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['FK_Pageid' => $model->menuParent])->One();
                    if($obj) {
                        return $obj->name;
                    } else {
                        return '';
                    }
                } 
            ],*/
                   
            //'menuParent',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

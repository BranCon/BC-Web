<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
//use yii\grid\GridView;
use kartik\widgets\Select2;
use common\modules\brancon\cms\models\SysSetting;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\brancon\cms\models\BcwContentInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pagedetail erstellen');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcw-page-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bcw Page Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'FK_pageid',
            [
                'attribute' => 'FK_pageid',
                'label' => 'Menü',
                'value' => function ($model){
                    if ($model->FK_pageid == null){
                        return "";
                    } else {
                        $obj = \common\modules\brancon\cms\models\BcwPage::find()->andFilterWhere(['id' => $model->FK_pageid])->One();
                        if(is_object($obj) ){
                            return $obj->name;
                        } else {
                            return '-';
                        }
                    }
                },                        
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  \common\modules\brancon\cms\models\BcwPage::getMenuEntries(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw',
            ],
            
            'name',
            [
                'attribute' => 'lang',
                'value' => function ($model){
                    if ($model->FK_pageid == null){
                        return "";
                    } else {
                        $obj = \common\modules\brancon\cms\models\SysListValue::find()->andFilterWhere(['value' => $model->lang])->One();
                        if(is_object($obj) ){
                            if(strlen($obj->label) > 0){
                                return $obj->label;
                            } else {
                                return $obj->label_default;
                            }
                        } else {
                            return '-';
                        }
                    }
                },                        
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> \common\modules\brancon\cms\models\SysListValue::getAllValuesForCategoryArrayMap('LangCd'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>[
                    'placeholder'=>'...', 
                    'multiple' => false,
                ],
                'format'=>'raw',
            ],
            'slug',
            [
                'attribute' => 'URL',
                'value' => function ($model){
                    return $model->lang. "/page/" . $model->slug;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Carousel;


$this->title = $objPageInfo->name;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site">
    <h1 id="topic"><?= $this->title; ?></h1>
      <?php
            $objContent = \common\modules\brancon\cms\models\BcwContent::find()
                    ->andFilterWhere(['FK_pageId' => $objPageInfo->id])
                    ->andFilterWhere(['isActive' => 1])
                    ->orderby('position asc')
                    ->all();
            
            for($i = 0; $i < sizeof($objContent); $i++){
                $row = $objContent[$i];
                if ($row->type == "text"){
                    echo  $row->content;
                } elseif($row->type == "carousel") {
                    echo Carousel::widget(json_decode($row->content, true));
                } elseif($row->type == "calendar") {
                    echo Yii::$app->controller->renderAjax('@common/modules/brancon/cms/views/calendar/calendar',
                        [
                            null,
                        ]);
                } elseif($row->type == "contact") {
                    $model = new \common\modules\brancon\cms\models\ContactForm();
                    
                    echo Yii::$app->controller->renderAjax('@common/modules/brancon/cms/views/contact/contact',
                        [
                            'model' => $model,
                        ]);
                }
            }
        ?>
</div>

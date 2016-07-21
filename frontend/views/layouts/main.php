<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\BranConAsset;
use limion\bootstraplightbox\BootstrapMediaLightboxAsset;
use common\widgets\Alert;

use common\modules\brancon\cms\models\SysSetting;

AppAsset::register($this);
BootstrapMediaLightboxAsset::register($this);
BranConAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    
    <?php
        /*
         * Button - zurück zum Anfang der Seite
         */
        //if (SysSetting::getBySysKey('show_ScrollBackToTopButton') == "true"){
        if(true) {
            echo '<a href="#" class="back-to-top">Back to Top</a>';
        }
    ?>

<div class="wrap">
    <?php
    $s = new \yii\web\Session();
    
    NavBar::begin([
        /*'brandLabel' => 'BranCon e.U.',
        'brandUrl' => Yii::$app->homeUrl,*/
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    /*
     * Menü links
     */
        $objHeaderMenu = \common\modules\brancon\cms\models\BcwPage::find()->andFilterWhere(['isMenu' => 1])->andFilterWhere(['menuParent' => 0])->orderby('menuPosition asc')->all();
        if(!is_null($objHeaderMenu)) {
            $menuItems = array();

             for($i = 0; $i < sizeof($objHeaderMenu); $i++){
                 $row = $objHeaderMenu[$i];
                 $menuItem = common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['FK_pageid' => $row->id])->andFilterWhere(['lang' => $s->get('lang')])->One();

                 // Submenu
                 $objHeaderMenuSub = \common\modules\brancon\cms\models\BcwPage::find()->andFilterWhere(['isMenu' => 1])->andFilterWhere(['menuParent' => $row->id])->orderby('menuPosition asc')->all();

                 if(sizeof($objHeaderMenuSub) < 1){
                     if(is_object($menuItem)) {
                         $menuItems[$i] = ['label' => $menuItem->name , 'url' => ['/'.$s->get('lang').'/page/' . $menuItem->slug]];
                     }
                 } else {
                     // Submenüeinträge
                     $items = array();

                     for($j = 0; $j < sizeof($objHeaderMenuSub); $j++){
                         $rowSubMenu = $objHeaderMenuSub[$j];
                         $menuItemSub = common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['FK_pageid' => $rowSubMenu->id])->andFilterWhere(['lang' => $s->get('lang')])->One();

                         $items[$j] = ['label' => $menuItemSub->name , 'url' => ['/'.$s->get('lang').'/page/' . $menuItemSub->slug]];
                     }

                     $menuItems[$i] = [
                                         'label' => $menuItem->name,
                                         'items' => $items
                                     ];
                 }
             }       
        }
         echo Nav::widget([
             'options' => ['class' => 'navbar-nav navbar-left'],
             'items' => $menuItems,
         ]);
    
    /*
     *  Menü rechts
     */
        $menuItemsRight = [
            ['label' => 'powered by <img src="http://91.113.228.170/brancon-web/frontend/web/image/BranCon_Logo.png"  height="19px" />', 'url' => Yii::$app->homeUrl],
        ];
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItemsRight,
            'encodeLabels' => false,
        ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; BranCon e.U. <?= date('Y') ?></p>

        <p class="pull-right">
            
            <?php
            
                /*
                 * Check for Pages in other language
                 */
                $get = Yii::$app->request->get();
                $page = "";
                if(isset($get['page'])){
                   $page = $get['page'];
                } else {
                    $page="start";
                }
                //echo 'inputs: ' . $page;
                
                $objPage = \common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['lang' => $s->get("lang")])->andFilterWhere(['slug' => $page])->One();
                if(!is_null($objPage)) {
                    //echo "FK id: " . $objPage->FK_pageid;
                        $objPageDifLang = \common\modules\brancon\cms\models\BcwPageInfo::find()->andFilterWhere(['FK_pageid' => $objPage->FK_pageid])->andFilterWhere(['!=', 'lang', $s->get("lang")])->All();
                        //echo "Andere Sprachen " . sizeof($objPageDifLang);
                        for($i = 0; $i < sizeof($objPageDifLang); $i++){
                            echo '<a href="/yiicmsadv/' . $objPageDifLang[$i]->lang . '/page/' . $objPageDifLang[$i]->slug . '"><i class="flag-icon flag-icon-'.$objPageDifLang[$i]->lang.'"></i></a> &nbsp';
                        }
                } 
            
            ?>
            
            
            
        </p>
        <!--p class="pull-right"><?= Yii::powered() ?></p-->
        <!--p class="pull-right"><a href="/yiicmsadv/backend/web">Administration</a></p-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\sidenav\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">  <!-- wrap starts -->

    <div class="container-fluid">   <!-- container-fluid starts -->
    
        <div class="row">   <!-- row starts -->
            <?php
                NavBar::begin([
                    'brandLabel' => 'Bicycle Store',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                ]);
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                ];
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                } else {
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
                }
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            ?>            
        </div>  <!-- row ends -->
        
        <div class="row" style="margin-top:57px">   <!-- row starts -->

            <div class="col-sm-2">  <!-- col-sm-2 starts -->
                <?php
                    echo SideNav::widget([
                        'type' => SideNav::TYPE_PRIMARY,
                        'heading' => 'Sidenav',
                        'items' => [
                            [
                                'url' => 'index.php?r=bicycle-info%2Findex',
                                'label' => 'Bicycle Info',
                                'icon' => 'glyphicon glyphicon-th-list'
                            ],
                            [
                                'url' => 'index.php?r=bicycle-brand%2Findex',
                                'label' => 'Bicycle Brand',
                                'icon' => 'glyphicon glyphicon-tags'
                            ],
                            [
                                'url' => 'index.php?r=type%2Findex',
                                'label' => 'Bicycle Type',
                                'icon' => 'glyphicon glyphicon-tags'
                            ],
                            [
                                'label' => 'Help',
                                'icon' => 'question-sign',
                                'items' => [
                                    ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                                    ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                                ],
                            ],
                        ],
                    ]);
                ?>
            </div>  <!-- col-sm-2 ends -->

            <div class="col-sm-10"> <!-- col-sm-10 starts -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                
                <?= Alert::widget() ?>
                
                <?= $content ?>
            </div>  <!-- col-sm-10 ends -->

        </div>  <!-- row ends -->

    </div>  <!-- container-fluid ends -->

</div>  <!-- wrap ends -->

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

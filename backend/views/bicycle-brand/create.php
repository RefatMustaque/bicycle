<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BicycleBrand */

$this->title = 'Create Bicycle Brand';
$this->params['breadcrumbs'][] = ['label' => 'Bicycle Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bicycle-brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

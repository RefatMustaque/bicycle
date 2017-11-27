<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BicycleBrand */

$this->title = 'Update Bicycle Brand: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bicycle Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bicycle-brand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

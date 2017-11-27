<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BicycleInfo */

$this->title = 'Update Bicycle Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bicycle Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bicycle-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'brandData' => $brandData,
        'typeData' => $typeData,
    ]) ?>

</div>

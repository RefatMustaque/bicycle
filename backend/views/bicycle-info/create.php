<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BicycleInfo */

$this->title = 'Create Bicycle Info';
$this->params['breadcrumbs'][] = ['label' => 'Bicycle Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bicycle-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'brandData' => $brandData,
        'typeData' => $typeData,
    ]) ?>

</div>

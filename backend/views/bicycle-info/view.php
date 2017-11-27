<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BicycleInfo */

$this->title = $model->bicycle_model;
$this->params['breadcrumbs'][] = ['label' => 'Bicycle Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bicycle-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'bicycle_model',
            'brand',
            'price',
            'quantity',
            [
                'label'=>'Image',
                'format'=>'raw',
                'value' => function($data){
                    $url = "http://127.0.0.1/bicycle/backend/uploads/".$data['image_url'];
                    return Html::img($url,['alt'=>'yii','width'=>'350','height'=>'300']); 
                }
            ]
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BicycleInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bicycle Info';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bicycle-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bicycle Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>"{items}\n{summary}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'bicycle_model',
            'brand',
            'description',
            'type',
            'type_description',
            'price',
            'quantity',
            [
                'label'=>'quantity',
                'format' => 'raw',
                'value' => function($data){
                    $quantity = $data['quantity'];
                    return ""; 
                }
            ],
            [
                'label'=>'Total Price',
                'value' => function($data){
                    $total = $data['price']*$data['quantity'];
                    return $total; 
                }
            ],
            [
                'label'=>'Image',
                'format'=>'raw',
                'value' => function($data){
                    $url = "http://127.0.0.1/bicycle/backend/uploads/".$data['image_url'];
                    return Html::img($url,['alt'=>'yii','width'=>'90','height'=>'70']); 
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],

        
    ]); ?>
<?php Pjax::end(); ?></div>

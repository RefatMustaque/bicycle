<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\BicycleInfo */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#bicycleinfo-brand').change(function(){
			var chVal = $('#bicycleinfo-brand').val();
			if(chVal){
				
				$.ajax({
					   url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=bicycle-brand/get-description-by-id' ?>',
					   type: 'post',
					   data:{
							id: chVal,                  
                          
						},
						 beforeSend: function(){
						
						},
					   success: function (data) {
						$('#bicycleinfo-description').val(data);
					   }
				  });
			};
		
			})
	});
</script>

<div class="bicycle-info-form">

    <?php $form = ActiveForm::begin(['id'=>'bicycle-create-update-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'bicycle_model',['enableAjaxValidation' => true, 'enableClientValidation'=>true, 'validateOnChange'=>true])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->dropDownList($brandData,['prompt'=>'Select Brand. .'])?>

    <?= $form->field($model, 'description')->textInput() ?>

	<?= $form->field($model, 'type')->dropDownList($typeData,['prompt'=>'Select Type. .'])?>

    <?= $form->field($model, 'type_description')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

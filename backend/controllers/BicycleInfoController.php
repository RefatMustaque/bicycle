<?php

namespace backend\controllers;

use Yii;
use backend\models\BicycleInfo;
use backend\models\BicycleInfoSearch;
use backend\models\BicycleBrand;
use backend\models\Type;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * BicycleInfoController implements the CRUD actions for BicycleInfo model.
 */
class BicycleInfoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BicycleInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BicycleInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BicycleInfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BicycleInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BicycleInfo(['scenario' => 'create']);

        $brandData=$this->brandDropDownData();

        $typeData=$this->typeDropDownData();
        
        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        else if ($model->load(Yii::$app->request->post())){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            //saving image file name in database
            //$model->image_url = $model->imageFile->name;
            //getting the brand name from the selected id
            $model->brand = $listData[$model->brand];
            
            if($model->save() && $model->upload()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        else {
            return $this->render('create', [
                'model' => $model,
                'brandData' => $brandData,
                'typeData' => $typeData,
            ]);
        }
    }

    

    /**
     * Updates an existing BicycleInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //scenario to not to force user to upload image on update
        $model->scenario = 'update';

        $listData=$this->brandDropDownData();

        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        else if ($model->load(Yii::$app->request->post())) {
            //imageFile is independent variable of the model, not a column of the db
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            //if image loaded in imageFile
            if(isset($model->imageFile))
            {   
                //removing the previous image on new upload
                if($model->imageFile){
                    if(unlink('../uploads/'.$model->image_url)){
                        //saving the new uploaded image name
                        $model->image_url = $model->imageFile->name;
                    }
                }

                //save the model and calling upload function to save the immage in upload folder
                if($model->save() && $model->upload()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            //if image not uploaded
            else{   
                //saving the model without calling the upload function
                if($model->save() && $model->validate()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
     else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Deletes an existing BicycleInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //if the file removed from the server then delete it from the database;
        if(unlink('../uploads/'.$this->findModel($id)->image_url))
        {
            $this->findModel($id)->delete();
        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the BicycleInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BicycleInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BicycleInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function brandDropDownData(){
        //getting data for brand dropdown
        $brand = BicycleBrand::find()->all();
        //mapping the data taking only two values
        return ArrayHelper::map($brand,'id', 'bicycle_brand');
    }

    protected function typeDropDownData(){
        //getting data for brand dropdown
        $data = Type::find()->all();
        //mapping the data taking only two values
        return ArrayHelper::map($data,'id', 'type');
    }
    
}

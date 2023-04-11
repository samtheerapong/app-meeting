<?php

namespace backend\modules\meeting\controllers;

use backend\modules\meeting\models\Meeting;
use backend\modules\meeting\models\MeetingSearch;
use backend\modules\meeting\models\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
use backend\modules\meeting\models\Equipment;
use yii\data\ArrayDataProvider;
use backend\modules\meeting\models\Uses;


/**
 * MeetingController implements the CRUD actions for Meeting model.
 */

class MeetingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]);
    }

    /**
     * Lists all Meeting models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MeetingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meeting model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => new ArrayDataProvider(['allModels' => $model->uses]),
        ]);
    }

    /**
     * Creates a new Meeting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Meeting();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {


                // ** รอเพิ่มในส่วนการจองหลายๆห้อง

                //ตรวจสอบเงื่อนไขในการจองซ้ำ                 
                $meets = Meeting::find()
                    ->where(['room_id' => $model->room_id])
                    ->andWhere(['between','date_start',$model->date_start,$model->date_end,])
                    ->orWhere(['between','date_end',$model->date_start,$model->date_end])
                    ->one();

                if (empty($meets)) { //ถ้ามีห้องว่าง
                    //
                    $model->user_id = Yii::$app->user->getId(); // ดึงข้อมูลจากการ Login เข้ามา
                    if($model->save()){
                        $last_id = $model->id;                        
                        $equip = $_POST['Equip']; // รอแก้ไขการไม่ใช้อุปกรณ์ ยังเกิด Error
                        for($i=0; $i <count($equip); $i++){
                            Yii::$app->db->createCommand(
                                "INSERT INTO uses(meeting_id, equipment_id) VALUES(:meeting_id, :equipment_id)",
                                [':meeting_id' => $last_id, ':equipment_id' => $equip[$i]]
                            )->execute(); //เพิ่มการจองลงในฐานข้อมูล 
                        }
                    }
                    
                    Yii::$app->session->setFlash('success', 'จองห้องประชุมสำเร็จ');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else { //มีการจองอยู่แล้ว
                    Yii::$app->session->setFlash('success', 'มีการประชุมแล้ว');
                    return $this->redirect(['create']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        $equipments = Equipment::find()->all();
        return $this->render('create', [
            'model' => $model,
            'equipments' => $equipments,
        ]);
    }

    /**
     * Updates an existing Meeting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            
            $model->user_id = Yii::$app->user->getId();
            $last_id = $model->id; // ID อุปกรณ์
            $equip = $_POST['Equip']; //อุปกรณ์
            Uses::deleteAll(['meeting_id' => $id]);
            for($i = 0; $i < count($equip); $i++){
                Yii::$app->db->createCommand(
                    "INSERT INTO uses(meeting_id, equipment_id) VALUES(:meeting_id, :equipment_id)",
                                [':meeting_id' => $last_id, ':equipment_id' => $equip[$i]]
                )->execute();
                $model->save();  
            }
                     
            Yii::$app->session->setFlash('success', 'แก้ไขการจองสำเร็จ');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $equipments = Equipment::find()->all();

        return $this->render('update', [
            'model' => $model,
            'equipments' => $equipments,
        ]);
    }

    /**
     * Deletes an existing Meeting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Meeting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Meeting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Meeting::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

  
}

<?php

namespace backend\modules\personal\controllers;

use common\models\Person;
use backend\modules\personal\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\web\UploadedFile;
use Yii;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Person models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param int $user_id User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id),
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Person();
        $user = new User();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
                $user->auth_key = Yii::$app->Security->generateRandomString();

                if($user->save()){
                    $file = UploadedFile::getInstance($model, 'person_img');
                    if($file->size!=0){
                        $filepath = 'uploads/person/';
                        $filename = $user->id.'-'.md5($file->basename).'.'.$file->extension ;
                        $model->photo = $filename ;
                        $file->saveAs($filepath.$filename);
                    }
                    $model->save();
                }
                return $this->redirect(['view', 'user_id' => $model->user_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_id User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);
        $user = $model->user;
        $oldPass = $user->password_hash;

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if($oldPass!=$user->password_hash){ //กรณีเปลี่ยนรหัสผ่าน
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
                //$user->auth_key = Yii::$app->Security->generateRandomString();
            }

            if($user->save()){
                $file = UploadedFile::getInstance($model, 'person_img');
                if(isset($file->size) && $file->size!==0){
                    $filepath = 'uploads/person/';
                    $filename = $user->id.'-'.md5($file->basename).'.'.$file->extension ;
                    $model->photo = $filename ;
                    $file->saveAs($filepath.$filename);
                }
                $model->save();
            }

            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }
        
        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_id User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id)
    {
        $this->findModel($user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = Person::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\modules\meeting\controllers;

use yii\web\Controller;
use yii\web\Response;
use app\modules\timetrack\models\Timetable;
use yii2fullcalendar\models\Event;
use yii\helpers\Url;
use backend\modules\meeting\models\Meeting;

/**
 * Default controller for the `meeting` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = Response::FORMAT_JSON;
    
        //$times = \app\modules\timetrack\models\Timetable::find()->where(array('category'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();
        $times = Meeting::find()->all();


        $events = [];
    
        foreach ($times AS $time){
          //Testing
          $Event = new Event();
          $Event->id = $time->id;
          $Event->title = $time->title.'['.$time->room->name.']';
          $Event->start = $time->date_start;
          $Event->end = $time->date_end;
          $Event->color = $time->room->color; // <- อ้างอิงสีสถานะ หรือ ถ้าอ้างอิงสีห้องให้เปลี่ยนเป็น $time->status->color;
          $Event->url = url::to(['/meeting/meeting/view','id'=>$time->id]);
          $events[] = $Event;
        }
    
        return $events;
      }
}

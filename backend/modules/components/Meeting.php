<?php
namespace backend\modules\meeting\components;
use yii\base\Component;

class Meeting extends Component
{
    public function getMeetingStatus($status = null)
    {
        if($status == 0){
            $r = 'รออนุมัติ';
        }
        else if($status == 1){
            $r = 'อนุมัติ';
        }
        else if($status == 2){
            $r = 'ยกเลิก';
        }
        return $r;
    }
}
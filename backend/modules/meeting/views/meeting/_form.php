<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\meeting\models\Room;
use backend\modules\meeting\models\Equipment;
use kartik\widgets\DateTimePicker;
use yii\bootstrap4\Alert as BootstrapAlert;
use yii\bootstrap4\Widget;
use backend\modules\meeting\models\Uses;
use backend\modules\meeting\models\Status;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Meeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-form">

<?= \yii2mod\alert\Alert::widget() ?>

    <div class="card card-success">

        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div> <!-- end div card-header-->

            <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <?= $form
                            ->field($model, 'title')
                            ->textInput(['maxlength' => true]) ?>
                    </div> <!-- end div form-group col-md-8-->
                    <div class="form-group col-md-4">
                        <?= $form
                            ->field($model, 'quantity')
                            ->textInput(['maxlength' => 5]) ?>
                    </div> <!-- end div form-group col-md-4-->
                </div> <!-- end div form-row-->

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?= $form
                            ->field($model, 'description')
                            ->textarea(['rows' => 4]) ?>
                    </div><!-- end div form-group col-md-12-->
                </div><!-- end div form-row-->


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $form
                        ->field($model, 'date_start')
                        ->widget(DateTimePicker::classname(), [
                            'language' => 'th',
                            //'template' => '{input}',
                            'options' => ['placeholder' => 'วันเวลาเริ่ม ...'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'startDate' => date('Y-m-d H:i:s'), // ปิดการเลือกก่อนวันปัจจุบัน
                            ],
                        ]) ?>
                    </div><!-- end div form-group col-md-6-->
                    <div class="form-group col-md-6">
                        <?= $form
                        ->field($model, 'date_end')
                        ->widget(DateTimePicker::classname(), [
                            'language' => 'th',
                            'options' => ['placeholder' => 'วันเวลาสิ้นสุด ...'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'startDate' => date('Y-m-d H:i:s'), // ปิดการเลือกก่อนวันปัจจุบัน
                            ],
                        ]) ?> 
                    </div> <!-- end div form-group col-md-6-->
                </div> <!-- end div form-row-->
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $form
                            ->field($model, 'room_id')
                            ->dropDownlist(
                                ArrayHelper::map(Room::find()->all(), 'id', 'name')
                            ) ?>
                    </div><!-- end div form-group col-md-6-->
                    <div class="form-group col-md-6">
                        <?= $form
                            ->field($model, 'status_id')
                            ->dropDownlist(
                                ArrayHelper::map(Status::find()->all(), 'id', 'status')
                            ) ?>
                        </div> <!-- end div form-group col-md-6-->
                    </div> <!-- end div form-row-->

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label" for="equipment-id">รายการอุปกรณ์ที่ใช้ (กรุณาเลือกอย่างน้อบ 1 อุปกรณ์)</label>
                            <?php foreach ($equipments as $e) {
                                if (!$model->isNewRecord) {
                                    //แก้ไข
                                    $u = Uses::findOne([
                                        'equipment_id' => $e->id,
                                        'meeting_id' => $model->id,
                                    ]);
                                    if (!empty($u['equipment_id'])) {
                                        $selected = 'checked="checked"';
                                    } else {
                                        $selected = '';
                                    }
                                } else {
                                    //ไม่แก้ไข
                                    $selected = '';
                                } ?>  
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="Equip[]" type="checkbox" value="<?= $e->id ?>" id="inlineCheckbox<?= $e->id ?>" <?= $selected ?>>
                                    <label class="form-check-input" for="inlineCheckbox<?= $e->id ?>"> <?= $e->equipment ?></label>
                                </div><!-- end div form-check form-check-inline-->
                            <?php
                            } ?> 
                        </div><!-- end div form-group col-md-12-->
                    </div><!-- end div form-group col-md-6-->
                </div> <!-- end div form-row -->
            </div> <!-- end div card-body -->

            <div class="card-footer">
                <div class="form-group col-md-12">
                    <?= Html::submitButton('<i class="fas fa-save"></i> บันทึก', [
                            'class' => 'btn btn-success',
                        ]) ?>
                    </div><!-- end div form-group col-md-12-->
            </div><!-- end div card-footer -->            
            <?php ActiveForm::end(); ?>           
    </div> <!-- end div card card-info -->

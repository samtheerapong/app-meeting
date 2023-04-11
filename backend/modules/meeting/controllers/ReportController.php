<?php

namespace backend\modules\meeting\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use kartik\mpdf\Pdf;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    // กราฟ นับจำนวนการจองโดย Group by room
    public function actionReport1()
    {
        $sql = "SELECT COUNT(m.id) AS mid , r.name
                FROM meeting m
                LEFT JOIN room r ON r.id = m.room_id
                GROUP BY m.room_id";

        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $graph = [];
        foreach ($data as $d) {
            $graph[] = [
                'type' => 'column',
                'name' => $d['name'],
                'data' => [intval($d['mid'])],
            ];
        }

        //ArrayDataProvider ส่งให้ตาราง
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => ['mid', 'name'],
            ],
        ]);

        return $this->render('report1', [
            'graph' => $graph,
            'dataProvider' => $dataProvider,
        ]);
    }

    //รายปี
    public function actionReport2()
    {
        $y = date('Y', time());
        $sql =
            "SELECT r.name,
                COUNT(IF(MONTH(m.date_start)=1, m.id,NULL)) AS m1,
                COUNT(IF(MONTH(m.date_start)=2, m.id,NULL)) AS m2,
                COUNT(IF(MONTH(m.date_start)=3, m.id,NULL)) AS m3,
                COUNT(IF(MONTH(m.date_start)=4, m.id,NULL)) AS m4,
                COUNT(IF(MONTH(m.date_start)=5, m.id,NULL)) AS m5,
                COUNT(IF(MONTH(m.date_start)=6, m.id,NULL)) AS m6,
                COUNT(IF(MONTH(m.date_start)=7, m.id,NULL)) AS m7,
                COUNT(IF(MONTH(m.date_start)=8, m.id,NULL)) AS m8,
                COUNT(IF(MONTH(m.date_start)=9, m.id,NULL)) AS m9,
                COUNT(IF(MONTH(m.date_start)=10, m.id,NULL)) AS m10,
                COUNT(IF(MONTH(m.date_start)=11, m.id,NULL)) AS m11,
                COUNT(IF(MONTH(m.date_start)=12, m.id,NULL)) AS m12
                FROM meeting m
                LEFT JOIN room r ON r.id = m.room_id
                WHERE YEAR(m.date_start) = '" .
            $y .
            "'  GROUP BY r.id";
        // GROUP BY m.room_id";

        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $graph = [];
        foreach ($data as $d) {
            $graph[] = [
                'type' => 'column',
                'name' => $d['name'],
                'data' => [
                    intval($d['m1']),
                    intval($d['m2']),
                    intval($d['m3']),
                    intval($d['m4']),
                    intval($d['m5']),
                    intval($d['m6']),
                    intval($d['m7']),
                    intval($d['m8']),
                    intval($d['m9']),
                    intval($d['m10']),
                    intval($d['m11']),
                    intval($d['m12']),
                ],
            ];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => [
                    'name',
                    'm1',
                    'm2',
                    'm3',
                    'm4',
                    'm5',
                    'm6',
                    'm7',
                    'm8',
                    'm9',
                    'm10',
                    'm11',
                    'm12',
                ],
            ],
        ]);

        return $this->render('report2', [
            'graph' => $graph,
            'dataProvider' => $dataProvider,
        ]);
    }

    // PDDF
    public function actionReport3()
    {
        $y = date('Y', time());
        $sql =
            "SELECT r.name,
                COUNT(IF(MONTH(m.date_start)=1, m.id,NULL)) AS m1,
                COUNT(IF(MONTH(m.date_start)=2, m.id,NULL)) AS m2,
                COUNT(IF(MONTH(m.date_start)=3, m.id,NULL)) AS m3,
                COUNT(IF(MONTH(m.date_start)=4, m.id,NULL)) AS m4,
                COUNT(IF(MONTH(m.date_start)=5, m.id,NULL)) AS m5,
                COUNT(IF(MONTH(m.date_start)=6, m.id,NULL)) AS m6,
                COUNT(IF(MONTH(m.date_start)=7, m.id,NULL)) AS m7,
                COUNT(IF(MONTH(m.date_start)=8, m.id,NULL)) AS m8,
                COUNT(IF(MONTH(m.date_start)=9, m.id,NULL)) AS m9,
                COUNT(IF(MONTH(m.date_start)=10, m.id,NULL)) AS m10,
                COUNT(IF(MONTH(m.date_start)=11, m.id,NULL)) AS m11,
                COUNT(IF(MONTH(m.date_start)=12, m.id,NULL)) AS m12
                FROM meeting m
                LEFT JOIN room r ON r.id = m.room_id
                WHERE YEAR(m.date_start) = '" .
            $y .
            "'  GROUP BY r.id";
        // GROUP BY m.room_id";

        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            /* 'sort' => [
                'attributes' => [
                    'name',
                    'm1',
                    'm2',
                    'm3',
                    'm4',
                    'm5',
                    'm6',
                    'm7',
                    'm8',
                    'm9',
                    'm10',
                    'm11',
                    'm12',
            ],
            ], */
        ]);

        $content = $this->renderPartial('report3', [
            'dataProvider' => $dataProvider,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            'cssFile' => '@backend/web/css/mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' =>
                '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            'methods' => [
                'SetTitle' => 'รายงานการรจองรายเดือน',
                //'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                'SetHeader' => [
                    //'CRL Report||ออกรายงานเมื่อ: ' . date('r'),
                ],
                'SetFooter' => ['|หน้า {PAGENO}|'],
                //'SetAuthor' => 'CRL',
                //'SetCreator' => 'CRL',
                // 'SetKeywords' =>
                //     'CRL, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ],
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();

        return $this->render('report3');
    }

    public function actionReport4()
    {
        return $this->render('report4');
    }

    public function actionReport5()
    {
        return $this->render('report5');
    }
}

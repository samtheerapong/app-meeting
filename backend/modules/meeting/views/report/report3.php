<?php
use yii\grid\GridView; ?>

<div class="div">
<h2>รายงานการรจองห้องประชุม ประจำปี 2565</h2>
<hr>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //'mid',
        [
            'attribute' => 'name',
            'label' => 'ห้องประชุม',
        ],

        [
            'attribute' => 'm1',
            'label' => 'ม.ค.',
        ],
        [
            'attribute' => 'm2',
            'label' => 'ก.พ.',
        ],
        [
            'attribute' => 'm3',
            'label' => 'มี.ค.',
        ],
        [
            'attribute' => 'm4',
            'label' => 'ม.ย.',
        ],
        [
            'attribute' => 'm5',
            'label' => 'พ.ค.',
        ],
        [
            'attribute' => 'm6',
            'label' => 'มิ.ย.',
        ],
        [
            'attribute' => 'm7',
            'label' => 'ก.ค.',
        ],
        [
            'attribute' => 'm8',
            'label' => 'ส.ค.',
        ],
        [
            'attribute' => 'm9',
            'label' => 'ก.ย.',
        ],
        [
            'attribute' => 'm10',
            'label' => 'ต.ค.',
        ],
        [
            'attribute' => 'm11',
            'label' => 'พ.ย.',
        ],
        [
            'attribute' => 'm12',
            'label' => 'ธ.ค.',
        ],
    ],
]) ?>
<hr>
</div>
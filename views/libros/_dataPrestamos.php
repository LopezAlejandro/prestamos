<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->prestamos,
        'key' => 'prestamos_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'prestamos_id',
        'extension',
        'fecha_devolucion',
        [
                'attribute' => 'lectores.lectores_id',
                'label' => Yii::t('app', 'Lectores')
            ],
        'activo',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'prestamos'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);

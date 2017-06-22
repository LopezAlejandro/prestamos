<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->prestamosHasLibros,
        'key' => function($model){
            return ['prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'libros_libros_id' => $model->libros_libros_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'prestamosPrestamos.prestamos_id',
                'label' => Yii::t('app', 'Prestamos Prestamos')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'prestamos-has-libros'
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

<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->prestamosHasLibros,
        'key' => function($model){
            return ['prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'libros_libros_id' => $model->libros_libros_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'prestamosPrestamos.nro_prestamo',
                'label' => Yii::t('app', 'Nro de Prestamo')
        ],
        [
                'attribute' => 'prestamosPrestamos.lectores_id',
                'label' => Yii::t('app', 'Lector')
        ],
//		  [
//    			'attribute'=>'lectores_id', 
//    			'vAlign'=>'middle',
//    			'width'=>'180px',
//    			'value'=>function ($model, $key, $index, $widget) { 
//        						return \app\models\Lectores::findOne('lectores_id').nombre ; 
//    						},
//    			'filter'	=> false,
//    			'format' => 'raw'
//    	  ],			
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

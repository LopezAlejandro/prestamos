<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->prestamos,
        'key' => 'prestamos_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
        		'attribute' => 'prestamos_id',
        		'label'=> Yii::t('app','Nro de Préstamo')
        ],		
        'fecha_devolucion',
        [
    			'class'=>'kartik\grid\BooleanColumn',
    			'attribute'=>'activo', 
    			'vAlign'=>'middle'
		  ], 
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

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

$this->title = $model->nro_prestamo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prestamo').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->prestamos_id],
                [
                    'class' => 'btn btn-danger btn-xs',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->prestamos_id], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->prestamos_id], [
                'class' => 'btn btn-danger btn-xs',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'prestamos_id', 'visible' => false],
		  [
		  		'attribute' => 'nro_prestamo',
		  		'label' => Yii::t('app','Número de Préstamo'),
		  ],		  
		  [
            'attribute' => 'lectores.nombre',
            'label' => Yii::t('app', 'Lectores'),
        ],        
        //'extension',
        [
        		'attribute' => 'fecha_devolucion',
        		'label' => Yii::t('app','Fecha de Devolución'),
        ],	
        'activo',
        
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerMultasHasPrestamos->totalCount){
    $gridColumnMultasHasPrestamos = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'multasMultas.multas_id',
                'label' => Yii::t('app', 'Multas Multas')
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerMultasHasPrestamos,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-multas-has-prestamos']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Multas Has Prestamos')),
        ],
        'columns' => $gridColumnMultasHasPrestamos
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPrestamosHasLibros->totalCount){
    $gridColumnPrestamosHasLibros = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'librosLibros.titulo',
                'label' => Yii::t('app', 'Título'),
        ],
        [		'attribute' => 'librosLibros.ejemplar',
        			'label' => Yii::t('app','Ejemplar'),
        ]
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamosHasLibros,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestamos-has-libros']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Detalle del Préstamo')),
        ],
        'columns' => $gridColumnPrestamosHasLibros
    ]);
}
?>
    </div>
</div>

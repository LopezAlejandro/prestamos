<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

$this->title = $model->prestamos_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prestamo').' Nro  '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'prestamos_id',
        ['attribute' => 'extension', 'visible' => false],
        'fecha_devolucion',
        [
           
            'attribute' => 'lectores.nombre',
            'label' => Yii::t('app', 'Lectores'),
        
        ],
        
        [
                'attribute'=>'activo', 
                'label'=>Yii::t('app','Status'),
                'format'=>'raw',
                'value'=>$model->activo ? '<span class="label label-success">Activo</span>' : '<span class="label label-danger">Devuelto</span>',
                'valueColOptions'=>['style'=>'width:30%']
            ]
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Multas Has Prestamos')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
                'label' => Yii::t('app', 'Título')
            ],
            [
                'attribute' => 'librosLibros.ejemplar',
                'label' => Yii::t('app', 'Ejemplar')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamosHasLibros,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Detalle del Préstamo')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPrestamosHasLibros
    ]);
}
?>
    </div>
</div>
<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
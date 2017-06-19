<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Libros').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'libros_id', 'visible' => false],
        'nro_libro',	        
        'titulo',
        'ejemplar',
        [
                'attribute' => 'tipoLibro.descripcion',
                'label' => Yii::t('app', 'Tipo Libro')
        ],
        [
                'attribute' => 'estado.descripcion',
                'label' => Yii::t('app', 'Estado')
        ],
        [
                'attribute' => 'deposito.descripcion',
                'label' => Yii::t('app', 'Deposito')
        ],    
        'editorial',
        'edicion',
        'ano',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerAutorHasLibros->totalCount){
    $gridColumnAutorHasLibros = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'autorAutor.nombre',
                'label' => Yii::t('app', 'nombre del Autor')
            ],
            ];
    echo Gridview::widget([
        'dataProvider' => $providerAutorHasLibros,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Autor Has Libros')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnAutorHasLibros
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPrestamos->totalCount){
    $gridColumnPrestamos = [
        ['class' => 'yii\grid\SerialColumn'],
        'prestamos_id',
        'extension',
        'fecha_devolucion',
        [
                'attribute' => 'lectores.lectores_id',
                'label' => Yii::t('app', 'Lectores')
            ],
        'activo',
        'nro_prestamo',
        ['attribute' => 'libros_id', 'visible' => false],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamos,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Prestamos')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPrestamos
    ]);
}
?>
    </div>
</div>

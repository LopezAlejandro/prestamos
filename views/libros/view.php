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
            <h2><?= Yii::t('app', 'Libros').' - '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->libros_id],
                [
                    'class' => 'btn btn-xs btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->libros_id], ['class' => 'btn btn-xs btn-info']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->libros_id], ['class' => 'btn btn-xs btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->libros_id], [
                'class' => 'btn btn-xs btn-danger',
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
        ['attribute' => 'libros_id', 'visible' => false],
        'nro_libro',
        'titulo',
        'ejemplar',
        [
            'attribute' => 'tipoLibro.descripcion',
            'label' => Yii::t('app', 'Tipo Libro'),
        ],
        [
            'attribute' => 'estado.descripcion',
            'label' => Yii::t('app', 'Estado'),
        ],
        [
            'attribute' => 'deposito.descripcion',
            'label' => Yii::t('app', 'Deposito'),
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
                'label' => Yii::t('app', 'Nombre')
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerAutorHasLibros,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-autor-has-libros']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Autor(es)')),
        ],
        'columns' => $gridColumnAutorHasLibros
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
                'attribute' => 'prestamosPrestamos.prestamos_id',
                'label' => Yii::t('app', 'Nro de Préstamo')
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamosHasLibros,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestamos-has-libros']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Prestamos Has Libros')),
        ],
        'columns' => $gridColumnPrestamosHasLibros
    ]);
}
?>
    </div>
</div>

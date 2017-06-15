<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = $model->libros_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Libros').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->libros_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->libros_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->libros_id], [
                'class' => 'btn btn-danger',
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
        'titulo',
        'editorial',
        'ano',
        'edicion',
        'ejemplar',
        'nro_libro',
        [
            'attribute' => 'estado.estado_id',
            'label' => Yii::t('app', 'Estado'),
        ],
        [
            'attribute' => 'deposito.deposito_id',
            'label' => Yii::t('app', 'Deposito'),
        ],
        [
            'attribute' => 'tipoLibro.tipo_libro_id',
            'label' => Yii::t('app', 'Tipo Libro'),
        ],
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
                'attribute' => 'autorAutor.autor_id',
                'label' => Yii::t('app', 'Autor Autor')
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerAutorHasLibros,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-autor-has-libros']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Autor Has Libros')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestamos']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Prestamos')),
        ],
        'columns' => $gridColumnPrestamos
    ]);
}
?>
    </div>
</div>

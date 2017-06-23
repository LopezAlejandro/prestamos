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
            <h2><?= Yii::t('app', 'Prestamos').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'prestamos_id', 'visible' => false],
        'extension',
        'fecha_devolucion',
        [
                'attribute' => 'lectores.lectores_id',
                'label' => Yii::t('app', 'Lectores')
            ],
        'activo',
        'nro_prestamo',
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
                'attribute' => 'librosLibros.libros_id',
                'label' => Yii::t('app', 'Libros Libros')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamosHasLibros,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Prestamos Has Libros')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPrestamosHasLibros
    ]);
}
?>
    </div>
</div>

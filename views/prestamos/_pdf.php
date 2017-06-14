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
        'prestamos_id',
        'extension',
        'fecha_devolucion',
        'lectores_id',
        'libros_id',
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
</div>

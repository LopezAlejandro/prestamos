<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

?>
<div class="prestamos-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->prestamos_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'prestamos_id',
        ['attribute' => 'extension', 'visible' => false],
        'fecha_devolucion',
        [
            'attribute' => 'lectores.lectores_id',
            'label' => Yii::t('app', 'Lectores'),
        ],
        'activo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
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
        ['attribute' => 'prestamos_id', 'visible' => false],
        'extension',
        'fecha_devolucion',
        [
            'attribute' => 'lectores.lectores_id',
            'label' => Yii::t('app', 'Lectores'),
        ],
        [
            'attribute' => 'libros.libros_id',
            'label' => Yii::t('app', 'Libros'),
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
<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
//    [
//        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Libros')),
//        'content' => $this->render('_detail', [
//            'model' => $model,
//        ]),
//    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Autor(es)')),
        'content' => $this->render('_dataAutorHasLibros', [
            'model' => $model,
            'row' => $model->autorHasLibros,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Prestamos')),
        'content' => $this->render('_dataPrestamos', [
            'model' => $model,
            'row' => $model->prestamos,
        ]),
    ],
//            [
//        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Prestamos Has Libros')),
//        'content' => $this->render('_dataPrestamosHasLibros', [
//            'model' => $model,
//            'row' => $model->prestamosHasLibros,
//        ]),
//    ],
        ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>

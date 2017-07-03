<div class="form-group" id="add-prestamos-has-libros">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'PrestamosHasLibros',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
    	  'libros_id'=>[ // primary key attribute
            'type'=>TabularForm::INPUT_HIDDEN, 
            'columnOptions'=>['hidden'=>true]
        ], 
//        'nro_libro' => [
//        		'label' => 'Nro de Libro',
//        		'type' => TabularForm::INPUT_WIDGET,
//            'widgetClass' => \kartik\widgets\Select2::className(),
//            'options' => [
//                'data' => \yii\helpers\ArrayHelper::map(\app\models\Libros::find()->orderBy('ejemplar')->asArray()->all(), 'libros_id', 'nro_libro'),
//                'options' => ['placeholder' => Yii::t('app', 'Nro de Libro')],
//             ]   
//        ],
        
        'libros_libros_id' => [
            'label' => 'Libros',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Libros::find()->orderBy('ejemplar')->asArray()->all(), 'libros_id', 'nro_libro'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Libros')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        
        'titulo' => [
        		'type' => tabularForm::INPUT_STATIC,
        		'options' => [
        		'data' => 'librosLibros.titulo'
        		],
        		
        ],
        'ejemplar' => [
        		'type' => tabularForm::INPUT_STATIC,
        		
        ],
        
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowPrestamosHasLibros(' . $key . '); return false;', 'id' => 'prestamos-has-libros-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Agregar Libros al Préstamo'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPrestamosHasLibros()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use app\models\Localidad;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use app\models\Coordenada;
use app\models\Estacion;
use yii\db\Query;
$connection = \Yii::$app->db;

/*




*/
$data1 =  ArrayHelper::map(Coordenada::find()->all(),'idcoordenada','latitud');
$data2 =  ArrayHelper::map(Coordenada::find()->all(),'idcoordenada','longitud');


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="estilo.css">

  <div id="capa-mapa" style="width:400px;height:400px"></div>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true">
    </script>
    

  <script type="text/javascript">
    // creamos un array con la información de todos los puntos:
    // su nombre, latitud, longitud,
    // el icono que le queramos asignar (ver más adelante)
    // y un html totalmente personalizable a vuestro gusto, incluyendo imágenes y enlaces
    
    
   


    function inicializaGoogleMaps() {
        // Coordenadas del centro de nuestro recuadro principal
        var x =41.389624;
        var y = 2.15988563537;
        var mapOptions = {
            zoom: 13,
            center: new google.maps.LatLng(x, y),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("capa-mapa"), mapOptions);
        setGoogleMarkers(map);
    }
    var markers = Array();
    var icon1 = Array();
    var infowindowActivo = false;
    function setGoogleMarkers(map) {
         var arrayLat = <?php echo json_encode($data1); ?>;
         var arrayLon = <?php echo json_encode($data2); ?>;
        // Definimos los iconos a utilizar con sus medidas
        
        var icon1 = new google.maps.MarkerImage(
            "http://www.vinx.info/uploads/editor/map-green.png",
            new google.maps.Size(20, 30)
        );
 
        var i;
         
        
        for(i in arrayLat) {
              var myLatLng = new google.maps.LatLng(arrayLat[i], arrayLon[i]);
            markers=new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: icon1
            });
            markers.infoWindow=new google.maps.InfoWindow({
                content: "<div>+arrayDescripcion+</div>"
            });
            google.maps.event.addListener(markers, 'click', function(){      
                if(infowindowActivo)
                    infowindowActivo.close();
                infowindowActivo = this.infoWindow;
                infowindowActivo.open(map, this);
            });
         
        }
    }
    inicializaGoogleMaps();

  </script>
  


</head>
<body>
  <header>
    <h1></h1>
  </header>
  <section>
    <article id="capa-mapa">
      
    </article>
  </section>
  <footer></footer>
</body>
</html>



<?php 
$this->title = 'Coordenadas';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$clientes[]=array("nombre"=>"Norma", "edad" =>"25");
$clientes[]=array("nombre"=>"Martha", "edad" =>"18");
$clientes[]=array("nombre"=>"Juan", "edad" =>"23");
$clientes[]=array("nombre"=>"Mateo", "edad" =>"22");
$clientes[]=array("nombre"=>"Marcos", "edad" =>"26");


$objJson=json_encode($clientes);


    ?>


    <script type="text/javascript">
      var json=eval(<?php echo $objJson; ?>);
      
   
    for (var i = 0; i >= json.length; i++) {
       document.write("Nombre: "+json[i].nombre +" - Edad: "+json[i].edad+"<br/>"); 
    };
      
    </script>

<div class="coordenada-index">

   <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
             'latitud',
            'longitud',
            'asnm',
             [
                'attribute'=>'estacion',
                'value'=>'estacion0.nombre',
               
            ],
             [
                'attribute'=>'nodo',
                'value'=>'nodo0.nombre',
               
            ],
             [
                'attribute'=>'reportefalla',
                'value'=>'reportefalla0.nombre',
               
            ],
            ]; ?>



<?php ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
     'target' => ExportMenu::TARGET_BLANK,
     'exportConfig' => [
      
                ]
]);?>


<?php Pjax::begin(['id'=>'localGrid', 'timeout' => false, 
'enablePushState' => false]);?>
    <?= GridView::widget([
        'id'=>'local',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'columns' =>  [
            ['class' => 'yii\grid\SerialColumn',
               'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],
           

            //'idlocalidad',
            //'localidadIdlocalidad.nombre',
            // COMO AGREGAR AUTOCOMPLETAR EN FILTROS OJO
           /*  [
                'attribute'=>'nombre',
                 'value'=>'nombre',
                 'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(Localidad::find()->orderBy('nombre')->asArray()->all(), 'idlocalidad','nombre'), 
                'filterWidgetOptions'=>[
                
                  'pluginOptions' =>['allowClear' =>true]
                   ],
                'filterInputOptions'=>['placeholder'=>'Lugar'],
                'format'=>'raw'
               
            ],*/
           
           'latitud',
            'longitud',
            'asnm',
             [
                'attribute'=>'estacion',
                'value'=>'estacion0.nombre',
               
            ],
             [
                'attribute'=>'nodo',
                'value'=>'nodo0.nombre',
               
            ],
             [
                'attribute'=>'reportefalla',
                'value'=>'reportefalla0.nombre',
               
            ],
          

             ['class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{view}{update}{delete}{javi_button}',
                'buttons' => ['javi_button' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pushpin"></span>',['create']);
                        }],
                ],
        ],
        
         'pjax'=>true,
         'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjaxSettings'=>[
           'neverTimeout'=>true,
            //'loadingCssClass'=>true,
           
             ],

         'exportConfig'=> [
                GridView::EXCEL=>[
                     'filename' => Yii::t('kvgrid', 'Appointments'),
                    'showPageSummary' => true,
                ],

                GridView::PDF => [
        'label' => Yii::t('kvgrid', 'PDF'),
        //'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'grid-export'),
        'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'c',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods' => [
                'SetHeader' => [
                //    ['odd' => $pdfHeader, 'even' => $pdfHeader]
                ],
                'SetFooter' => [
                //   ['odd' => $pdfFooter, 'even' => $pdfFooter]
                ],
            ],
            'options' => [
                'title' => 'HOLAAA',
                'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf')
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],


            ],

        'toolbar' => [
        [
            'content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Coordenada', ['create'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
                . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-link']),
           
        ],
        '{export}',
     '{toggleData}',
        ],

       'toggleDataContainer' => ['class' => 'btn-group-sm'],
       // 'export'=>true,
        'exportContainer' => ['class' => 'btn-group-sm'],
        'layout'=>"{summary}\n{items}\n{pager}",
        'responsiveWrap'=>false,
        //'resizableColumns'=>true,
        'bootstrap' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover'=>true,

        'pager' => [
                  //   'firstPageLabel' => 'First Page',
                    //  'lastPageLabel' => 'Last Page',
                  'class' => '\yii\widgets\LinkPager',
                   //    'class' => 'app\widgets\DropdownPager',
                //other pager config if nesessary
                ],


        'panel' => [
        'heading'=>'<h3 class="panel-title">Coordenadas</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],



    ]); ?>



<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>

<?php Pjax::end();




?>



</div>



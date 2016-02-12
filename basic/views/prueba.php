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
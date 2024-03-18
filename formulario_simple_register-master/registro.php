
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
     
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>


<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"] ;
$edad = $_POST["edad"] ;
$lugar_de_origen = $_POST["lugar_de_origen"] ;
$fecha = $_POST["fecha"] ;
$tipo = $_POST["tip"] ;
$bebida = $_POST["bebida"] ;
$platillo = $_POST["platillo"] ;
$ir_rest = $_POST["ir_rest"] ;
$com_fav = $_POST["com_fav"] ;
$postres = $_POST["postres"] ;
$tipo_rest = $_POST["tipo_rest"] ;
$beb_alcoholica = $_POST["beb_alcoholica"] ;
$alergico = $_POST["alergico"] ;

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "dbformulario";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO tabla_form (nombre, edad, lugar_de_origen, fecha, tipo, bebida, platillo, ir_rest, com_fav, postres, veg, tipo_rest, beb_alcoholica, alergico)
                             VALUES ('$nombre','$edad','$lugar_de_origen','$fecha','$tipo','$bebida','$platillo','$ir_rest','$com_fav','$postres','$veg','$tipo_rest','$beb_alcoholica','$alergico')";
                          
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM tabla_form";
        

        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>edad</th></h1>";
echo "<th><h1>lugardeorigen</th></h1>";
echo "<th><h1>fecha</th></h1>";
echo "<th><h1>tipo</th></h1>";
echo "<th><h1>bebida</th></h1>";
echo "<th><h1>platillo</th></h1>";
echo "<th><h1>irrest</th></h1>";
echo "<th><h1>comfav</th></h1>";
echo "<th><h1>postres</th></h1>";
echo "<th><h1>veg</th></h1>";
echo "<th><h1>tiporest</th></h1>";
echo "<th><h1>bebalcolohica</th></h1>";
echo "<th><h1>alergico</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['edad']. "</td></h2>";
    echo "<td><h2>" . $colum['lugar_de_origen']. "</td></h2>";
    echo "<td><h2>" . $colum['fecha']. "</td></h2>";
    echo "<td><h2>" . $colum['tipo']. "</td></h2>";
    echo "<td><h2>" . $colum['bebida']. "</td></h2>";
    echo "<td><h2>" . $colum['platillo']. "</td></h2>";
    echo "<td><h2>" . $colum['ir_rest']. "</td></h2>";
    echo "<td><h2>" . $colum['com_fav'] . "</td></h2>";
    echo "<td><h2>" . $colum['postres'] . "</td></h2>";
    echo "<td><h2>" . $colum['veg']. "</td></h2>";
    echo "<td><h2>" . $colum['tipo_rest']. "</td></h2>";
    echo "<td><h2>" . $colum['beb_alcoholica']. "</td></h2>";
    echo "<td><h2>" . $colum['alergico']. "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html"> Volver Atrás</a>';


?>


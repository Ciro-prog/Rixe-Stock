<?php

include('conexion.php');

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final  = $_POST['fecha_final'];

$salidas = $conexion->query("SELECT sales.qty,sales.destination,sales.date,products.name,products.partNo FROM sales inner join products on sales.product_id=products.id WHERE 'date' BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'"); 


echo '<table style="width:100%">
  <thead class="bg-primary">
    <th>Nombre</th>
    <th>Grupo</th> 
    <th>Carrera</th>
    <th>Fecha Ingreso</th>
  </th>
  </thead>
  <tbody>';

while($salida = $salidas->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr> 
			<td>'.$salida['nombre'].'</td>
			<td>'.$salida['grupo'].'</td>
			<td>'.$salida['carrera'].'</td>
			<td>'.$salida['fecha_ingreso'].'</td>
		</tr>';

}

echo '</tbody> </table>'; 

?>
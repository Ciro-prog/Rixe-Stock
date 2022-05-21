<?php


 

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final  = $_POST['fecha_final'];


  

$alumnosLista = $conexion->query("SELECT * FROM sales  WHERE date BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'"); 


echo '<table style="width:100%">
  <thead class="bg-primary">
    <th>Nombre</th>
    <th>Grupo</th> 
    <th>Carrera</th>
    <th>Fecha Ingreso</th>
  </th>
  </thead>
  <tbody>';

while($alumno = $alumnosLista->fetch(PDO::FETCH_ASSOC))
{
	echo '<tr> 
			<td>'.$alumno['nombre'].'</td>
			<td>'.$alumno['grupo'].'</td>
			<td>'.$alumno['carrera'].'</td>
			<td>'.$alumno['fecha_ingreso'].'</td>
		</tr>';

}

echo '</tbody> </table>'; 

?>

<html lang="es">
	<head> 
		<title>ITIC TUTORIALES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>Filtro de Fechas AJAX</h3>
			</div>
		</header>

<form class="form-inline"  method="post"  name="formFechas" id="formFechas">
    <div class="col-xs-10 col-xs-offset-3">
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" class="form-control" name="fecha_inicio" required>
        </div>
        <div class="form-group">
            <label for="fecha_final">Fecha Final:</label>
            <input type="date" class="form-control" name="fecha_final" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>

<br><br><br>

<section id="tabla_resultado">
<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
</section>

        
</body>
</html>


<script type="text/javascript">
 
    $('Formfechas').submit(function(e){

        e.preventDefault();

        var form = $($this);
        var url = form.attr('action');

        $.ajax(
        {
            type: "POST",
            url: 'fechas.php',
            data: form.serialize(),
            success: function(data)
            {
                $('#tabla_resultado').html('');
                $('#tabla_resultado').append(data); 
            }
        });
    }); 

</script>

<!-- DataTable (only for more than 10 items)-->
<?php if (count_id() > 10): ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tbl-sales').DataTable({
    })
  })
  
</script>
<?php endif; ?>
<?php include_once('layouts/footer.php'); ?>
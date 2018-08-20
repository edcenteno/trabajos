<?php
require 'librerias.php';


?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Usuarios</a>
	</li>
	<li class="breadcrumb-item active">Usuarios</li>
</ol>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Usuarios</div>
		<div class="card-body">

			<hr>
			<div class="row table-responsive">
				<table class="table table-bordered table-striped responsive" id="mitabla">
					<thead>
						<tr>
							<th></th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Producto</th>
							<th>Periodo</th>
							<th>Estado</th>
							<th>N. recibo</th>
							<th>Ultima Conex</th>
							<th>Acción</th>

						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Producto</th>
							<th>Periodo</th>
							<th>Estado</th>
							<th>N. recibo</th>
							<th>Ultima Conex</th>
							<th>Acción</th>

						</tr>
					</tfoot>
					<tbody>
						
							<tr>

								<td><?php  ?></td>
								<td><?php echo "hola"?></td>
								
								<td><?php echo "hola" ?></td>
								<td><?php echo "hola" ?></td>
								<td><?php echo "hola" ?></td>
								<td><?php echo "hola" ?></td>
								<td><?php echo "hola" ?></td>
								<td><?php echo "hola" ?></td>
								<td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php ?>">Ver Más<i class="fa fa-fw fa-plus"></i></button><br>

								</td>


							</tr>

							

						
					</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Información actualizada <?php echo date('d-m-Y h:i:s A'); ?></div>
		</div>
	</div>


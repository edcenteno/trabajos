<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Busqueda</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a></li>
                    <li class="breadcrumb-item active">Busqueda</li>
                </ol>

            </div>
        </div>
    </div>


 <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


         <button type="button" class="btn btn-default" id="daterange-btn">

            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>
          <div class="box-tools pull-right">

        <?php

        if(isset($_GET["fechaInicial"])){

          $fechaini=$_GET["fechaInicial"];
          $fechafin=$_GET["fechaFinal"];
         // echo $fechaini;
         // echo $fechafin;

          echo "<a href='vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial=$fechaini&fechaFinal=$fechafin'>";



        }else{

           echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

        }

        ?>

           <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

          </a>

        </div>


    <div class="box-body">

    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

     <thead>

      <tr>

        <th>FECHA DE REGISTRO</th>
        <th>DNI</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>PLACA</th>
        <th>ANTECEDENTES PENALES</th>
        <th>ANTECEDENTES JUDICIAL</th>
        <th>ANTECEDENTES POLICIAL</th>
        <th>RECORD CONDUCTOR</th>
        <th>RESULTADO</th>
        <th>SOAT</th>

        <th>OBSERVACION</th>

      </tr>

     </thead>

     <tbody>

     <?php

       if(isset($_GET["fechaInicial"])){

         $fechaInicial = $fechaini;
         $fechaFinal = $fechafin;

       }else{

         $fechaInicial = null;
         $fechaFinal = null;

       }

       $respuesta = ControladorConductor::ctrRangoFechasConductor($fechaInicial, $fechaFinal);

       foreach ($respuesta as $key => $value) {

       echo ' <tr>
               <td>'.$value["fecha"].'</td>';

               if($value["observacion"] != ""){

                  echo '<td><label class="label label-warning">'.$value["dni"].'</label></td>';

               }else{

                 echo '<td>'.$value["dni"].'</td>';

               }


       echo '  <td>'.$value["nombre"].'</td>
               <td>'.$value["apellido"].'</td>
               <td>'.$value["placa"].'</td>
               <td>'.$value["ant_penales"].'</td>
               <td>'.$value["ant_judicial"].'</td>
               <td>'.$value["ant_policial"].'</td>
               <td>'.$value["record_cond"].'</td>';

               if($value["resultado"] == "APTO"){

                  echo '<td><label class="label label-success">'.$value["resultado"].'</label></td>';

               }else{

                 echo '<td><label class="label label-danger">'.$value["resultado"].'</label></td>';

               }

               echo '<td>'.$value["soat"].'</td>';

               /*if($value["pdf"] != 0){

                 echo '<td><a href="https://cabifyperu.pe/usuario_arhu/docs/'.$value['pdf'].'" target="_blank"><img src="vistas/img/sist/pdf.png">';

               }else{

                 echo '<td><img src="vistas/img/sist/pdfoff.png" onClick="alerta()"></td>';

               }*/

               if($value["observacion"] != ""){

                  echo '<td><label class="label label-warning">'.$value["observacion"].'</label></td>';

               }else{

                 echo '<td>'.$value["observacion"].'</td>';

               }

               /* echo  '</td>
               <td>

                 <div class="btn-group">

                   <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["cont"].'" data-toggle="modal" data-target="#modalEditarConductor"><i class="fa fa-pencil"></i></button>

                 </div>

               </td>*/

            echo '</tr>';
     }


     ?>

     </tbody>

    </table>
   </div>
  </div>
</div>
</div>


    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
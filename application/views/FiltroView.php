<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tareas-Gestion de Taller</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap.min.css">

        <style>

        </style>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head> 
    <body>
        <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark static-top">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar navbar-inverse">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="./gantt">Autosol</a>
                                <i class="fa fa-gamepad" aria-hidden="true">&nbsp;</i>
                                <img alt="Brand" src="assets/images/logos.png" class="d-inline-block align-top">

                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">                                              
                                    <li><a href="./gantt">Gantt</a></li>
                                    <li><a href="/autosol/importacion">Importar Tareas</a></li>
                                    <li><a href='<?php echo site_url('tarea/empleados_management')?>'>Empleados</a></li>
                                    <li><a href='<?php echo site_url('tarea/tarealist')?>'>Lista de Tareas</a></li>
                                    <li><a href="./filtro">Filtrado de Tareas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <div class="container">
            <div class="page-header">
                <center><h1>Filtrado de Tareas - <small>Taller Autosol</small></h1></center>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" >Filtrado por Estado: </h3>
                </div>
                <div class="panel-body">
                    <form id="form-filter" class="form-horizontal">
                        <div class="form-group">
                            <label for="country" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-4">
                                <?php echo $form_country; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="LastName" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">
                                <button type="button" id="btn-filter" class="btn btn-primary">Filtrar</button>
                                <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table id="table" class="table table-striped table-border dt-head-center" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Mecanico</th>
                        <th>Cliente</th>
                        <th>Patente</th>
                        <th>Vehiculo</th>
                        <th>Descripcion</th>
                        <th>Estado</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>Mecanico</th>
                        <th>Cliente</th>
                        <th>Patente</th>
                        <th>Vehiculo</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div>
                        <a class="logo" title="AUTOSOL - Sistema de Gestion de Taller" href="">&copy; AUTOSOL - Sistema de Gestion de Taller</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/jquery/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>


        <script type="text/javascript">

            var table;

            $(document).ready(function () {

                //datatables
                table = $('#table').DataTable({

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.

                    "jQueryUI": true,

                    "responsive": true,
                    "language": {//Traduccion del Datatable....
                        "lengthMenu": "Mostrar _MENU_ registros por página.",
                        "zeroRecords": "Lo sentimos. No se encontraron registros.",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros aún.",
                        "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                        "search": "Búsqueda",
                        "LoadingRecords": "Cargando ...",
                        "Processing": "Procesando...",
                        "SearchPlaceholder": "Comience a teclear...",
                        "paginate": {
                            "previous": "Anterior",
                            "next": "Siguiente",
                        }
                    },
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('filtro/ajax_list') ?>",
                        "type": "POST",

                        "data": function (data) {
                            data.estado = $('#estado').val();
                            data.FirstName = $('#FirstName').val();
                            data.LastName = $('#LastName').val();
                            data.address = $('#address').val();
                        },

                    },

                    //Set column definition initialisation properties.
                    "columnDefs": [
                        {
                            "targets": [0], //first column / numbering column
                            "orderable": false, //set not orderable
                            "className": "dt-head-center",

                        }, ],

                    "rowCallback": function (row, data, dataIndex) {
                        if (data[6] == "Terminado") {
                            $(row).css('background-color', '#77FF33');
                        } else {
                            if (data[6] == "Detenido") {
                            $(row).css('background-color', '#FF4633');
                        } else {
                            $(row).css('background-color', '#FFFC33');
                        }
                        }
                    }


                });



                $('#btn-filter').click(function () { //button filter event click
                    table.ajax.reload();  //just reload table
                });
                $('#btn-reset').click(function () { //button reset event click
                    $('#form-filter')[0].reset();
                    table.ajax.reload();  //just reload table
                });


            });

        </script>

    </body>
</html>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="./static/lib/dhtmlxGantt/samples/common/third-party/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css">  
<script src="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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
                                <li><a href="/autosol/gantt">Gantt</a></li>
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
    <br>
    <br>

    <div class="container-fluid">  
        <div class="row">

            <div class="col-md-12">
                <div class="container">
                    <h2>Importacion de Tareas</h2>
                    <p>A traves de esta interfaz podemos importar archivos de Excel(xlsx) y guardarlos en la Base de Datos.</p>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Importacion</div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>importacion/guardar_horario" class="form-group" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label>Seleccione un xlxs</label>
                                            <input type="file" name="file" id="file" accept=".xlsx" class="form-control" >
                                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>

                                        </div>



                                    </div>

                                    <div class="col-md-3" style="top:25px; left: 30px;" >
                                        <div class="form-group">
                                            <button type="submit" id="Ingresar" name="Ingresar" class="btn bg-aqua">Guardar</button>
                                            <button name="cancelar" id="cancelar" class="btn bg-red" style="width:80px;">Cancelar</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
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
    </div>





</section>

</body>

</html>
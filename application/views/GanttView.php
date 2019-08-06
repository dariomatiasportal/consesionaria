<script src="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
<script src="./static/lib/dhtmlxGantt/codebase/sources/locale/locale_es.js" charset="utf-8"></script><!--Idioma -->
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">
<!--Estilo boostrap-->
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="./static/lib/dhtmlxGantt/codebase/sources/ext/dhtmlxgantt_marker.js" type="text/javascript" charset="utf-8"></script><!-- Linea que marca el Dia-->


<style type="text/css">
    html, body{ height:100%; padding:0px; margin:0px; }
    .weekend{ background: #f4f7f4 !important;}
    .gantt_selected .weekend{ background:#FFF3A1 !important; }
    .well {
        text-align: right;
    }
    @media (max-width: 991px) {
        .nav-stacked>li{ float: left;}
    }
    .container-fluid .row {
        margin-bottom: 10px;
    }
    .container-fluid .gantt_wrapper {
        height: 700px;
        width: 100%;
    }
    .gantt_container {
        border-radius: 4px;
    }
    .gantt_grid_scale { background-color: transparent; }
    .gantt_hor_scroll { margin-bottom: 1px; }

    /*Linea de Hora*/
    .status_line{
        background-color: #000000;
    }

    /*Lightbox*/
    #title1{
      padding-left:35px;
      color:black;
      font-weight:bold;
    }
    #title2{
      padding-left:15px;
      color:black;
      font-weight:bold;
    }


</style>
<body>
<div class="container-fluid">
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
                            <li><a href="/codeigniter/gantt">Gantt</a></li>
                            <li><a href="/codeigniter/importacion">Importar Tareas</a></li>
                            <li><a href="./empleados_management">Empleados</a></li>
                            <li><a href='<?php echo site_url('tarea/tarealist')?>'>Lista de Tareas</a></li>
                            <li><a href="/codeigniter/filtro">Filtrado de Tareas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-push-10">
            <div class="panel panel-default">                
                <div class="panel-heading">
                    <h3 class="panel-title">Ordenar Gantt</h3>
                </div>
                <div class="panel-body">
                    <input type='button'  value='Ordenar A-Z' onclick='sortByName()'>
                </div>
            </div>

            <div class="panel panel-default">                
                <div class="panel-heading">
                    <h3 class="panel-title">Ordenar Gantt</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked" id="gantt_info">
                            <div class="filters_wrapper" id="filters_wrapper">
                                <label>
                                    <input type="checkbox" name="Araya" checked />
                                    Araya
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Alanoca Ivan" checked/>
                                    Alanoca Ivan
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Ale Vera Nestor" checked/>
                                    Ale Vera Nestor
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Cespedes" checked/>
                                    Cespedes
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Fernandez Pablo" checked/>
                                    Fernandez Pablo
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Garcia Ricardo" checked/>
                                    Garcia Ricardo
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Gomez Carlos" checked="" />
                                    Gomez Carlos
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Gutierrez Antonio" checked/>
                                    Gutierrez Antonio
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Herrera Marcos" checked/>
                                    Herrera Marcos
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Pereyra Marcelo" checked/>
                                    Pereyra Marcelo
                                </label><br>
                                <label>
                                    <input type="checkbox" name="Poclava Nestor" checked/>
                                    Poclava Nestor
                                </label><br>
                                <button class="btn">Deseleccionar</button>
                            </div>
                        </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-pull-2">
            <div class="gantt_wrapper panel" id="gantt_here"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <div>
                    <a class="logo" title="DHTMLX - JavaScript Web App Framework &amp; UI Widgets" href="http://dhtmlx.com/docs/products/dhtmlxGantt/">&copy; DHTMLX</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	fec = new Date();
    dia = fec.getDate();
    mes = fec.getMonth();
    anio = fec.getFullYear();
    hora = fec.getHours();
    min = fec.getMinutes();

    //---Linea de Hora
    var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
    var today = new Date(anio, mes, dia, hora, min);

    var start = new Date(anio, mes, dia, hora, min);
    gantt.addMarker({
        start_date: start,
        css: "status_line",
        text: "Hora del día",
        title: "Start project: " + date_to_str(start)
    });

    //---Botones Orden
    var p_direction = false;
    var n_direction = false;
    function sortByName(){
        if (n_direction){
            gantt.sort("mecanico",false);
        } else {
            gantt.sort("mecanico",true);
        }
        n_direction = !n_direction;
    };

    //Filtrado 
    //Filtrado 
    /*    var filter_inputs = document.getElementById("filters_wrapper").getElementsByTagName("input");
        for (var i=0; i<filter_inputs.length; i++) {
            var filter_input = filter_inputs[i];

            // attach event handler to update filters object and refresh data (so filters will be applied)
            filter_input.onchange = function() {
                gantt.refreshData();
            }
        }

        function hasPriority(parent, mecanico){
            if(gantt.getTask(parent).mecanico == mecanico)
                return true;

            var child = gantt.getChildren(parent);
            for(var i = 0; i < child.length; i++){
                if(hasPriority(child[i], mecanico))
                    return true;
            }
            return false;
        }

        gantt.attachEvent("onBeforeTaskDisplay", function(id, task){
            for (var i=0; i<filter_inputs.length; i++) {
                var filter_input = filter_inputs[i];


                if (filter_input.checked){
                    if (hasPriority(id, filter_input.name)){
                        return true;
                    }
                }

            }
            return false;
        });

    $('.btn').click(function() {
        $('input[type=checkbox]').each(function() 
        { 
            gantt.refreshData();
            this.checked = false; 
        }); 
    })*/
    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.step = 1;
    gantt.config.scale_unit = "hour";
    gantt.config.date_scale = "%g %a";
    gantt.config.min_column_width = 25;
    gantt.config.duration_unit = "minute";
    gantt.config.duration_step = 60;
    gantt.config.scale_height = 75;

    gantt.config.subscales = [
	    {unit: "day", step: 1, date: "%j %F, %l"},
	    {unit: "minute", step: 30, date: "%i"}
	];

	gantt.config.columns = [
        {name: "cliente", label: "Cliente", width: "*", tree: true},
        {name: "vehiculo", label: "Vehiculo", align: "center"},
        {name:"orden",   label:"Orden",   align: "center"},
        //{name: "mecanico", label: "Mecanico", align: "center"}                
        {name:"mecanico",   label:"Mecanico",   align: "center", width : '70', template: function (obj) {
                if (obj.mecanico == "Araya") return "Araya";
                if (obj.mecanico == "Alanoca Ivan") return "Alanoca";
                if (obj.mecanico == "Ale Vera Nestor") return "Ale Vera";
                if (obj.mecanico == "Cespedes") return "Cespedes";
                if (obj.mecanico == "Fernandez Pablo") return "Fernandez";
                if (obj.mecanico == "Garcia Ricardo") return "Garcia";
                if (obj.mecanico == "Gomez Carlos") return "Gomez";
                if (obj.mecanico == "Gutierrez Antonio") return "Gutierrez";
                if (obj.mecanico == "Herrera Marcos") return "Herrera";
                if (obj.mecanico == "Pereyra Marcelo") return "Pereyra";
                if (obj.mecanico == "Poclava Nesto") return "Poclava";
                return "Cruz";
            }}
    ];

    gantt.locale.labels.section_template = "Detalle";
    //https://docs.dhtmlx.com/gantt/desktop__lightbox_templates.html
    gantt.config.lightbox.sections = [
        {name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
        {name:"template", height:30, type:"template", map_to:"my_template"},
        //{name: "period", type: "time", map_to: "auto"}
        
    ];

    gantt.templates.time_picker = function(date){
    return gantt.date.date_to_str(gantt.config.time_picker)(date);
    };

    gantt.attachEvent("onBeforeLightbox", function(id) {
        var task = gantt.getTask(id);
        task.my_template = "<span id='title1'>Asesor: </span>"+ task.asesor+"<span id='title2'>N° de Orden: </span>"+ task.orden +" <br>";
    return true;
    });


    gantt.init("gantt_here", new Date(anio, mes, dia,7), new Date(anio, mes, dia+1));
    gantt.load("./gantt/data", "xml");

    var dp = new dataProcessor("./gantt/data");
    dp.init(gantt);

</script>
</body>
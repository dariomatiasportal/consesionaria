<script src="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">

<style type="text/css">
    html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
</style>

<div id="gantt_here" style='width:100%; height:250px;'></div>

<script type="text/javascript">
    fec = new Date();
    dia = fec.getDate();
    mes = fec.getMonth();
    anio = fec.getFullYear();
    hora = fec.getHours();
    min = fec.getMinutes();

    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.step = 1;
    gantt.config.scale_unit= "day";

    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.step = 1;
    gantt.config.scale_unit = "hour";
    gantt.config.date_scale = "%g %a";
    gantt.config.min_column_width = 25;
    gantt.config.duration_unit = "minute";
    gantt.config.duration_step = 60;
    gantt.config.scale_height = 75;
    gantt.config.editable_property = "mecanico";

    gantt.config.subscales = [
        {unit: "day", step: 1, date: "%j %F, %l"},
        {unit: "minute", step: 30, date: "%i"}
    ];

    gantt.config.columns = [
        {name: "cliente", label: "Cliente", width: "*", tree: true},
        {name: "vehiculo", label: "Vehiculo", align: "center"},
        //{name:"orden",   label:"Orden",   align: "center"},
        {name: "orden", label: "Detalle", align: "center"},
        {name:"mecanico",   label:"Mecanico",   align: "center", width : '70'}
        //{name: "text", label: "Detalle", align: "center"},                
    ];

    gantt.init("gantt_here", new Date(anio, mes, dia,8), new Date(anio, mes, dia,21));
    gantt.load("./ganttuno/data", "xml");

    var dp = new dataProcessor("./ganttuno/data");
    dp.init(gantt);


</script>
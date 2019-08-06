<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once (APPPATH.'/third_party/Spout/Autoloader/autoload.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

//Con las lineas anteriores cargamos la librería

class Importacion extends CI_Controller {

    function __construct() {
        parent::__construct();

        //esto es de mi proyecto, no lo consideren
        //$this->load->model('mLogin');
        $this->load->model('GanttModel');
        $this->load->database();
        //$this->load->model('mHorarios');
    }

    public function index() {
        //aquí solo estoy cargando el diseño no lo tomen en consideración
        //$this->load->view('layouts/header.php');
        $this->load->view('ImportacionView');
        //$this->load->view('layouts/footer.php');
    }

    public function guardar_horario() {


        if (!empty($_FILES['file']['name'])) {


            $pathinfo = pathinfo($_FILES["file"]["name"]);


            if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') && $_FILES['file']['size'] > 0) {

                // Nombre Temporal del Archivo
                $inputFileName = $_FILES['file']['tmp_name'];

                //Lee el Archivo usando ReaderFactory
                $reader = ReaderFactory::create(Type::XLSX);

                //Esta linea mantiene el formato de nuestras horas y fechas
                //Sin esta linea Spout convierte la hora y fecha a su propio formato
                //predefinido como DataTime

                $reader->setShouldFormatDates(true);

                // Abrimos el archivo
                $reader->open($inputFileName);
                $count = 1;

                //Numero de Hojas en el Archivo
                foreach ($reader->getSheetIterator() as $sheet) {

                    // Numero de filas en el documento EXCEL
                    foreach ($sheet->getRowIterator() as $row) {

                        // Lee los Datos despues del encabezado
                        // El encabezado se encuentra en la primera fila
                        if ($count > 1) {


                            $data = array(
                                //rut_usu, fecha_ini, y fecha_ter son imputs del formulario
                                //no se encuentran en el archivo EXCEL
                                //los estoy capturando por POST
                                //'rut_usu' => $this->input->post('rut_usu'),
                                'cliente' => $row[0],
                                'patente' => $row[1],
                                'vehiculo' => $row[2],
                                'text' => $row[3],
                                    //'' => $row[4]
                                    //'jueves' => $row[5],
                                    //'viernes' => $row[6],
                                    //'sabado' => $row[7],
                                    //'fecha_ini' => $this->input->post('fecha_ini'),
                                    //'fecha_ter' => $this->input->post('fecha_ter')
                            );


                            $this->db->insert('gantt_tasks', $data);
                            echo "<script>alert('Archivo fue importado exitosamente.');</script>";
                            redirect('tarea', 'refresh');
                        }
                        $count++;
                    }
                }

                // cerramos el archivo EXCEL
                $reader->close();
            } else {

                echo "Seleccione un tipo de Archivo Valido";
            }
        } else {

            echo "Seleccione un Archivo EXCEL";
        }
    }

}

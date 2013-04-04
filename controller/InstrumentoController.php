<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../lib/helper.php';
require_once '../model/Matriz.php';
require_once '../model/Instrumento.php';
require_once '../model/Pregunta.php';
require_once '../model/Ubigeo.php';
require_once '../model/Encabezado.php';

class InstrumentoController extends Controller {

    //put your code here
    public function index() {
        $matriz = new Matriz();
        $data = array();
        $data['instrumentos'] = $matriz->list_instrumentos();
        $data['titulo'] = "Instrumentos de Control";
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Instrumento/instrumento.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function create() {
        $matriz = new Matriz();
        $data = array();
        $data['instrumentos'] = $matriz->list_instrumentos();
        $data['titulo'] = "Instrumento";
        $data['op'] = "0";
        $data['ins_id'] = $matriz->get_id_instrumento();
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Instrumento/instrumento_create.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function edit() {
        $matriz = new Matriz();
        $instrumento = new Instrumento();
        $data = array();
        $id_ = $_REQUEST['id'];
        $data['op'] = "1";
        $data['titulo'] = "Instrumento";
        $rw = $instrumento->get($id_);
        $data['ins_id'] = $rw[0]['ins_id'];
        $data['ins_nombre'] = $rw[0]['ins_nombre'];
        $data['ins_instrucciones'] = $rw[0]['ins_instrucciones'];
        $data['lista_preguntas'] = $this->lista_preguntas($id_);
        $data['variables'] = cmbGetVal($matriz->get_variables_all(), "", false);

        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Instrumento/instrumento_create.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function listar() {
        $matriz = new Matriz();
        $data = array();
        $data['instrumentos'] = $matriz->list_instrumentos();
        $data['titulo'] = "Instrumentos de Control";
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Instrumento/instrumento_edit.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    function save() {
        $data = ($_REQUEST['data']);
        $preg = new Instrumento();
        $preg->save(bldArray($data));
    }

    function save_detalle_pregunta() {
        $data = ($_REQUEST['data']);
        $preg = new Instrumento();
        $preg->save_detalle(bldArrayUrl($data), $_REQUEST['id']);
    }

    public function delete() {
        $instrumento = new Instrumento();
        $id_ = $_REQUEST['id'];
        $instrumento->delete($id_);
    }

    public function get_preg_id() {
        $preg = new Pregunta();

        $data = array();
        $data['id'] = $preg->get_preg_id();
        echo json_encode($data);
    }

    public function get_pregunta() {
        $pregunta = new Pregunta();
        $preg = array();
        $preg['data']['indicadores'] = $pregunta->getSelect("SELECT * FROM indicador");
        $preg['data'] = $pregunta->get($_REQUEST['id']);
        echo json_encode($preg);
    }

    public function list_componente() {
        $obj = new Matriz();
        $id_ = $_REQUEST['id'];
        echo json_encode(clrRowCmb($obj->get_componentes_($id_)));
    }

    public function list_indicador() {
        $obj = new Matriz();
        $id_ = $_REQUEST['id'];
        echo json_encode(clrRowCmb($obj->get_indicadores_($id_)));
    }

    public function get_ind_list() {
        $id_ = $_REQUEST['id'];
        $data = array();
        $obj = new Matriz();
        $indi = $obj->getSelect("SELECT * FROM indicador WHERE ind_id=$id_  ");
        $comp = $obj->getSelect("SELECT * FROM componente WHERE comp_id={$indi[0]['comp_id']}");
        $data['ind_id'] = $id_;
        $data['comp_id'] = $indi[0]['comp_id'];
        $data['var_id'] = $comp[0]['var_id'];
        echo json_encode($data);
    }

    public function bld_instrumento($id_) {
        $obj = new Pregunta;
        $rw = "";
        $var_rows = $obj->getSelect("SELECT var_id,var_descripcion,var_numero FROM vista_preguntas WHERE ins_id='$id_' GROUP BY var_id,var_descripcion,var_numero ORDER BY det_numero ");
        for ($i_1 = 0; $i_1 < count($var_rows); $i_1++) {
            $rw.="<div class='text_var'><p> VARIABLE:" . $var_rows[$i_1]['var_numero'] . " " . $var_rows[$i_1]['var_descripcion'] . "</p></div>";
            $comp_rows = $obj->getSelect("SELECT comp_id,comp_descripcion,comp_numero FROM vista_preguntas WHERE ins_id='$id_' AND var_id=" . $var_rows[$i_1]['var_id'] . " GROUP BY comp_id,comp_descripcion,comp_numero ORDER BY det_numero ");
            for ($i_2 = 0; $i_2 < count($comp_rows); $i_2++) {
                $rw.="<div class='text_comp'> COMPONENTE: " . $comp_rows[$i_2]['comp_numero'] . " " . $comp_rows[$i_2]['comp_descripcion'] . "</div>";
                $rows = $obj->getSelect("SELECT * FROM vista_preguntas WHERE ins_id='$id_' AND comp_id=" . $comp_rows[$i_2]['comp_id'] . "  ORDER BY det_numero ");
                for ($i = 0; $i < count($rows); $i++) {
                    $rw.=$this->bld_pregunta($rows[$i]);
                }
            }
        }
        if (count($var_rows) > 0) {
            //$rw.="<div class='instrumento_save'><a href='javascript:save_instrumento()' class='btn_other'> Guardar </a></div>";
        }

        return $rw;
    }

    public function show() {
        $matriz = new Matriz();
        $view = new View();
        $ubi = new Ubigeo();
        //$rw = "<div class='instrumento_save'><a class='btn_other' id='todo'> Guardar </a></div>";
        $data = array();
        $id_ = $_REQUEST['id'];
        $data['enca_id'] = $matriz->get_id_encabezado();
        $data['tipo_escuela'] = cmbGetVal($ubi->getSelect("SELECT tipo_escuelaid, concat(tipo_escuelaid,'-',descripcion)  FROM tipo_escuela ORDER BY tipo_escuelaid "), "", false);
        $data['regiones'] = cmbGetVal($ubi->getList_departamentos(), "", false);
        $ins = $matriz->get_instrumento($id_);
        $data['instrumento'] = $ins[0]['ins_nombre'];
        $data['titulo'] = "Instrumentos de Control";
        $rw = "<div class='instrumento_save'><a class='btn_other' id='todo'> Guardar </a></div>";
        if ($id_ == "I1") {
            $data['enca_id'] = $matriz->get_id_encabezado_();
            $data['ambientes'] = $matriz->getSelect("SELECT * FROM tipo_ambiente ORDER BY tipo_ambienteid; ");
            $data['guardar'] = $rw;
            $data['cargos_1'] = $matriz->getSelect("SELECT * FROM cargo WHERE cargoid < 9 ORDER BY cargoid");
            $data['cargos_2'] = $matriz->getSelect("SELECT * FROM cargo WHERE cargoid >= 9 ORDER BY cargoid");
            $view->setTemplate('../view/Instrumento/instrumento_one.php');
        } else {
            list($a, $b) = explode('I', $ins[0]['ins_id']);
            //$rw = "<div class='instrumento_save'><a href='javascript:save_instrumento()'class='btn_other' > Guardar </a></div>";
            $data['n_'] = zerofill($b, 2);
            $data['ins_id'] = $id_;
            $data['instrucciones'] = $ins[0]['ins_instrucciones'];

            $preguntas = $this->bld_instrumento($id_);

            if ($preguntas != "") {
                $data['guardar'] = $rw;
            }
            $data['grupo_acompanamiento'] = cmbGetVal($matriz->getSelect("SELECT * FROM grupo_acompanamiento"), "", false);
            $data['preguntas'] = $this->bld_instrumento($id_);
            $data['action'] = "create";
            $view->setTemplate('../view/Instrumento/instrumento_show.php');
        }
        $data['edicion'] = false;
        $view->setData($data);
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function editar() {
        $matriz = new Matriz();
        $view = new View();
        $ubi = new Ubigeo();
        $data = array();
        $idt_ = $_REQUEST['id'];
        $encabezado = $matriz->getSelect("SELECT * FROM encabezado WHERE enca_id=$idt_");
        $id_ = $encabezado[0]['ins_id'];
        $data['enca_id'] = $encabezado[0]['enca_id'];
        $data['edicion'] = true;
        $data['tipo_escuela'] = cmbGetVal($ubi->getSelect("SELECT tipo_escuelaid, concat(tipo_escuelaid,'-',descripcion)  FROM tipo_escuela ORDER BY tipo_escuelaid "), "", false);
        $data['grupo_acompanamiento'] = cmbGetVal($matriz->getSelect("SELECT * FROM grupo_acompanamiento"), $encabezado[0]['grup_id'], true);
        $data['regiones'] = cmbGetVal($ubi->getList_departamentos(), "", false);
        $data['docente'] = $matriz->getSelect("SELECT pers_id  as id_, concat(pers_nombres,' ',pers_apellido_p,' ',pers_apellido_m) as nombre FROM personal WHERE pers_id={$encabezado[0]['doc_id_entrevistado']}");
        $data['facilitador'] = $matriz->getSelect("SELECT facilitador_id as id_, concat(nombres,' ',apellidos) as nombre FROM facilitador WHERE facilitador_id={$encabezado[0]['doc_id_entrevistador']}");
        $data['institucion'] = $matriz->getSelect("SELECT inst_id,inst_nombre FROM institucion WHERE inst_id={$encabezado[0]['inst_id']}");
//        $data['institucion'] = $matriz->getSelect("SELECT institucion.inst_id,institucion.inst_nombre, lugar.lug_descripcion FROM institucion 
//                                                    INNER JOIN encabezado ON encabezado.inst_id = institucion.inst_id
//                                                    INNER JOIN lugar ON lugar.lug_id = encabezado.enca_lugar WHERE institucion.inst_id={$encabezado[0]['inst_id']}");
        $data['lugar'] = $matriz->getRow_("SELECT lug_id,lug_descripcion FROM lugar WHERE lug_id={$encabezado[0]['enca_lugar']}");
        $ins = $matriz->get_instrumento($id_);
        $data['instrumento'] = $ins[0]['ins_nombre'];
        $data['titulo'] = "Instrumentos de Control";
        if ($id_ == "I1") {
            $view->setTemplate('../view/Instrumento/instrumento_one.php');
            $data['ins_id'] = $id_;
        } else {
            list($a, $b) = explode('I', $ins[0]['ins_id']);
            $data['n_'] = zerofill($b, 2);
            $data['ins_id'] = $id_;
            $data['instrucciones'] = $ins[0]['ins_instrucciones'];

            $preguntas = $this->bld_instrumento($id_);
            $rw = "<div class='instrumento_save'><a href='javascript:save_instrumento()' class='btn_other'> Guardar </a></div>";
            if ($preguntas != "") {
                $data['guardar'] = $rw;
            }
            $data['preguntas'] = $this->bld_instrumento($id_);
            $data['action'] = "editar";
            $view->setTemplate('../view/Instrumento/instrumento_show.php');
        }
        $view->setData($data);
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function editar_() {
        $matriz = new Matriz();
        $view = new View();
        $ubi = new Ubigeo();
        $data = array();
        $idt_ = $_REQUEST['id'];
        $idt_ = (int) $idt_;
        $instucion = $matriz->getRow_("SELECT * FROM institucion WHERE inst_id=$idt_");

        $encabezado = $matriz->getSelect("SELECT * FROM encabezado_one WHERE inst_id={$instucion['inst_id']}");
        $id_ = $encabezado[0]['ins_id'];
        $vr = "";
        if ($encabezado[0]['enca_id'] == "") {
            $vr = "-1";
        } else {
            $vr = $encabezado[0]['enca_id'];
        }
        $data['enca_id'] = $vr;
        $data['cod_modular'] = $idt_;
        $data['edicion'] = true;
        $data['action'] = "editar";
        $data['regiones'] = cmbGetVal($ubi->getList_departamentos(), "", false);
        $data['facilitador'] = $matriz->getRow_("SELECT facilitador_id as id_, concat(nombres,' ',apellidos) as nombre FROM facilitador WHERE facilitador_id={$encabezado[0]['doc_id_entrevistador']}");
        $data['institucion'] = $matriz->getRow_("SELECT inst_id,inst_nombre FROM institucion WHERE inst_id={$encabezado[0]['inst_id']}");
        $data['lugar'] = $matriz->getRow_("SELECT lug_id,lug_descripcion FROM lugar WHERE lug_id={$encabezado[0]['enca_lugar']}");
        $ins = $matriz->get_instrumento("I1");
        $data['ambientes'] = $matriz->getSelect("SELECT * FROM tipo_ambiente ORDER BY tipo_ambienteid; ");
        $data['guardar'] = $rw;
        $data['cargos_1'] = $matriz->getSelect("SELECT * FROM cargo WHERE cargoid < 9 ORDER BY cargoid");
        $data['cargos_2'] = $matriz->getSelect("SELECT * FROM cargo WHERE cargoid >= 9 ORDER BY cargoid");
        $data['instrumento'] = $ins[0]['ins_nombre'];
        $data['titulo'] = "Instrumentos de Control";
        $data['guardar'] = "<div class='instrumento_save'><a class='btn_other' id='todo'> Guardar </a></div>";
        $data['tipo_escuela'] = cmbGetVal($ubi->getSelect("SELECT tipo_escuelaid, concat(tipo_escuelaid,'-',descripcion)  FROM tipo_escuela ORDER BY tipo_escuelaid "), true, false);
        $view->setTemplate('../view/Instrumento/instrumento_one.php');
        $data['ins_id'] = $id_;
        $view->setData($data);
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function editar_e() {
        $matriz = new Matriz();
        $view = new View();
        $ubi = new Ubigeo();
        $data = array();
        $idt_ = $_REQUEST['nro'];
        //$idt_=(int)$idt_;
        $instucion = $matriz->getRow_("SELECT * FROM institucion WHERE inst_nro_escuela='$idt_'");
//        echo '<pre>';
//        print_r($instucion);
//        die();
        $encabezado = $matriz->getSelect("SELECT * FROM encabezado_one WHERE inst_id={$instucion['inst_id']}");
//        echo '<pre>';
//        print_r($encabezado);
//        die();
        $id_ = $encabezado[0]['inst_id'];
        $vr = "";
        if ($encabezado[0]['enca_id'] == "") {
            $vr = "-1";
        } else {
            $vr = $encabezado[0]['enca_id'];
        }
        $data['enca_id'] = $vr;
        $data['cod_modular'] = $id_;
        $data['edicion'] = true;
        $data['action'] = "editar";
        $data['regiones'] = cmbGetVal($ubi->getList_departamentos(), "", false);
        $data['facilitador'] = $matriz->getRow_("SELECT facilitador_id as id_, concat(nombres,' ',apellidos) as nombre FROM facilitador WHERE facilitador_id={$encabezado[0]['doc_id_entrevistador']}");
        $data['institucion'] = $matriz->getRow_("SELECT inst_id,inst_nombre FROM institucion WHERE inst_id={$encabezado[0]['inst_id']}");
        $data['lugar'] = $matriz->getRow_("SELECT lug_id,lug_descripcion FROM lugar WHERE lug_id={$encabezado[0]['enca_lugar']}");
        $ins = $matriz->get_instrumento("I1");
        $data['ambientes'] = $matriz->getSelect("SELECT * FROM tipo_ambiente ORDER BY tipo_ambienteid; ");
        $data['guardar'] = $rw;
        $data['cargos_1'] = $matriz->getSelect("SELECT * FROM cargo WHERE cargoid < 9 ORDER BY cargoid");
        $data['cargos_2'] = $matriz->getSelect("SELECT * FROM cargo WHERE cargoid >= 9 ORDER BY cargoid");
        $data['instrumento'] = $ins[0]['ins_nombre'];
        $data['titulo'] = "Instrumentos de Control";
        $data['guardar'] = "<div class='instrumento_save'><a href='javascript:save_instrumento()' class='btn_other'> Guardar </a></div>";
        $data['tipo_escuela'] = cmbGetVal($ubi->getSelect("SELECT tipo_escuelaid, concat(tipo_escuelaid,'-',descripcion)  FROM tipo_escuela ORDER BY tipo_escuelaid "), true, false);
        $view->setTemplate('../view/Instrumento/instrumento_one.php');
        $data['ins_id'] = $id_;
        $view->setData($data);
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function bld_pregunta($pregunta) {

        $preg_id = $pregunta['item_id'];
        $ind_id = $pregunta['ind_id'];
        $type_ = $pregunta['det_tipo'];
        $ind_is_uni = $pregunta['ind_es_unipersonal'];
        if ($ind_is_uni == 1) {
            $preg_class = 'is_uni';
        } else {
            $preg_class = 'no_uni';
        }
        //print_r($pregunta);
        $obj = new Pregunta();
        $rw = "";
        $niveles = $obj->getSelect("SELECT * FROM nivel_logro WHERE ind_id = " . $ind_id . "  ORDER BY nivl_id");

        $rwnivl = "";
        $rniv = "";
        $rniva = "";
        $salt = "";
        $class = "preg_table_set";
        $n = count($niveles);
        for ($i_1 = 0; $i_1 < $n; $i_1++) {
            $nivl_id = $niveles[$i_1]['nivl_id'];
            if ($type_ == 0) {
                $type_all = "radio";
                $input = "<input type='" . $type_all . "'  id='$preg_id-$ind_id-$nivl_id' value='$preg_id-$ind_id-$nivl_id' name='PREGUNTA_$preg_id' /><label for='$preg_id-$ind_id-$nivl_id' ></label>";
                $nivel = $obj->getSelect("SELECT * FROM nivel WHERE nivl_id=" . $nivl_id . "");
                $rwnivl.= '<td width="132" valign="top"><p align="center"><strong>' . $nivel[0]['nivl_descripcion'] . '</strong></p></td>';
                $rniv.= '<td width="132" valign="top"><p>' . $niveles[$i_1]['niv_descripcion'] . '</p></td>';
                $rniva.= '<td width="132"><p>' . $input . '</p></td>';
            }
            if ($type_ == 1) {
                $type_all = "radio";
                $class = "preg_table_";
            }
        }
        if ($type_ == 1) {
            $class = "preg_table_";
            $input1 = "<input type='" . $type_all . "'  id='$preg_id-$ind_id-si' value='$preg_id-$ind_id-si' name='PREGUNTA_$preg_id' /><label for='$preg_id-$ind_id-si'>Si</label>";
            $input2 = "<input type='" . $type_all . "'  id='$preg_id-$ind_id-no' value='$preg_id-$ind_id-no' name='PREGUNTA_$preg_id' /><label for='$preg_id-$ind_id-no'>No</label>";
            $rwnivl.="<td> Si</td><td> No</td>";
            $rniv.="<td colspan='2' class='si_no'> Cumple </td>";
            $rniva.="<td >  $input1 </td><td>  $input2</td>";
        }
        $rw.="<div class='prer_lista_' >";
        $rw.= "<div class='text_indi'> INDICADOR:" . $pregunta['ind_numero'] . " " . $pregunta['ind_descripcion'] . "</div>";
        $rw.= "<div class='text_preg'>" . $pregunta['det_pregunta'] . "</div>";
        $rw.= "<div class='tb_preg'>";
        $rw.= "<table border='1' cellspacing='0' cellpadding='0' style='float:left' class='" . $class . "'  id='alt_$preg_id'>";
        $rw.= "<tr class='matriz_header'>";
        $rw.= $rwnivl;
        $rw.= "</tr>";
        $rw.= "<tr >";
        $rw.=$rniv;
        $rw.= "</tr>";
        $rw.= "<tr class='rw_rpta'>";
        $rw.=$rniva;
        $rw.= "</tr>";
        $rw.= "</table>";
        $rw.="</div>";
        $rw.="</div>";
        return $rw;
    }

    public function save_encavezado() {
        $enca = new Encabezado();
        $matriz = new Matriz();
        $todo = array();
        $respuesta = array();
        $encabezado = array();
        $observaciones = array();
        $grados = "";
        $data = $_REQUEST['data'];
        for ($i = 0; $i < count($data); $i++) {
            $name = $data[$i]["name"];

            if ($data[$i]["name"] == "enca_grado") {
                $grados.=$data[$i]["value"] . "-";
            }

            $rs = strpos($name, "PREGUNTA");
            if ($rs !== false) {
                $respuesta[] = $data[$i]["value"];
            } else {
                $rs_a = strpos($name, "OBSERVACION");
                if ($rs_a !== false) {
                    $observaciones[] = $data[$i]["value"];
                } else {
                    $encabezado['' . $data[$i]["name"] . ''] = $data[$i]["value"];
                }
            }
        }
        $encabezado['enca_grado'] = $grados;
        $todo['b'] = $respuesta;
        $todo['a'] = $encabezado;
        $todo['c'] = $observaciones;
        $todo['id_'] = $matriz->get_id_encabezado();
        $enca->save_cabecera($todo);
    }

    public function save_encavezado_1() {
        $enca = new Encabezado();
        $matriz = new Matriz();
        $todo = array();
        $row = array();
        $personal = array();
        $encabezado = array();
        $observaciones = array();

        $data = $_REQUEST['data'];
        for ($i = 0; $i < count($data); $i++) {
            $name_ = explode('_', $data[$i]['name']);
            if ($name_[0] == "OBSERVACION") {
                $observaciones[] = $data[$i]['value'];
            }
            for ($i_1 = 1; $i_1 <= 14; $i_1++) {

                $isin = strpos($data[$i]['name'], "T" . $i_1 . "_");
                if ($isin !== false) {
                    $now = array();
                    $now['name'] = $data[$i]['name'];
                    $now['value'] = $data[$i]['value'];
                    $row['T' . $i_1][] = $now;
                } else {
                    $isper = strpos($data[$i]['name'], "personal_");

                    if ($isper !== false) {
                        $now = array();
                        $nn = explode('_', $data[$i]['name']);
                        if ($nn[2] == 1) {
                            $personal[$nn[1]][$nn[2]][$data[$i]['value']] = $data[$i]['value'];
                        } else {
                            $personal[$nn[1]][$nn[2]] = $data[$i]['value'];
                        }
                    }

                    if (substr($data[$i]['name'], 0, 1) != "T") {
                        $encabezado[$data[$i]['name']] = $data[$i]['value'];
                    }
                }
            }
        }


        $tabla = array();

        for ($i_1 = 1; $i_1 <= 14; $i_1++) {

            $act = $row['T' . $i_1];
            for ($i_2 = 0; $i_2 < count($act); $i_2++) {
                $name_ = explode("_", $act[$i_2]['name']);
                if (count($name_) == 2) {
                    $i_ = $name_[1];
                    $tabla['T' . $i_1][$i_]['value'] = $act[$i_2]['value'];
                }
                if (count($name_) == 3) {
                    $i_ = $name_[1];
                    $j_ = $name_[2];
                    $tabla['T' . $i_1][$i_][$j_]['value'] = $act[$i_2]['value'];
                }
                if (count($name_) == 4) {
                    $i_ = $name_[1];
                    $g_ = $name_[2];
                    $j_ = $name_[3];
                    $tabla['T' . $i_1][$i_][$g_][$j_]['value'] = $act[$i_2]['value'];
                    $tabla['T' . $i_1][$i_][$g_][$j_]['grado'] = $g_;
                }
            }
        }

        $todo['poblacion'] = $tabla['T1'];
        $todo['aula'] = $tabla['T2'];
        $todo['miembros_escolar'] = $tabla['T3'];
        $todo['miembros_conei'] = $tabla['T4'];
        $todo['conei_cuenta'] = $tabla['T5'];
        $todo['servicios'] = $tabla['T6'];
        $todo['ambientes'] = $tabla['T7'];
        $todo['proyectos'] = $tabla['T8'];
        $todo['proyecto_leer'] = $tabla['T9'];
        $todo['modulo'] = $tabla['T10'];
        $todo['guia'] = $tabla['T11'];
        $todo['integradas'] = $tabla['T12'];
        $todo['lista_nombre'] = $tabla['T13'];
        $todo['personal'] = $personal;

        $todo['encabezado'] = $encabezado;
        $todo['observaciones'] = $observaciones;
        $todo['id_'] = $matriz->get_id_encabezado_();
        echo json_encode($todo);
        $enca->save_cabecera_1($todo);
    }

    function lista_preguntas($id) {
        $rw = '';
        $pregunta = new Pregunta();
        $lista = $pregunta->getSelect(" SELECT * FROM vista_preguntas WHERE ins_id='$id'");
        for ($i = 0; $i < count($lista); $i++) {
            $id_ = $lista[$i]["item_id"];
            $d_tipo = "Seleccion";
            if ($lista[$i]["det_tipo"] == 1) {
                $d_tipo = "Si/No";
            }

            $n_ = $lista[$i]["det_numero"];
            $rw.='<tr id="rw-id-' . $id_ . '">';
            $rw.='<td ><input type="checkbox" id="n-' . $id_ . '" class="preg_id_all"   value="' . $id_ . '" /><input type="text" style="width:40px;margin-left:10px;" name="PREGUNTA[' . $id_ . '][0]" id="n_item-id-' . $id_ . '" class="n_item" value="' . $n_ . '" /></td>';
            $rw.='<td><div id="div-prg_detalle-id-' . $id_ . '" class="preg_as">' . $lista[$i]["det_pregunta"] . '</div><input type="hidden" id="prg_detalle-id-' . $id_ . '" name="PREGUNTA[' . $id_ . '][1]" value="' . $lista[$i]["det_pregunta"] . '" /></td>';
            $rw.='<td><div class="ind_id" id="txt_id-id-' . $id_ . '"  > ' . $lista[$i]["ind_numero"] . " " . $lista[$i]["ind_descripcion"] . ' </div><input type="hidden" id="ind_id-id-' . $id_ . '" name="PREGUNTA[' . $id_ . '][2]" value="' . $lista[$i]["ind_id"] . '" /></td>';
            $rw.='<td><div class="ind_id" id="txt_id_tipo-' . $id_ . '"  > ' . $d_tipo . ' </div><input type="hidden" id="id_tipo-' . $id_ . '" name="PREGUNTA[' . $id_ . '][3]" value="' . $lista[$i]["det_tipo"] . '" /> </td>';
            $rw.='<td><a href="javascript:preg_edit(' . $id_ . ')" class="btn_other_a">Editar</a></td>';
            $rw.='<td><a href="javascript:preg_del(' . $id_ . ')" class="btn_other_b">Quitar</a></td>';
            $rw.='</tr>';
        }
        return $rw;
    }

    function get_insituciones() {
        $ubi = new Ubigeo();
        $list = array();
        $rw = $ubi->getSelect("SELECT inst_id,inst_nombre,inst_cod,inst_nro_escuela FROM institucion ");
//        $rw = $ubi->getSelect("SELECT institucion.inst_id,institucion.inst_nombre, institucion.inst_cod
//                                ,lugar.lug_descripcion,institucion.inst_nro_escuela 
//                               FROM institucion 
//                               INNER JOIN encabezado ON encabezado.inst_id = institucion.inst_id
//                               INNER JOIN lugar ON lugar.lug_id = encabezado.enca_lugar");

        for ($i = 0; $i < count($rw); $i++) {
            $row = array();
            $row['value'] = $rw[$i]['inst_id'];
            $row['label'] = $row['num'] = $rw[$i]['inst_nro_escuela'] . " - " . $rw[$i]['inst_nombre'];
            $row['desc'] = $rw[$i]['inst_id'];
            $row['lug'] = $rw[$i]['lug_descripcion'];
            $list[] = $row;
        }
        echo json_encode($list);
    }

    function get_docentes() {
        $ubi = new Ubigeo();
        $list = array();
        $rw = $ubi->getSelect("SELECT pers_id,concat(pers_nombres ,' ',pers_apellido_p,' ',pers_apellido_m ) as pers_nombre,pers_dni  FROM personal");
        for ($i = 0; $i < count($rw); $i++) {
            $row = array();
            $row['value'] = $rw[$i]['pers_id'];
            $row['label'] = $rw[$i]['pers_nombre'];
            $row['desc'] = $rw[$i]['pers_dni'];
            $list[] = $row;
        }
        echo json_encode($list);
    }

    function get_entrevistador() {
        $ubi = new Ubigeo();
        $list = array();
        $rw = $ubi->getSelect("SELECT pers_id,concat(pers_nombres,' ' ,pers_apellido_p,' ',pers_apellido_m ) as pers_nombre ,pers_dni FROM personal");
        for ($i = 0; $i < count($rw); $i++) {
            $row = array();
            $row['value'] = $rw[$i]['pers_id'];
            $row['label'] = $rw[$i]['pers_nombre'];
            $row['desc'] = $rw[$i]['pers_dni'];
            $list[] = $row;
        }
        echo json_encode($list);
    }

    function get_lugares() {
        $ubi = new Ubigeo();
        $list = array();
        $rw = $ubi->getSelect("SELECT lug_id,lug_descripcion, dist_id FROM lugar");
        for ($i = 0; $i < count($rw); $i++) {
            $row = array();
            $row['value'] = $rw[$i]['lug_id'];
            $row['label'] = $rw[$i]['lug_descripcion'];
            $row['desc'] = $rw[$i]['dist_id'];
            $list[] = $row;
        }
        echo json_encode($list);
    }

    public function getListaDistritos() {
        $ubigeo = new Ubigeo();
        $lista = $ubigeo->getList_distrito($_GET['id']);
        echo json_encode(clrRowCmb($lista));
    }

    public function getListaProvincias() {
        $ubigeo = new Ubigeo();
        $lista = $ubigeo->getList_provincia($_GET['id']);
        echo json_encode(clrRowCmb($lista));
    }

    public function getListaLocalidades() {
        $ubigeo = new Ubigeo();
        $lista = $ubigeo->getList_Localidad($_GET['id']);
        echo json_encode(clrRowCmb($lista));
    }

    public function get_list_facilitador() {
        $ubigeo = new Ubigeo();
        $list = array();
        $rw = $ubigeo->getSelect("SELECT * FROM facilitador");
        for ($i = 0; $i < count($rw); $i++) {
            $row = array();
            $row['value'] = $rw[$i]['facilitador_id'];
            $row['label'] = $rw[$i]['nombres'] . ' ' . $rw[$i]['apellidos'];
            $row['desc'] = $rw[$i]['dni'];
            $list[] = $row;
        }
        echo json_encode($list);
    }

    public function get_data() {
        $instrumento = new Instrumento();
        $id_ = $_REQUEST['id'];
        $rw = array();
        $rw['respuestas'] = $instrumento->getSelect("SELECT resp_id,enca_id,item_id,respuesta.ind_id,nivl_id,respuesta.niv_id FROM respuesta 
INNER JOIN nivel_logro 
ON nivel_logro.niv_id=respuesta.niv_id WHERE enca_id=$id_");
        $rw['encabezado'] = $instrumento->getRow_("SELECT * FROM encabezado WHERE enca_id=$id_");
        $rw['observaciones'] = $instrumento->getSelect("SELECT * FROM observacion WHERE enca_id=$id_");

        echo json_encode(clrNrow($rw));
    }

    public function report_one() {
        $id_ = $_REQUEST['id'];
        $obj = new Instrumento();
        $data[] = array();
        $data['cargos_1'] = $obj->getSelect("SELECT * FROM cargo WHERE cargoid < 7 ORDER BY cargoid");
        $data['cargos_2'] = $obj->getSelect("SELECT * FROM cargo WHERE cargoid > 6 ORDER BY cargoid");
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Reporte/_instrumento_one.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function get_instrumento_one() {
        $id_ = $_REQUEST['id'];

        $id_ = (int) $id_;
        $instrumento = new Instrumento();
        $data = array();
        $data['result'] = false;
        $data['encabezado'] = $instrumento->getRow_("SELECT * FROM encabezado_one WHERE inst_id=$id_");
        $data['institucion'] = $instrumento->getRow_("SELECT * FROM institucion WHERE inst_id=$id_");
        $data['lugar'] = $instrumento->getRow_("SELECT * FROM lugar WHRE lug_id={$data['institucion']['inst_comunidad']}");
        $data['poblacion_estudiantil'] = $instrumento->getSelect("SELECT * FROM poblacion_estudiantil WHERE inst_id=$id_");
        $data['municipio_escolar'] = $instrumento->getSelect("SELECT * FROM municipio_escolar WHERE inst_id=$id_");
        $data['conei'] = $instrumento->getSelect("SELECT * FROM conei WHERE inst_id=$id_");
        $data['ambiente'] = $instrumento->getSelect("SELECT * FROM ambiente WHERE inst_id=$id_");
        $data['autoridades'] = $instrumento->getSelect("SELECT * FROM autoridades WHERE inst_id=$id_");
        $data['gubernamentales'] = $instrumento->getSelect("SELECT * FROM instituciones_gubernamentales WHERE inst_id=$id_");
        $data['personal'] = $instrumento->getSelect("SELECT *,ubigeo.Nombre FROM personal LEFT JOIN ubigeo ON ubigeo.Ubigeo = personal.pers_lugar_nac WHERE inst_id=$id_ ORDER BY pers_es_director");
        $data['observacion'] = $instrumento->getSelect("SELECT * FROM observacion_one WHERE enca_id=" . $data['encabezado']['enca_id'] . "");

        if (count($data['institucion']) > 0) {
            $data['result'] = true;
        }
        echo json_encode($data);
    }

    public function search() {
        $data = array();
        $data['find'] = false;
        $fg = false;
        $inst = new Instrumento();
        $id_ = $_REQUEST['id'];
        $rw = $inst->getSelect("SELECT enca_id FROM encabezado WHERE enca_id=$id_ ");
        $id_ = (int) $id_;
        $rw_ = $inst->getSelect("SELECT inst_id FROM institucion WHERE inst_id=$id_ ");
        if (count($rw) > 0 || count($rw_) > 0) {
            $data['find'] = true;
            $fg = true;
        }


        echo json_encode($data);
        return $fg;
    }

        public function search_escuela() {
        $data = array();
        $data['find'] = false;
        $fg = false;
        $inst = new Instrumento();
        $nro_ = $_REQUEST['nro'];
        //$rw = $inst->getSelect("SELECT enca_id FROM encabezado WHERE enca_id=$id_ ");
        //$id_ = (int) $id_;
        $rw_ = $inst->getSelect("SELECT inst_id FROM institucion WHERE inst_nro_escuela='$nro_'");
        //echo "<script>alert('$id_')</script>";
        if (/*count($rw) > 0 || */count($rw_) > 0) {
            $data['find'] = true;
            $fg = true;
        }
        echo json_encode($data);
        return $fg;
    }
    
    function set_personal_out() {
        $instrumento = new Instrumento();
        $id_ = $_REQUEST['id'];
        $instrumento->set_personal_out($id_);
        echo 'true';
    }

}

?>
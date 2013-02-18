<?php
// test.php
require_once 'ci-config.php';
require_once 'idiorm.php';
ORM::configure(DRIVER.':host='.HOST.';dbname='.DBNAME.'');
ORM::configure('username', USER);
ORM::configure('password', PASSWORD);
ORM::configure('id_column_overrides', array(
    'detalle_instrumento' => 'item_id',
    'instrumento' => 'ins_id',
    'encabezado'=>'enca_id',
    'respuesta'=>'resp_id',
    'nivel_logro'=>'niv_id',
    'encabezado_one'=>'enca_id',
    'ambiente'=>'item_id',
    'lugar'=>'lug_id',
    'poblacion_estudiantil'=>'item_id',
    'municipio_escolar'=>'item_id',
    'conei'=>'item_id',
    'institucion'=>'inst_id',
    'observacion'=>'obs_id',
    'observacion_one'=>'obs_id',
    'personal'=>'pers_id',
    'ubigeo'=>'Ubigeo',
    'permiso'=>'idmodulo',
    'modulo'=>'idmodulo'
));
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//require_once '../model/ORM-config.php';
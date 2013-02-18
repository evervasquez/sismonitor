<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author sophie
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Pais.php';

class PaisController extends Controller {
    //put your code here
    public function Search() {
        $obj = new Pais();

        $data = array();

        $view = new View();
        $data['value'] = $obj->Search($_GET["term"]);
        $view->setData( $data );
        $view->setTemplate( '../view/_Json.php' );

        echo $view->renderPartial();
    }
    public function Partial() {

    }
}
?>

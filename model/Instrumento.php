<?php
include_once("Main.php");
class Instrumento extends Main
{
   

   public function get($id_)
   {
       return $this->getSelect("SELECT * FROM instrumento WHERE ins_id='$id_'");
   }
   public function save($data)
   {
        $instrumento =ORM::for_table('instrumento')->where('ins_id', $data['ins_id'])->find_one();
   
       if($instrumento!=false){
   
       $instrumento->ins_id= $data['ins_id'];
       $instrumento->ins_nombre= $data['ins_nombre'];
       $instrumento->ins_instrucciones= $data['ins_instrucciones']; 
       $instrumento->save();
       }
 else {
       $instrumento =ORM::for_table('instrumento')->create();
       $instrumento->ins_id= $data['ins_id'];
       $instrumento->ins_nombre= $data['ins_nombre'];
       $instrumento->ins_instrucciones= $data['ins_instrucciones']; 
       $instrumento->save();
       }
      
   }
   public function save_detalle($data,$ins_id)
    {
      $index_= array_keys($data['PREGUNTA']);
//      $det_instrumento =ORM::for_table('detalle_instrumento')->where('ins_id',$ins_id)->find_many();
//      $det_instrumento->delete();
      for ($i = 0; $i < count($index_); $i++) {
          
          $det_instrumento =ORM::for_table('detalle_instrumento')->where('item_id', $index_[$i])->find_one();
          if($det_instrumento!=false){
           $det_instrumento->det_numero=$data['PREGUNTA'][$index_[$i]][0];   
           $det_instrumento->det_pregunta=$data['PREGUNTA'][$index_[$i]][1];
           $det_instrumento->ind_id=$data['PREGUNTA'][$index_[$i]][2];
           $det_instrumento->det_tipo=$data['PREGUNTA'][$index_[$i]][3];
           $det_instrumento->save();
          }
          else {
           $det_instrumento =ORM::for_table('detalle_instrumento')->create();
           $det_instrumento->ins_id=$ins_id;  
           $det_instrumento->det_numero=$data['PREGUNTA'][$index_[$i]][0];   
           $det_instrumento->det_pregunta=$data['PREGUNTA'][$index_[$i]][1];
           $det_instrumento->ind_id=$data['PREGUNTA'][$index_[$i]][2];
           $det_instrumento->det_tipo=$data['PREGUNTA'][$index_[$i]][3];
           $det_instrumento->save();
          }
      }
    }
    
    public function delete($id_)
    {
        $instrumento =ORM::for_table('instrumento')->where('ins_id',"$id_")->find_one();
        $instrumento->delete();
        
    }
    
    function set_personal_out($id_) {
        $personal =ORM::for_table('personal')->where('pers_dni',$id_)->find_one();
        if($personal!=false)
        {
           $personal->inst_id=null;
           $personal->save();
        }
    }
}

?>
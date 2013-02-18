<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<div class="div_container" style="min-height: 700px;">
<h6 class="ui-widget-header"><?php echo $titulo; ?></h6>
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;height: 160px;margin-top: 50px;">
    <div style="display: block;width: 210px;margin-left:35%">
        <div style="clear: both">
    <?php 
    $list="";
    for($i=0;$i<count($sub_sistemas);$i++)
    {
        
       $rw="<a href='index.php?controller=Matriz&action=editar_subsistemas&id={$sub_sistemas[$i]['sub_id']}' style='height:20px' > Editar </a>";
       $list.= "<div class='list_variables' style='height:80px'><div style='margin-top:37px'  ><a href='index.php?controller=Matriz&action=show_variables&id={$sub_sistemas[$i]['sub_id']}'>".$sub_sistemas[$i]['sub_nombre']."</a></div><div class='btn_edit'>$rw</div></div>";
    }
    
    echo "".$list."";
    ?>
    <?php 
    $list="";
    for($i=0;$i<count($variables);$i++)
    {
         $rw="<a href='index.php?controller=Matriz&action=editar_variable&id={$variables[$i]['var_id']}' style='height:20px' > Editar </a>";
       $list.= "<div class='list_variables'><div ><a href='index.php?controller=Matriz&action=show_componentes&id={$variables[$i]['var_id']}'>".$variables[$i]['var_numero']."</br>".$variables[$i]['var_descripcion']."</a></div><div class='btn_edit'>$rw</div></div>";
    }
    
    echo "".$list."";
    ?>
     <?php 
    $list="";
    for($i=0;$i<count($componentes);$i++)
    {
        $rw="<a href='index.php?controller=Matriz&action=editar_componente&id={$componentes[$i]['comp_id']}' style='height:20px' > Editar </a>";
        $list.= "<div class='list_variables'><div ><a href='index.php?controller=Matriz&action=show_indicadores&id={$componentes[$i]['comp_id']}'>".$componentes[$i]['comp_numero']."</br>".$componentes[$i]['comp_descripcion']."</a></div><div class='btn_edit'>$rw</div></div>";
    }
    
    echo "".$list."";
    ?>
     <?php 
    $list="";
    for($i=0;$i<count($indicadores);$i++)
    {
        $rw="<a href='index.php?controller=Matriz&action=editar_indicador&id=".$indicadores[$i]['ind_id']."' style='height:20px' > Editar </a>";
        $list.= "<div class='list_indicadores'><div><a href='index.php?controller=Matriz&action=show_niveles&id={$indicadores[$i]['ind_id']}'>".$indicadores[$i]['ind_numero']."</br>".$indicadores[$i]['ind_descripcion']."</a> </div><div class='btn_edit'>$rw</div> </div>";
    }
    
    echo "".$list."";
    ?>
     <?php 
    $list="";
    for($i=0;$i<count($niveles);$i++)
    {
        $rw="<a href='index.php?controller=Matriz&action=editar_niveles&id=".$niveles[$i]['niv_id']."' style='height:20px' > Editar </a>";
        $list.= "<div class='list_indicadores'><div><a href='#'>".$niveles[$i]['nivl_id']."</br>".$niveles[$i]['niv_descripcion']."</a> </div><div class='btn_edit'>$rw</div> </div>";
    }
    
    echo "".$list."";
    ?>
            
        </div>
           
    </div>
   
    
</div>
    <div style="display: none;" ></div>
    <div style="clear: both"></div> 
</div>
<?php echo $pag; ?>

</div>

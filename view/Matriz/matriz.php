<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<div class="div_container" style="height: 700px;">
<h6 class="ui-widget-header">Lista de Matrices de subsistemas</h6>
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;height: 160px;margin-top: 50px;">
    <div style="display: block;width: 200px;margin-left:35%">
    <?php 
    $list="";
    for($i=0;$i<count($sub_sistemas);$i++)
    {
      
        $list.= "<div class='list_variables' style='height:80px'><div style='margin-top:37px'  ><a href='index.php?controller=Matriz&action=show_matriz&id={$sub_sistemas[$i]['sub_id']}'>".$sub_sistemas[$i]['sub_nombre']."</a></div></div>";
    }
    
    echo "".$list."";
    ?>
    </div>
    
</div>

</div>
<?php echo $pag; ?>

</div>

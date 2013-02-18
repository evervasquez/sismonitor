<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<div class="div_container" style="height: 700px;">
<h6 class="ui-widget-header"><?php echo $titulo; ?></h6>
<div class="contain_">
<div style=" margin:0 auto 0 auto; width: 660px; margin-bottom: 10px;margin-top: 30px;">
    <?php 
        $list="";
        $c1=0;
       
        for ($i = 0; $i < count($instrumentos); $i++) {
            $cont=$instrumentos[$i]['ins_id']." </br> ".$instrumentos[$i]['ins_nombre'];
            $cont="<td><div class='cuad_list'><a href='index.php?controller=Instrumento&action=show&id=".$instrumentos[$i]['ins_id']."'>".$cont."</a></div></td>";
            $c1+=1;
            if($c1==1)
            {
                $list.="<tr>".$cont;
            }
            if($c1==2)
            {
                $list.=$cont;
            }
            if($c1==3)
            {
                $list.=$cont."</tr>";
            }
            if($c1==3)
            {
                 $c1=0;
            }
            
        }
        
    ?>
    <table class="tb_cuad">
        <?php echo $list;?>
    </table>
</div>

</div>
<?php echo $pag; ?>

</div>

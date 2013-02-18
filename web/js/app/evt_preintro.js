 jQuery(function($){
                $('#dialog').dialog({
                    draggable: true,
                    modal:true,
                    autoOpen: false,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false,
                    buttons: {"Ok": function() {
				$(this).dialog("close");
                                }}
                });
                $("#000100").change(function(){
                    n = $(this).val();
                    crear_grid(n);
                  });    
                  
              $("#Grabar_pre").click(function(){
                  bval = true;
                bval = bval && $("#000100").required();
                bval = bval && $("#000200").required();                
                
               $.each($('input[name|="edad[]"]'),function(){                   
                   bval = bval && $(this).required();
               });
               
               $.each($('select[name|="sexo[]"]'),function(){                   
                   bval = bval && $(this).required();
               });

               if(bval){
                if($("input[name='jefe']:checked").val()!="1"){msg("Elija cual integrante del hogar es considerado Jefe de Hogar"); bval=false;$("input[name='jefe']").focus();}
               }
               
               $.each($('select[name|="parentesco[]"]'),function(){
                   bval = bval && $(this).required();
               });
               if(bval){
                if($("input[name='pse']:checked").val()!="1"){msg("Elija cual integrante del hogar es considerado el principal sosten economico"); bval=false;$("input[name='pse']").focus();}
               }               
               $.each($('select[name|="grado[]"]'),function(){
                   bval = bval && $(this).required();
               });

               $.each($('input[name|="fechan[]"]'),function(){
                   bval = bval && $(this).required();
               });
               
               if(bval){
                if($("input[name='entrevistado']:checked").val()!="1"){msg("Elija cual integrante del hogar va ser el entrevistado"); bval=false;$("input[name='entrevistado']").focus();}
               }              
                if(bval){
                if(confirm("Realmente deseas guardar esta parte de la encuesta?")){
                strfam = $("#fam").serialize();                      
                str = $("#frm1").serializeArray();                
                $.get("index.php","controller=Unicri&action=save_encuestado&"+strfam,function(data){                       
                    $.get("index.php",{'controller':'Unicri','action':'save','data': str},function(data2){
                        if(data2.res=='1'){ $( "#container" ).tabs({disabled:[3,4,5]});
                                             $( "#container" ).tabs({selected:2});
                                         }
                            else {msgerror(data2.msg);}
                    },"json");
                });
                }}
                return false;
              });
  
                $("#000200").change(function(){                    
                    if($(this).val()>$("#000100").val()){
                        msg("Este valor no coincide con el numero de integrantes de la familia");
                        $(this).attr("value","");
                    }
                });
               }
             );
    
    function crear_grid(n)
    {
       html = "<form name='fam' id='fam'>";
       html += "<table border='0' cellpadding='0' cellspacing='0' class='tablilla'><tr class='head_tabla'><td align='center' style='border-left:1px solid #dadada !important'>Nro</td><td align='center'>Edad</td><td align='center'>Genero</td><td align='center'>Jefe de Hogar</td>";
       html += "<td align='center'>Parentesco</td><td align='center'>Principal Sostén Económico</td><td align='center'>Grado de Instrucción</td><td align='center'>Fecha de Naci. (dd/mm/yyyy)</td><td align='center'>Entrevistado</td></tr>";
       for(i=0;i<n;i++)
           {
               html +='<tr class="td_detail22">';
               html +='<td align="center">'+(i+1)+'</td>';
               html +='<td><input type="text" name="edad[]" size="2" class="input_text" onkeypress="return permite(event,\'num\')" /></td>';
               html +='<td><select name="sexo[]" class="input_text"><option value="">::Seleccione::</option><option value="1">Masculino</option><option value="0">Femenino</option></select></td>';
               html +='<td align="center"><input type="radio" name="jefe" value="1" onclick="setJefe('+i+')" /></td>';
               html +='<td><select name="parentesco[]" class="input_text">';
               html +='<option value="">::Seleccione::</option>';
               html +='<option value="1">Jefe</option>';
               html +='<option value="2">Cónyuge</option>';
               html +='<option value="3">Hijo(a)</option>';
               html +='<option value="4">Padre/Madre</option>';
               html +='<option value="5">Suegro</option>';
               html +='<option value="6">Hermano</option>';
               html +='<option value="7">Nieto</option>';
               html +='<option value="8">Yerno/Nuera</option>';
               html +='<option value="9">Otro pariente</option>';
               html +='<option value="10">Otros no parientes</option>';               
               html +='</select></td>';
               
               html +='<td align="center"><input type="radio" name="pse" value="1" onclick="setPSE('+i+')" /></td>';
               html +='<td><select name="grado[]" class="input_text">';
               html +='<option value="">::Seleccione::</option>';
               html +='<option value="0">Ninguno</option>';
               html +='<option value="1">Primaria incomp.</option>';
               html +='<option value="2">Primaria comp.</option>';
               html +='<option value="3">Secundaria inc.</option>';
               html +='<option value="4">Secundaria comp.</option>';
               html +='<option value="5">Técnica</option>';
               html +='<option value="6">Universitaria</option>';
               html +='<option value="7">No sabe</option>';
               html += '</select></td>';
               html +='<td><input type="text" name="fechan[]" value="" class="input_text" size="10" /></td>';
               html +='<td align="center"><input type="radio" name="entrevistado" value="1" onclick="setEntrevistado('+i+')" /></td>';
               html +='</tr>';
           }
         html += "</table></form>";
         $("#integrantes").empty().append(html);
    }

    function setJefe(n)
    {
        html = "El integrante numero "+(n+1)+" es considerado como jefe de Hogar";       
        $("#000400").attr("value",html);
    }

    function setPSE(n)
    {
        html = "El integrante numero "+(n+1)+" es considerado como Principal sostén económico";
        $("#000600").attr("value",html);
    }

    function setEntrevistado(n)
    {
        edad = $('input[name|="edad[]"]:eq('+n+')').val();
        if(edad>16)
            {
             html = "El integrante numero "+(n+1)+" será la persona entrevistada";
             $("#000900").attr("value",html);
            }
         else {
            alert("Este integrante no puede ser entrevistado, ya que no es mayor de 16 años.\n Elija a otro integrante");
            }
     }
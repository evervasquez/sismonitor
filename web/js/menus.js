/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

////////////////////////////////////////////////////////////////////////////
//creación del plugin generaMenu.
//envío el menú de opciones como parámetro
////////////////////////////////////////////////////////////////////////////
(function($) {
$.fn.generaMenu = function(menu) {
   this.each(function(){
      var retardo;
      var capaMenu = $(this);
      //creo e inserto la lista principal
      var listaPrincipal = $('<ul></ul>');
      capaMenu.append(listaPrincipal);
      //enlaces principales
      var arrayEnlaces = [];
      var arrayCapasSubmenu = [];
      var arrayLiMenuPrincipal = [];
      //recorro los elementos del menú
      jQuery.each(menu, function() {
         //ahora en this tengo cada uno de los elementos.
         var elementoPrincipal = $('<li></li>');
         listaPrincipal.append(elementoPrincipal);
         //creo el enlace e inserto
         var enlacePrincipal = $('<a title="'+this.texto+'" href="' + this.url + '">' + this.texto + '</a>');
         elementoPrincipal.append(enlacePrincipal);

         var capaSubmenu = $('<div class="submenu"></div>');
         //guardo la capa submenu en el elemento enlaceprincipal
         enlacePrincipal.data("capaSubmenu",capaSubmenu);
         //creo una lista para poner los enlaces
         var subLista = $('<ul></ul>');
         //añado la lista a capaMenu
         capaSubmenu.append(subLista);
         //para cada elace asociado
         jQuery.each(this.enlaces, function() {
            //en this tengo cada uno de los enlaces
            //creo el elemento de la lista del submenú actual
            var subElemento = $('<li></li>');
            //meto el elemento de la lista en la lista
            subLista.append(subElemento);
            //creo el enlace
            var subEnlace = $('<a title="" href="' + this.url + '">' + this.texto + '</a>');
            //cargo el enlace en la lista
            subElemento.append(subEnlace);
//            if(this.enlaces.length>0){
//                var subLista2 = $('<ul></ul>');
//             jQuery.each(this.enlaces, function() {
//                 var subElemento_ = $('<li></li>');
//            //meto el elemento de la lista en la lista
//                 subLista2.append(subElemento_);
//            //creo el enlace
//                var subEnlace_ = $('<a title="" href="' + this.url + '">' + this.texto + '</a>');
//                 subElemento_.append(subEnlace_);
//             });
//             //subElemento.apped(subLista2);
//            }
//         
         });
         //inserto la capa del submenu en el cuerpo de la página
         $(document.body).append(capaSubmenu);


         /////////////////////////////////////////
         //EVENTOS
         /////////////////////////////////////////

         //defino el evento mouseover para el enlace principal
         enlacePrincipal.mouseover(function(e){
            var enlace = $(this);
            clearTimeout(retardo)
            ocultarTodosSubmenus();
            //recupero la capa de submenu asociada
            submenu = enlace.data("capaSubmenu");
            //la muestro
            submenu.css("display", "block");
         });

         //defino el evento para el enlace principal
         enlacePrincipal.mouseout(function(e){
            var enlace = $(this);
            //recupero la capa de submenu asociada
            submenu = enlace.data("capaSubmenu");
            //la oculto
            clearTimeout(retardo);
            retardo = setTimeout("submenu.css('display', 'none');",500)

         });

         //evento para las capa del submenu
         capaSubmenu.mouseover(function(){
            clearTimeout(retardo);
         })

         //evento para ocultar las capa del submenu
         capaSubmenu.mouseout(function(){
            clearTimeout(retardo);
            submenu = $(this);
            retardo = setTimeout("submenu.css('display', 'none');",100)
         })

         //evento para cuando se redimensione la ventana
         if(arrayEnlaces.length==0){
            //Este evento sólo lo quiero ejecutar una vez
            $(window).resize(function(){
               colocarCapasSubmenus();
            });
         }

         /////////////////////////////////////////
         //FUNCIONES PRIVADAS DEL PLUGIN
         /////////////////////////////////////////

         //una función privada para ocultar todos los submenus
         function ocultarTodosSubmenus(){
            $.each(arrayCapasSubmenu, function(){
               this.css("display", "none");
            });
         }

         //función para colocar las capas de submenús al lado de los enlaces
         function colocarCapasSubmenus(){
            $.each(arrayCapasSubmenu, function(i){
               //coloco la capa en el lugar donde me interesa
               var posicionEnlace = arrayLiMenuPrincipal[i].offset();
               this.css({
                  left: posicionEnlace.left,
                  top: posicionEnlace.top + 28
               });
            });
         }


         //guardo el enlace y las capas de submenús y los elementos li en arrays
         arrayEnlaces.push(enlacePrincipal);
         arrayCapasSubmenu.push(capaSubmenu);
         arrayLiMenuPrincipal.push(elementoPrincipal);

         //coloco inicialmente las capas de submenús
         colocarCapasSubmenus();
      });

   });

   return this;
};

})(jQuery);


<?php
    $id_tipo_usu = $this->session->userdata('id_tipo');
    echo "<input type='hidden' value='$id_tipo_usu' id='tipo_usu' >";        
?>

<script type="text/javascript">
$( document ).ready(function() {
    
    
    function crear_menu(){
        var tipo_usu=$('#tipo_usu').val();   

        $.post(base_url+"login/buscar_menu",{tipo_user:tipo_usu},function(datos){//Buscar datos del proyecto
            var obj = JSON.parse(datos);
            if(obj.length){
                menu="";
                menu+="<li>"+
                        "<a href='<?= base_url(); ?>uifisi'>"+
                        "    <i class='icon icon-home'></i><span> PRINCIPAL</span>"+
                        "</a> "+
                       "</li>";

                var  sgt_padre;
                var cont;
                
                for (var i = 0; i <obj.length; i++) { 
                    var padre=obj[i].menu_padre;
                    cont=i+1;

                    

                    if(padre==null && obj[i].menu_url==null){

                        menu+="<li class='submenu' >"+
                                "<a href='#' id='menu'>"+
                                "   <i class='icon "+obj[i].menu_icono+"'></i><span> "+obj[i].menu_descripcion+"</span>"+
                                "</a>"+
                                "<ul>";
                        
                    }else if(padre!=null && obj[i].menu_url!=null){
                        menu+="<li>"+
                                "<a  url='"+obj[i].menu_url+"' >"+
                                "    <i class='icon icon-check-empty' ></i><span> "+obj[i].menu_descripcion+"</span>"+ 
                                "</li>";

                        if (cont<obj.length) {
                            sgt_padre=obj[cont].menu_padre;
                        }
                        if(cont==obj.length || sgt_padre!=padre ){
                         menu+="</ul></li>";
                        }                       
                    }
                    
                    
                }   
                $('#lista_menu').html(menu);

            }else{
                alert('No tiene permiso');
            }

            $('.submenu > a').click(function(e) {

                e.preventDefault();
                var submenu = $(this).siblings('ul');
                var li = $(this).parents('li');
                var submenus = $('#sidebar li.submenu ul');
                var submenus_parents = $('#sidebar li.submenu');
                if(li.hasClass('open'))
                {
                    if(($(window).width() > 768) || ($(window).width() < 479)) {
                        submenu.slideUp();
                    } else {
                        submenu.fadeOut(250);
                    }
                    li.removeClass('open');
                } 
                else 
                {
                    if(($(window).width() > 768) || ($(window).width() < 479)) {
                        submenus.slideUp();         
                        submenu.slideDown();
                    } else {
                        submenus.fadeOut(250);          
                        submenu.fadeIn(250);
                    }
                    submenus_parents.removeClass('open');       
                    li.addClass('open');    
                }
            });
            
            var ul = $('#sidebar > ul');
            
            $('#sidebar > a').click(function(e)
            {

                e.preventDefault();
                var sidebar = $('#sidebar');
                if(sidebar.hasClass('open'))
                {
                    sidebar.removeClass('open');
                    ul.slideUp(250);
                } else 
                {
                    sidebar.addClass('open');
                    ul.slideDown(250);
                }
            });

            $('.submenu > ul > li > a').click(function(e)
            {   
                $("#content").load(base_url+$(this).attr('url'));

            });
                    
            function loader(url)
            {   
                $("#content").load(base_url+url);
            }
        });
    }
   crear_menu();

   
});


</script>

 <div id="sidebar"> 
    <a href="#" class="visible-phone"><i class="icon icon-list"></i> OPCIONES </a>
        <ul id='lista_menu'>
        </ul>    
 </div>   

function alerta(titulo,contenido,tama,color){
    $.alert({
        title: titulo,
        content: contenido,
        className: tama,
        type: color,
    });
}
function usuarios(accion) {
    switch (accion) {
        case 'loadPhoto':
            formulario = new FormData(document.getElementById("formFoto"));
            formulario.append("accion",accion);

            if($("#foto").val()=='')
                alerta("Atencion","El campo Foto es Obligatorio","m","red");
            else
                if($("#foto")[0].files[0].size<400000)
                    alerta("Atencion","Imagen Demasiado Grande, rebasa 40KB","m","red");
                else   

            $.ajax({
                type:"POST",
                method:'POST',
                url: "../class/classUsuario.php",
                //data:$("#formEstatus").serialize(),
                //data:{"Nombre":}
                data: formulario,
                dataType: "html",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    alerta("atencion","se debio enviar la foto","m","red");
                },
                success: function(codiHTML){
                   
                },
            });
            break;
        /*
        case 'formEdit':
        case 'formNew':
            datos = "accion="+accion;
            if(typeof(id!="undefined"))
                datos+="&Id="+id;
            $.confirm({
                title: ((accion=='formNew')?'Nuevo Estatus':'Actualizar Estatus'),
                theme: 'bootstrap',
                closeIcopn: true,
                type: 'red',
                content: "URL:../class/classEstatus.php?"+datos,
                buttons: {
                    Registrar: {
                        action: function () {
                            $.ajax({
                                type:"POST",method:'POST',
                                url: "../class/classEstatus.php",
                                data:$("#formEstatus").serialize(),

                                beforeSend: function(){
                                    $("#wait").show();
                                },
                                success: function(codiHTML){
                                   $("#areaTrabajo").html(codiHTML)
                                },
                            });
                        }
                    },
                    cancelar: {
                        type: "red"
                    },

                }
            });
        break;
        case 'borrar':
            $.confirm({
                title: 'Borrar Estatus',
                theme: 'bootstrap',
                closeIcon: true,
                type: 'red',
                columnClass: 'medium',
                content: "Estas Segur@ de borrar el registro?: "+id,
                buttons: {
                    Confirmar: {
                        action: function () {
                            $.ajax({
                                type:"POST",method:'POST',
                                url: "../class/classEstatus.php",
                                data:{"Id":id,"accion":accion},

                                beforeSend: function(){
                                    $("#wait").show();
                                    $("#areaTrabajo").html("");
                                },
                                success: function(codiHTML){
                                   $("#areaTrabajo").html(codiHTML)
                                },
                            });
                        }    
                    },
                    Cancelar: {
                        type: "red"
                    },

                }
            });
            break;*/
        default:
            $.alert(
                {
                    title:"Atencion",
                    content:accion+" No esta Programada en Usuarios.js"
                }
            )
            break;
    }
}
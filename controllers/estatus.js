function estatus(accion,id) {
    switch (accion) {
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
            break;
        default:
            $.alert(
                {
                    title:"Atencion",
                    content:accion+"No esta Programada en Estatus.js"
                }
            )
            break;
    }
}
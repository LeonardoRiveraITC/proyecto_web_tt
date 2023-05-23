<?php
include "classBD.php";
class Usuario extends baseDatos
{
    function list()
    {
        $this->consulta("SELECT id,Correo,concat(Nombre,' ',Apellidos) as nombre,fechaUltAcceso FROM usuario order by Nombre");
        $html = '<table class="table table-hover table-striped table-light">';

        // $html .= '<thead><tr class="table-dark">
        //                     <td colspan="2">
        //                         <form method="post" action="usuario.php">
        //                         <input type="image" src ="../img/plus.png" width="24px" />
        //                         <input type="hidden" name="accion" value="formNew"/>
        //                         </form> 
        //                     </td>';
        $html .= '<thead><tr class="table-primary">
                            <td colspan="2">
                                <form method="post" action="Usuario.php">
                                <input type="image" src ="../img/plus.png" width="24px" />
                                <input type="hidden" name="accion" value="formNew"/>
                                </form> 
                            </td>';
        for ($enca = 1; $enca <= $this->numeColumnas; $enca++) {
            $html .= '<th>' . $this->nombColumnas[$enca-1]->name . '</th>';
        }
        $html .= "</tr></thead><tbody>";
        for ($ren = 1; $ren <= $this->numeRegistros; $ren++) {
            $html .= '<tr>';
            
            $datos = $this->getRecord();

            // $html.='<td>
            //             <form method="post" action="usuario.php">
            //             <input type="image" src="../img/lapiz.png" width="24px" />
            //             <input type="hidden" name="id" value='.$datos[0].' />
            //             <input type="hidden" name="accion" value="formEdit"/>
            //             </form>
            //         </td>
                    
            //         <td>
            //             <form method="post" action="usuario.php" 
            //             onsubmit="return confirm(\'Estas seguro?\')">
            //             <input type="image" src="../img/trash.png" width="24px"/>
            //             <input type="hidden" name="id" value='.$datos[0].'  />
            //             <input type="hidden" name="accion" value="borrar"/>
            //             </form>
            //         </td>';

            $html .= '<td>
                        <form method="post" action="usuario.php">
                        <input type="image" src="../img/lapiz.png" width="24px" />
                        <input type="hidden" name="id" value=' . $datos[0] . ' />
                        <input type="hidden" name="accion" value="formEdit"/>
                        </form>
                    </td>
                    
                    <td>
                        <form method="post" action="usuario.php">
                        <input type="image" src="../img/trash.png" width="24px" />
                        <input type="hidden" name="id" value=' . $datos[0] . '  />
                        <input type="hidden" name="accion" value="borrar"/>
                        </form>
                    </td>';
            for ($col = 1; $col <= $this->numeColumnas; $col++) {
                $html .= "<td>".$datos[$col-1]."</td";
                $html .= '</tr>';
            }
        }
        $html .= '</tbody>';
        $html .= '</table>';
        return $html;
    }

    function ejecuta($p_accion,$p_id=0){
        $html="";
        switch($p_accion){
            case 'formEdit':
                $registro=$this->getTupla("SELECT * FROM usuario where id=".$p_id);
            case 'formNew':
                

                $html.='<div class="d-flex justify-content-center">
                            <form method="post" class="col-6">';
                if($p_accion=='formNew')
                    $html.="<h3  class='text-center mb-5'>Nuevo Usuario</h3>";
                else{
                    $html.='<h3 class="text-center mb-5">Actualizar Usuario</h3>
                            <input type="hidden" name="Id" value="'.(isset($registro)?$registro->id:'').'"';
                }               
                    $html.='<div class="container">
                                <div class="row">
                                    <label class="col-4" for="Nombre">Nombre</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="Nombre" value='.
                                                (isset($registro)?$registro->Nombre:'').'>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Apellidos</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="Apellidos" value='.
                                                (isset($registro)?$registro->Apellidos:'').'>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Correo</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="Correo" value='.
                                                (isset($registro)?$registro->Correo:'').'>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Pwd</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="Pwd" value='.
                                                (isset($registro)?$registro->Pwd:'').'>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Telefono</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" name="Telefono" value='.
                                                (isset($registro)?$registro->Telefono:'').'>
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-4">IdRol</label>
                                        <div class="col-8">';


                                        $html.=$this->crearLista("SELECT * FROM catarol order by Nombre",
                                                    "idRol","idRol","Nombre",(isset($registro)?$registro->idRol:0));

                                        $html.='
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-4">idTendencia</label>
                                        <div class="col-8">';

                                        $html.=$this->crearLista("SELECT * FROM catatendencia order by Nombre",
                                                    "idTendencia","idTendencia","Nombre",(isset($registro)?$registro->idCataTendencia:0));

                                        $html.='
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-4">Genero</label>
                                        <div class="col-8">';

                                        $html.=$this->crearLista("SELECT * FROM catagenero order by Nombre",
                                                    "idGenero","idGenero","Nombre",(isset($registro)?$registro->idGenero:0));

                                        $html.='
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-4">Zodiaco</label>
                                        <div class="col-8">';


                                        $html.=$this->crearLista("SELECT * FROM catazodiaco order by Nombre",
                                                    "idZodiaco","idZodiaco","Nombre",(isset($registro)?$registro->idZodiaco:0));

                                        $html.='
                                        </div>
                                </div>
                                    <div class="row mt-d mt-5">
                                        <button type="submit" class="btn btn-success btn-sm">'
                                        .
                                                (isset($registro)?'Actualizar':'Registrar').'
                                        </button>
                                        <input type="hidden" name="accion" value='
                                        .
                                                (isset($registro)?'update':'insert').'
                                        />
                                    </div>
                            </div>
                            </form>
                        </div>';
                break;
            case 'borrar':
                $query='delete from Usuario where id='.$p_id;
                $this->consulta($query);
                return $this->list();
                break;
            case 'insert';
                $query="insert into Usuario set ";
                foreach($_POST as $campo => $valor){
                    if($campo!="accion")
                        if($campo!="Pwd")
                            $query.=$campo."='".$valor."', ";
                        else
                            $query.=$campo."=password('".$valor."'), "; 
                }
                $query=substr($query,0,-2);
                //echo $query;
                $this->consulta($query);
                //var_dump($_POST);
                return $this->list();
                break;
            case 'update':
                $query='update Usuario set ';
                foreach($_POST as $campo => $valor){
                    if($campo!="accion")
                        if($campo!="Id")
                        if($campo!="Pwd")
                            $query.=$campo."='".$valor."', ";
                        else
                            $query.=$campo."=password('".$valor."'), ";
                }
                
                $query=substr($query,0,-2);
                $query.=" where id=".$_POST['Id'];
                //echo $query;
                $this->consulta($query);
                return $this->list();
                break;
            default:
                $html=$p_accion."No esta programada en classUsuario";        
        }
        return $html;
    }
}
$objeUsuario = new Usuario();

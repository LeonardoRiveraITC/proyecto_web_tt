<?php
include "classBD.php";
class Zodiaco extends baseDatos
{
    function list()
    {
        $this->consulta("SELECT * FROM zodiaco order by nombre");
        $html = '<table class="table table-hover table-striped table-dark">';

        $html .= '<thead><tr class="table-primary">
                            <td colspan="2">
                                <form method="post" action="../admin/zodiaco.php">
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

            $html.='<td>
                        <form method="post" action="../admin/zodiaco.php">
                        <input type="image" src="../img/lapiz.png" width="24px" />
                        <input type="hidden" name="id" value='.$datos[0].' />
                        <input type="hidden" name="accion" value="formEdit"/>
                        </form>
                    </td>
                    
                    <td>
                        <form method="post" action="../admin/zodiaco.php">
                        <input type="image" src="../img/trash.png" width="24px" />
                        <input type="hidden" name="id" value='.$datos[0].'  />
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
                $registro=$this->getTupla("select * from catazodiaco where idZodiaco=".$p_id);
            case 'formNew':
                

                $html.='<div class="d-flex justify-content-center">
                            <form method="post" class="col-4">';
                if($p_accion=='formNew')
                    $html.="<h3  class='text-center mb-5'>Nuevo simbolo Zodiaco</h3>";
                else{
                    $html.='<h3 class="text-center mb-5">Actualizar Zodiaco</h3>
                            <input type="hidden" name="Id" value="'.(isset($registro)?$registro->idZodiaco:'').'"';
                }               
                    $html.='<div class="container">
                                <div class="row">
                                    <label class="col-4">Nombre</label>
                                        <div class="col-8">
                                            <input class="" type="text" name="nombre" value='.
                                                (isset($registro)?$registro->Nombre:'').'>
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
                $query='delete from catazodiaco where idZodiaco='.$p_id;
                $this->consulta($query);
                return $this->list();
                break;
            case 'insert';
                $query="insert into catazodiaco(Nombre) values ('".$_POST['nombre']."')";
                $this->consulta($query);
                return $this->list();
                break;
            case 'update':
                $query='update catazodiaco set Nombre="'.$_POST['nombre'].'" where idZodiaco='.$_POST['Id'];
                $this->consulta($query);
                return $this->list();
                break;
            default:
                $html=$p_accion."No esta programada en classZodiaco";        
        }
        return $html;
    }
}
$objeZodiaco = new Zodiaco();

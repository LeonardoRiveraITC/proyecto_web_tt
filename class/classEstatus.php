<?php
include "classBD.php";
class Estatus extends baseDatos
{
    // function list()
    // {
    //     $this->consulta("SELECT * FROM estatus order by nombre");
    //     $html = '<table class="table table-hover table-striped table-light">';

    //     // $html .= '<thead><tr class="table-dark">
    //     //                     <td colspan="2">
    //     //                         <form method="post" action="estatus.php">
    //     //                         <input type="image" src ="../img/plus.png" width="24px" />
    //     //                         <input type="hidden" name="accion" value="formNew"/>
    //     //                         </form> 
    //     //                     </td>';

    //     $html .= '<thead><tr class="table-primary">
    //                         <td colspan="2">
    //                             <img type="image" src ="../img/plus.png" width="24px" 
    //                             class="icon_accion" onclick="estatus(\'formNew\')"/>
    //                         </td>';
    //     for ($enca = 1; $enca <= $this->numeColumnas; $enca++) {
    //         $html .= '<th>' . $this->nombColumnas[$enca - 1]->name . '</th>';
    //     }
    //     $html .= "</tr></thead><tbody>";
    //     for ($ren = 1; $ren <= $this->numeRegistros; $ren++) {
    //         $html .= '<tr>';

    //         $datos = $this->getRecord();

    //         // $html .= '<td>
    //         //             <form method="post" action="../admin/estatus.php">
    //         //             <input type="image" src="../img/crear.png" width="24px" />
    //         //             <input type="hidden" name="id" value=' . $datos[0] . ' />
    //         //             <input type="hidden" name="accion" value="formEdit"/>
    //         //             </form>
    //         //         </td>

    //         //         <td>
    //         //             <form method="post" action="../admin/estatus.php" onsubmit="return confirm(\'Estas seguro?\')">
    //         //             <input type="image" src="../img/borrar.png" width="24px" 
    //         //             />
    //         //             <input type="hidden" name="id" value=' . $datos[0] . '  />
    //         //             <input type="hidden" name="accion" value="borrar"/>
    //         //             </form>
    //         //         </td>';

    //         $html .= '<td>
    //                         <img type="image" src="../img/lapiz.png" width="24px" class="icon_accion" 
    //                             onClick="estatus(\'formEdit\',' . $datos[0] . ')"/>
    //                 </td>

    //                 <td>
    //                     <img class="icon_accion" onClick="estatus(\'borrar\',' . $datos[0] . ')" 
    //                             type="image" src="../img/trash.png" width="24px" />
    //                     <input type="hidden" name="id" value=' . $datos[0] . '  />
    //                     <input type="hidden" name="accion" value="borrar"/>
    //                 </td>';

    //         for ($col = 1; $col <= $this->numeColumnas; $col++) {
    //             $html .= "<td>" . $datos[$col - 1] . "</td";
    //             $html .= '</tr>';
    //         }
    //     }
    //     $html .= '</tbody>';
    //     $html .= '</table>';
    //     return $html;
    // }

    // function ejecuta($p_accion, $p_id = 0)
    // {
    //     $html = "";
    //     switch ($p_accion) {
    //         case 'formEdit':
    //             $registro = $this->getTupla("SELECT * FROM estatus WHERE idEstatus=" . $p_id);
    //         case 'formNew':

    //             $html .= '<div class="justify-content-center">
    //                         <form method="post" action="estatus.php" id="formEstatus" class="col-4">
    //                         <div id="wait" style="display:none;" class="spinner-border" role="status">
    //                             <span class="visually-hidden">Procesando...</span>
    //                         </div>';
    //             /*if($p_accion=='formNew')
    //                 $html.="<h3  class='text-center mb-5'>Nuevo Estatus</h3>";
    //             else{*/
    //             if ($p_accion != "formNew")
    //                 $html .= '<input type="hidden" name="Id" value="' . (isset($registro) ? $registro->idEstatus : '') . '"';

    //             $html .= '<div class="container">
    //                             <div class="row">
    //                                 <label class="col-6">Nombre</label>
    //                                     <div class="col-8">
    //                                         <input class="" type="text" name="nombre" value=' .
    //                 (isset($registro) ? $registro->nombre : '') . '>
    //                                     </div>
    //                                 </div>
    //                                 <div class="row">
    //                                     <!--<button type="button" class="btn btn-success btn-sm">'
    //                 .
    //                 (isset($registro) ? 'Actualizar' : 'Registrar') . '
    //                                     </button>
    //                                     -->
    //                                     <input type="hidden" name="accion" value='
    //                 .
    //                 (isset($registro) ? 'update' : 'insert') . '
    //                                     />
    //                                     <br>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                         </form>
    //                     </div>';

    //             // $html .= '<div class="d-flex justify-content-center">
    //             //             <form method="post" class="col-4">';
    //             // if ($p_accion == 'formNew')
    //             //     $html .= "<h3  class='text-center mb-5'>Nuevo Estatus</h3>";
    //             // else {
    //             //     $html .= '<h3 class="text-center mb-5">Actualizar Estatus</h3>
    //             //             <input type="hidden" name="Id" value="' . (isset($registro) ? $registro->idEstatus : '') . '"';
    //             // }
    //             // $html .= '<div class="container">
    //             //                 <div class="row">
    //             //                     <label class="col-4">Nombre</label>
    //             //                         <div class="col-8">
    //             //                             <input class="" type="text" name="nombre" value=' .
    //             //     (isset($registro) ? $registro->Nombre : '') . '>
    //             //                         </div>
    //             //                     </div>
    //             //                     <div class="row mt-d mt-5">
    //             //                         <button type="submit" class="btn btn-success btn-sm">'
    //             //     .
    //             //     (isset($registro) ? 'Actualizar' : 'Registrar') . '
    //             //                         </button>
    //             //                         <input type="hidden" name="accion" value='
    //             //     .
    //             //     (isset($registro) ? 'update' : 'insert') . '
    //             //                         />
    //             //                     </div>
    //             //                 </div>
    //             //             </form>
    //             //         </div>';
    //             break;
    //         case 'borrar':
    //             $query = 'delete from estatus where idEstatus=' . $p_id;
    //             $this->consulta($query);
    //             return $this->list();
    //             break;
    //         case 'insert';
    //             $query = "insert into estatus(Nombre) values ('" . $_POST['nombre'] . "')";
    //             $this->consulta($query);
    //             return $this->list();
    //             break;
    //         case 'update':
    //             $query = 'update estatus set Nombre="' . $_POST['nombre'] . '" where idEstatus=' . $_POST['Id'];
    //             $this->consulta($query);
    //             return $this->list();
    //             break;
    //         default:
    //             $html = $p_accion . "No esta programada en classEstatus";
    //     }
    //     return $html;
    // } //close function

    // function estatus(accion) {
    //     switch(accion) {
    //         case 'formNew': $.confirm({
    //             title: "Nuevo estatus"
    //         })
    //     }
    // }


    function list()
    {
        $this->consulta("SELECT * FROM estatus order by nombre");
        $html = '<table class="table table-hover table-light">';

        $html .= '<thead><tr class="table-secondary">
                            <td colspan="2">
                                <img type="image" src ="../img/plus.png" width="24px" 
                                    class="icon_accion" onclick="estatus(\'formNew\')"/>
                            </td>';
        for ($enca = 1; $enca <= $this->numeColumnas; $enca++) {
            $html .= '<th>' . $this->nombColumnas[$enca - 1]->name . '</th>';
        }
        $html .= "</tr></thead><tbody>";
        for ($ren = 1; $ren <= $this->numeRegistros; $ren++) {
            $html .= '<tr>';

            $datos = $this->getRecord();

            $html .= '<td>
                            <img type="image" src="../img/lapiz.png" width="24px" class="icon_accion" 
                                onClick="estatus(\'formEdit\',' . $datos[0] . ')"/>
                    </td>
                    
                    <td>
                        <img class="icon_accion" onClick="estatus(\'borrar\',' . $datos[0] . ')" 
                                type="image" src="../img/trash.png" width="24px" />
                        <input type="hidden" name="id" value=' . $datos[0] . '  />
                        <input type="hidden" name="accion" value="borrar"/>
                    </td>';
            for ($col = 1; $col <= $this->numeColumnas; $col++) {
                $html .= "<td>" . $datos[$col - 1] . "</td";
                $html .= '</tr>';
            }
        }
        $html .= '</tbody>';
        $html .= '</table>';
        return $html;
    }

    function ejecuta($p_accion, $p_id = 0)
    {
        $html = "";
        switch ($p_accion) {
            case 'formEdit':
                $registro = $this->getTupla("select * from estatus where idEstatus=" . $p_id);
            case 'formNew':


                $html .= '<div class="justify-content-center">
                            <form method="post" action="estatus.php" id="formEstatus" class="col-4">
                            <div id="wait" style="display:none;" class="spinner-border" role="status">
                                <span class="visually-hidden">Procesando...</span>
                            </div>';

                if ($p_accion != "formNew")
                    $html .= '<input type="hidden" name="Id" value="' . (isset($registro) ? $registro->idEstatus : '') . '"';

                $html .= '<div class="container">
                                <div class="row">
                                    <label class="col-6">Nombre</label>
                                        <div class="col-8">
                                            <input class="" type="text" name="nombre" value=' .
                    (isset($registro) ? $registro->nombre : '') . '>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--<button type="button" class="btn btn-success btn-sm">'
                    .
                    (isset($registro) ? 'Actualizar' : 'Registrar') . '
                                        </button>
                                        -->
                                        <input type="hidden" name="accion" value='
                    .
                    (isset($registro) ? 'update' : 'insert') . '
                                        />
                                        <br>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>';
                break;
            case 'borrar':
                $query = 'delete from estatus where idEstatus=' . $p_id;
                $this->consulta($query);
                return $this->list();
                break;
            case 'insert';
                $query = "insert into estatus(nombre) values ('" . $_POST['nombre'] . "')";
                $this->consulta($query);
                return $this->list();
                break;
            case 'update':
                $query = 'update estatus set Nombre="' . $_POST['nombre'] . '" where idEstatus=' . $_POST['Id'];
                $this->consulta($query);
                return $this->list();
                break;
            default:
                $html = $p_accion . "No esta programada en classEstatus";
        }
        return $html;
    }
}
$objeEstatus = new Estatus();
if (isset($_REQUEST['accion']))
    echo $objeEstatus->ejecuta($_REQUEST['accion'], (isset($_REQUEST['Id'])) ? $_REQUEST['Id'] : 0);


// if(isset($_GET['accion'])) 
// echo $objeEstatus

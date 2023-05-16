<?php

include "../class/classBD.php";
class Tendencia extends baseDatos
{

    function list()
    {
        $this->consulta("SELECT * FROM catatendencia order by Nombre");
        $html = '<table class="table table-hover table-striped">';

        $html .= '<thead><tr class="table-primary">
                            <td colspan="2">
                                <form method="post" action="tendencia.php">
                                <input type="image" src ="../img/add.png" width="24px" />
                                <input type="hidden" name="accion" value="formNew"/>
                                </form> 
                            </td>';
        for ($enca = 1; $enca <= $this->numeColumnas; $enca++) {
            $html .= '<th>' . $this->nombColumnas[$enca - 1]->name . '</th>';
        }
        $html .= "</tr></thead><tbody>";
        for ($ren = 1; $ren <= $this->numeRegistros; $ren++) {
            $html .= '<tr>';

            $datos = $this->getRecord();

            $html .= '<td>
                        <form method="post" action="tendencia.php">
                        <input type="image" src="../Imagenes/crear.png" width="24px" />
                        <input type="hidden" name="id" value=' . $datos[0] . ' />
                        <input type="hidden" name="accion" value="formEdit"/>
                        </form>
                    </td>
                    
                    <td>
                        <form method="post" action="tendencia.php">
                        <input type="image" src="../img/borrar.png" width="24px" />
                        <input type="hidden" name="id" value=' . $datos[0] . '  />
                        <input type="hidden" name="accion" value="borrar"/>
                        </form>
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

    function lista()
    {
        //$this->consulta("SELECT * from catatendencia order by Nombre");
        $this->consulta("Select idTendencia, Nombre from catatendencia");
        $html = '<table class="table table-hover table-striped table-dark">';

        $html .= '<tr><td colspan="2"><img src="../img/plus.png" width="24px" /></td>';

        for ($col = 0; $col < $this->numeColumnas; $col++) { //cabeceras
            $html .= '<th>' . $this->nombColumnas[$col]->name . '</th>';
        }
        $html .= '</tr>';

        for ($ren = 0; $ren < $this->numeRegistros; $ren++) {
            $html .= '<tr>';
            $datos = $this->getRecord();
            $html .= '<td><img src="../img/lapiz.png" width="24px" /></td><td><img src="../img/trash.png" width="24px" /></td>';
            for ($col = 0; $col < $this->numeColumnas; $col++) {
                $html .= '<td>' . $datos[$col] . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    }
}
$objeTendencia = new Tendencia();

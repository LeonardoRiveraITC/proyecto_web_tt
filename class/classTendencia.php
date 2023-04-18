<?

include "../class/classBD.php";
class Tendencia extends baseDatos
{

    function list()
    {
        $this->consulta("Select idTendencia, Nombre from catatendencia");

        /*
        foreach($this->bloqueRegistros as $registro){
            $html.='<option value="'.$registro[$IdPk].'">'.$registro[$nombCampDesplegar].'</option>';
        }*/

        /* El que yo hice */
        $html = '<table class="table table-hover" border="1" width="40%">';
        $i = 0;
        while ($row = mysqli_fetch_assoc($this->bloqueRegistros)) {
            $html .= '<tr>';
            for ($col = 1; $col <= 2; $col++) {
                if ($i == 0) {
                    $html .= "<td>" . $row['idTendencia'] . "</td>";
                } else if ($i == 1) {
                    $html .= "<td>" . $row['Nombre'] . "</td>";
                } else {
                    $html .= "<td></td>";
                }
                $i++;
                if ($i == 2)
                    $i = 0;
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
        //return "Mostrar el listado de registros en la BD";
    }

    function lista()
    {
        //$this->consulta("SELECT * from catatendencia order by Nombre");
        $this->consulta("Select idTendencia, Nombre from catatendencia");
        $html = '<table class="table table-success table-hover">';

        $html .= '<tr class="table-light"><td colspan="2"><img src="../imagenes/plus.png" width="24px" /></td>';

        for ($col = 0; $col < $this->numeColumnas; $col++) { //cabeceras
            $html .= '<th>' . $this->nombColumnas[$col]->name . '</th>';
        }
        $html .= '</tr>';

        for ($ren = 0; $ren < $this->numeRegistros; $ren++) {
            $html .= '<tr>';
            $datos = $this->getRecord();
            $html .= '<td><img src="../imagenes/lapiz.png" width="24px" /></td><td><img src="../imagenes/trash.png" width="24px" /></td>';
            for ($col = 0; $col < $this->numeColumnas; $col++) {
                $html .= "<td>" . $datos[$col] . "</td>";
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    }
}
$objeTendencia = new Tendencia();

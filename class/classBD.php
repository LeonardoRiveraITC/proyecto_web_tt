<?php

class baseDatos {
    var $conexion;
    var $numeRegistros;
    var $bloqueRegistros;

    function conecta(){
        $this->conexion = mysqli_connect("localhost", "root", "", "mitinder"); // or die("No se puede conectar");
    }

    function consulta($p_sql){  //  solo para select, si meto insert da error
        $this->conecta();
        $this->bloqueRegistros = mysqli_query($this->conexion, $p_sql);
        if (strpos(strtoupper($p_sql), "SELECT") != false) {
            $this->numeRegistros = mysqli_num_rows($this->bloqueRegistros);

            if (mysqli_error() > "") {
                echo mysqli_error() . " " . $p_sql;
                exit;
            }
        }

        /*else{
                $this->numeRegistros=mysqli_affected_rows();
            }*/
        //$this->numeRegistros=mysqli_num_rows($this->bloqueRegistros);
        $this->cierraBD();
    }

    function cierraBD()
    {
        mysqli_close($this->conexion);
    }

    function getTupla($query)
    {
        $this->consulta($query);
        return mysqli_fetch_object($this->bloqueRegistros);
    }

    function crearLista($p_query, $nombLista, $IdPk, $nombCampDesplegar)
    {
        $html = '<select class="form-control" name="' . $nombLista . '">';

        $this->consulta($p_query);

        foreach ($this->bloqueRegistros as $registro) {
            $html .= '<option value="' . $registro[$IdPk] . '">' . $registro[$nombCampDesplegar] . '</option>';
        }

        return $html . '</select>';
    }
}

$objeBD = new baseDatos();

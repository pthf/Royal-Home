
<?php
class Conectar{

    public function __contructor(){
        ini_set('display_errors', 'on');
    }
    static function con(){
        $link = mysql_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('failbox', $link) or die('No se pudo seleccionar la base de datos');
        return $link;
    }

}
?>

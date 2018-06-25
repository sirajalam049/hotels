<?php

    function con(){
        $u = 'root';
        $p = 'rT$_64';
        $d = 'hotels';

        $GLOBALS['con'] = new mysqli('localhost', $u, $p,$d )
            or die('Connection Failed. '.$con->error);
    }

?>
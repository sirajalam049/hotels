<?php

function con()
{
    $u = 'root';
    $p = 'mysql-049'; // Your mysql password comes here.
    $d = 'hotels';

    $GLOBALS['con'] = new mysqli('127.0.0.1', $u, $p, $d)
        or die('Connection Failed. ' . $con->error);
}

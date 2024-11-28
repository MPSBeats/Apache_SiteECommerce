<?php

try{
    $bdd = new PDO("pgsql:host=localhost;port=5432;dbname=SITEECOMMERCE","postgres","Mapaaskla1");
}

catch(ErrorException $e)
{
    echo $e;
}

?>
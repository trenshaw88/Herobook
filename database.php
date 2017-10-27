<?php

  function getDb() {

    $db = pg_connect("host=localhost port=5432 dbname=herobook user=hero password=herosuper");

    return $db;

  }

?>

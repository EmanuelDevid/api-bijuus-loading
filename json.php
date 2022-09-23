<?php

require_once("Bijuu.php");

header("Content-Type: application/json");

$bijuu = new Bijuu();

$dados = $bijuu->read(0);

die(json_encode($dados));
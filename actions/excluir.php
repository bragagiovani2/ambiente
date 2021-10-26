<?php
include_once "../classes/Contato.php";

$contato = new Contato();
echo $contato->excluir($_POST['id']);
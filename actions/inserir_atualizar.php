<?php
include_once "../classes/Contato.php";

$contato = new Contato();
$contato->nome = $_POST['nome'];
$contato->sobrenome = $_POST['sobrenome'];
$contato->telefone = $_POST['telefone'];
$contato->email = $_POST['email'];

if (isset($_GET['id'])) {
    echo $contato->editar($_GET['id']);
} else {
    echo $contato->inserir();
}
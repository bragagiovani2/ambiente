<?php

Class Contato {

    private $nome;
    private $sobrenome;
    private $telefone;
    private $email;
    private $db;

    private $table = 'contato';

    public function __construct() {
        // Inicializa conexão com o banco
        $this->db = new PDO('mysql:host=localhost;dbname=av3; charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function listar($id = null) {

        $where = "";
        if ($id != null) {
            $where = "WHERE id = :id";
        }

        $lista = $this->db->prepare("SELECT * FROM contato $where");

        if ($id != null) {
            $lista->execute([':id' => $id]);
        } else {
            $lista->execute();
        }

        $contatos = $lista->fetchAll(PDO::FETCH_ASSOC);

        return $contatos;
    }

    public function inserir() {
        $insert = $this->db->prepare('INSERT INTO contato (nome,sobrenome, telefone, email)
            VALUES (:nome, :sobrenome, :telefone, :email)');

        $insert->execute([
            ':nome' => $this->nome,
            ':sobrenome' => $this->sobrenome,
            ':telefone' => $this->telefone,
            ':email' => $this->email
        ]);

        if ($insert->rowCount() > 0) {
            return "Contato inserido com sucesso!<br>
            <a href='../index.php' title='Voltar'>Voltar para a listagem</a>";
        }

        return "Erro ao inserir contato!<br>
        <a href='formulario.php' title='Voltar'>Tentar novamente</a>";
    }

    public function editar($id) {
        $update = $this->db->prepare('UPDATE contato SET nome = ?, sobrenome = ?, telefone = ?, email = ? WHERE id = ?');
        $update->execute([
            $this->nome,
            $this->sobrenome,
            $this->telefone,
            $this->email,
            $id
        ]);

        if ($update->rowCount() > 0) {
            return "Contato atualizado com sucesso!<br>
            <a href='../index.php' title='Voltar'>Voltar para a listagem</a>";
        }
        echo "\nPDO::errorInfo():\n";
        print_r($this->db->errorInfo());
        return "Erro ao atualizar contato!<br>
        <a href='../formulario.php?id=$id' title='Voltar'>Tentar novamente</a>";
    }

    public function excluir(int $id) {
        $r = $this->db->prepare('DELETE FROM contato WHERE id=?');
        $r->execute([$id]);

        return json_encode(['sucesso' => $r->rowCount()]);
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}
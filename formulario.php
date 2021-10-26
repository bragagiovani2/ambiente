<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">

        <title>Contatos</title>
    </head>
    <body>
        <div class="row">
            <div class="col-2 offset-1 mt-5">
                <a href="index.php" title="Voltar para Listagem" class="btn btn-info float-left"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
            <div class="col-10 offset-1 mt-5">
                <?php
                include_once "./classes/Contato.php";
                $url = "actions/inserir_atualizar.php";
                if (isset($_GET['id'])) {
                    $contato = new Contato();

                    $dadosContato = $contato->listar($_GET['id'])[0];
                    $url = "actions/inserir_atualizar.php?id=".$_GET['id'];
                }
                ?>
                <form method="POST" action="<?=$url;?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?=$dadosContato['nome'] ?? '';?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?=$dadosContato['sobrenome'] ?? '';?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(51) 99999.9999" value="<?=$dadosContato['telefone'] ?? '';?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@mail.com.br" value="<?=$dadosContato['email'] ?? '';?>" required>
                    </div>
                    <button type="submit" class="btn btn-success float-right"><i class="far fa-save"></i> <?=isset($_GET['id']) ? 'Atualizar' : 'Salvar';?> Contato</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(function(){
            $("#telefone").mask("(99) 99999.9999")
        });
    </script>
</html>
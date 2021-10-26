<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">

        <title>Contatos</title>
    </head>
    <body>
        <div class="row">
            <div class="col-2 offset-9 mt-5">
                <a href="formulario.php" title="Adicionar Contato" class="btn btn-success float-right"><i class="fas fa-plus"></i> Adicionar Contato</a>
            </div>
            <div class="col-10 offset-1 mt-5">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once "./classes/Contato.php";

                    $contato = new Contato();
                    $contatos = $contato->listar();

                    foreach($contatos as $contato) {
                    ?>
                        <tr id="contato-<?=$contato['id'];?>">
                            <th scope="row"><?=$contato['id'];?></th>
                            <td><?=$contato['nome'];?></td>
                            <td><?=$contato['sobrenome'];?></td>
                            <td><?=$contato['telefone'];?></td>
                            <td><?=$contato['email'];?></td>
                            <td><a title='Editar contato' href="formulario.php?id=<?=$contato['id'];?>"><i class="fas fa-edit"></i></a></td>
                            <td><a data-contato="<?=$contato['id'];?>" class="excluir-contato" title='Excluir contato' href="javascript:;" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
        $(function(){
            $(".excluir-contato").click(function() {
                var confirm = window.confirm("Tem certeza que deseja excluir este contato?"),
                    contatoId = $(this).attr('data-contato');

                if (!confirm) {
                    return;
                }

                $.post("actions/excluir.php", {id: contatoId}, function(data) {
                    var result = JSON.parse(data)

                    if (result.sucesso != 1) {
                        alert("Erro ao tentar remover o contato.");
                        return;
                    }

                    $("#contato-"+contatoId).remove();
                    alert("Contato removido com sucesso!");
                });
            });
        });
    </script>
</html>
<?php 
include('dashboard.php');
require_once("inc/conexao.php");

$pdo=Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_forma_pagamento");
$stmt->execute(); 
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/pagamento.css" />
    
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Formas de Pagamento</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class=" col-md-3 col-sm-12 col-md-offset-4">
                <a href="categorias-criar.php" class="btn btn-info btn-block" id="insert">Inserir Forma de Pagamento</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista as $linha): ?>
                        <tr>
                        <td><?php echo $linha['id_forma_pagamento'] ?></td>
                        <td><?php echo $linha['descricao'] ?></td>
                        <td><?php echo $linha['status'] ?></td>
                        <td>
                            <a href="categorias-editar.php?id=<?php echo $linha['id_forma_pagamento'] ?>" class="btn btn-info"><span class="glyphicon glyphicon-cog"></span></a>
                            <a href="categorias-excluir-post.php?id=<?php echo $linha['id_forma_pagamento'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
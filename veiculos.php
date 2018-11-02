<?php 
include('dashboard.php');
require_once("inc/conexao.php");

$pdo=Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_veiculo");
$stmt->execute(); 
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/veiculos.css" />
    
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Veiculos</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class=" col-md-3 col-sm-12 col-md-offset-4">
                <a href="categorias-criar.php" class="btn btn-info btn-block" id="insert">Cadastrar Veiculo</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Chassi</th>
                        <th>Cor</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista as $linha): ?>
                        <tr>
                        <td><?php echo $linha['id_veiculo'] ?></td>
                        <td><?php echo $linha['placa'] ?></td>
                        <td><?php echo $linha['modelo'] ?></td>
                        <td><?php echo $linha['chassi'] ?></td>
                        <td><?php echo $linha['cor'] ?></td>
                        <td><?php echo $linha['categoria'] ?></td>
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
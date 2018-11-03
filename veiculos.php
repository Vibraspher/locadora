<?php 
include('dashboard.php');
require_once("inc/conexao.php");

$pdo=Database::conexao();
$stmt = $pdo->prepare("SELECT `id_veiculo`, C.descricao,`placa`,`modelo`,`chassi`,`cor`,`status` FROM `tb_veiculo` V INNER JOIN tb_categoria C ON C.id_categoria = V.id_categoria");
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
                <a href="veiculo-criar.php" class="btn btn-info btn-block" id="insert">Cadastrar Veiculo</a>
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
                        <td><?php echo $linha['descricao'] ?></td>
                        <td><?php echo $linha['status'] ?></td>
                        <td>
                            <a href="veiculo-alterar.php?id_veiculo=<?php echo $linha['id_veiculo'] ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-cog"></span></a>
                            <a href="inc/excluir-veiculo.php?id_veiculo=<?php echo $linha['id_veiculo']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
<?php 
include('dashboard.php');
require_once("inc/conexao.php");

$pdo=Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_usuario");
$stmt->execute(); 
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/usuarios.css" />
    
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-3">
                <h1>Usuários</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class=" col-md-3 col-sm-12 col-md-offset-3">
                <a href="usuario-criar.php" class="btn btn-info btn-block" id="insert">Cadastrar Usuário</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Perfil</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista as $linha): ?>
                        <tr>
                        <td><?php echo $linha['nome'] ?></td>
                        <td><?php echo $linha['cpf'] ?></td>
                        <td><?php echo $linha['id_perfil_usuario'] ?></td>
                        <td><?php echo $linha['email'] ?></td>
                        <?php if($linha['logradouro']==null){?>
                            <td></td>
                        <?php }else{?>
                            <td><?php echo $linha['logradouro']. ', '. $linha['numero']. ' '.$linha['bairro'].' - '.$linha['cidade'].'/'.$linha['estado'] .' '.$linha['cep']?></td>
                        <?php }?>
                        <td><?php echo $linha['status'] ?></td>
                        <td>
                            <a href="usuario-alterar.php?id_usuario=<?php echo $linha['id_usuario'] ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-cog"></span></a>
                            <a href="inc/excluir-usuario.php?id_usuario=<?php echo $linha['id_usuario']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
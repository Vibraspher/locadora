<?php
session_start();
require_once('inc/conexao.php');

if(!isset($_SESSION['login']) && !isset($_SESSION['senha'])):
    header("Location: index.php");	
endif;

$pdo=Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_usuario WHERE id_usuario=:id_usuario");
$stmt->execute(['id_usuario' => $_SESSION['id_usuario']]); 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$perfil = $user['id_perfil_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="img/car.png" type="image/x-icon"/>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/dashboard.css" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div class="nav-side-menu">
    <div class="brand">Olá, <?php echo $_SESSION['nome'] ?> <a href="inc/logout.php"><i class="fa fa-times-circle-o fa-lg"></a></i></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
        <?php   if($perfil == 3){ ?>
            <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="alterar-cliente.php?id_usuario=<?php echo $_SESSION['id_usuario']?>"><i class="fa fa-user fa-lg"></i> Alterar Perfil </a>
            </li>  

            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-check fa-lg"></i> Reserva </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-car fa-lg"></i> Alugar
                </a>
            </li>
        <?php } else { ?>
            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="#"><i class="fa fa-cog fa-lg"></i> Administrativo <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li><a href="usuarios.php">Usuários</a></li>
                <li><a href="veiculos.php">Veiculos</a></li>
                <li><a href="forma-pagamento.php">Formas de Pagamento</a></li>
            </ul> 

            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-check fa-lg"></i> Reserva </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-car fa-lg"></i> Alugar
                </a>
            </li>
        </ul>
        <?php } ?>
    </div>
</div>
</body>

</html>
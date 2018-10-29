<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar senha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/recuperar.css" />
    <link rel="icon" href="img/car.png" type="image/x-icon"/>

</head>
<body class="corpo">
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="recovery-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Recuperação de Senha</h3>
                </div>
                <div class="panel">
                    <form role="form" method="post" action="inc/recupera.php">
                        <input name="email" placeholder="Digite seu email cadastrado" class="form-control input-md" type="email" required/>  
                        <div class="row">
                            <div class="col-md-6 botao1">
                                <button type="submit" class="btn btn-primary btn-block">Recuperar</button>
                            </div>
                            <div class="col-md-6 botao1">
                                <a href="index.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
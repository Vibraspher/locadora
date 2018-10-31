<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/cadastro.css" />
    <link rel="icon" href="img/car.png" type="image/x-icon"/>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        jQuery(function($){
            $("#cpf").mask("999.999.999-99");
            $("#cep").mask("99999-999");
        });
    </script>
</head>
<body class="corpo">
    <div class="container">
        <h1>Novo Usuário</h1>
        <hr>
        <form method="POST" action="inc/cadastrar.php">
            <div class="row content-center">
                <div class="col-md-4 offset-md-2">
                    <div>
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label>CPF:</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div>
                        <label>Login:</label>
                        <input type="text" name="login" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label>Senha:</label>
                        <input type="password" name="senha" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div>
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-4 botao1 offset-md-2">
                    <input type="submit" name="cadastrar" class="btn btn-primary btn-block" value="Cadastrar"/>
                </div>
                <div class="col-md-4 botao2">
                    <a href="index.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
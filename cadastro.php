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
            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div>
                        <label>CPF:</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div>
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div>
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <label>Perfil:</label>
                        <select name="perfil" class="form-control">
                            <option  disabled value="2">Funcionario</option>
                            <option value="3" selected>Cliente</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-9">
                    <div>
                        <label>Logradouro:</label>
                        <input type="text" name="logradouro" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <label>Numero:</label>
                        <input type="number" name="numero" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label>Bairro:</label>
                        <input type="text" name="bairro" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <label>Cidade:</label>
                        <input type="text" name="cidade" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <label>Estado:</label>
                        <select name="estado" class="form-control">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE" selected>Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <label>CEP:</label>
                        <input type="text" id="cep" name="cep" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-6 botao1">
                    <input type="submit" name="cadastrar" class="btn btn-primary btn-block" value="Cadastrar"/>
                </div>
                <div class="col-md-6 botao2">
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
<?php 
include('dashboard.php');
require_once('inc/conexao.php');

$idUsuario = $_GET["id_usuario"];

$pdo=Database::conexao();
$stmt = $pdo->prepare('SELECT * FROM tb_usuario WHERE id_usuario = :id_usuario
                      ');
$stmt->bindParam(':id_usuario', $idUsuario);   
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        .botao{
            margin-top: 5px;
        }

        @media (max-width: 575.98px) {
            h1 {
                text-align: center;
            }
            .botao{
                margin-top: -5px;;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row content-center">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Alterar Usuário</h1>
                <hr>
        
                <form method="POST" action="inc/alterar-cliente.php?id_usuario=<?php echo $idUsuario?>">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Nome:</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $usuario['nome']; ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>CPF:</label>
                                <input type="text" name="cpf" value="<?php echo $usuario['cpf']; ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Email:</label>
                                <input type="email" name="email" value="<?php echo $usuario['email']; ?>" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Logradouro:</label>
                                <input type="text" name="logradouro" value="<?php echo $usuario['logradouro']; ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div>
                                <label>Numero:</label>
                                <input type="number" name="numero" value="<?php echo $usuario['numero']; ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Bairro:</label>
                                <input type="text" name="bairro" class="form-control" value="<?php echo $usuario['bairro']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Cidade:</label>
                                <input type="text" name="cidade" value="<?php echo $usuario['cidade']; ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Estado:</label>
                                <select name="estado" class="form-control" value="<?php echo $usuario['estado'];?>">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
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
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>CEP:</label>
                                <input type="text" name="cep" value="<?php echo $usuario['cep']; ?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 botao col-md-offset-1">
                            <label></label>
                            <input type="submit" name="alterar" class="btn btn-success btn-block" value="Alterar"/>
                        </div>
                        <div class="col-md-5 botao">
                            <label></label>
                            <a href="dashboard.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
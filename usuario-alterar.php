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

                <form method="POST" action="inc/alterar-usuario.php?id_usuario=<?php echo $idUsuario?>">
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
                                <label>Estado:</label><?php $estado = $usuario['estado']; ?>
                                <select name="estado" class="form-control" value="<?php echo $usuario['estado'];?>">
                                    <option value="AC" <?=($estado == "AC")?'selected':''?>>Acre</option>
                                    <option value="AL" <?=($estado == "AL")?'selected':''?>>Alagoas</option>
                                    <option value="AP" <?=($estado == "AP")?'selected':''?>>Amapá</option>
                                    <option value="AM" <?=($estado == "AM")?'selected':''?>>Amazonas</option>
                                    <option value="BA" <?=($estado == "BA")?'selected':''?>>Bahia</option>
                                    <option value="CE" <?=($estado == "CE")?'selected':''?>>Ceará</option>
                                    <option value="DF" <?=($estado == "DF")?'selected':''?>>Distrito Federal</option>
                                    <option value="ES" <?=($estado == "ES")?'selected':''?>>Espírito Santo</option>
                                    <option value="GO" <?=($estado == "GO")?'selected':''?>>Goiás</option>
                                    <option value="MA" <?=($estado == "MA")?'selected':''?>>Maranhão</option>
                                    <option value="MT" <?=($estado == "MT")?'selected':''?>>Mato Grosso</option>
                                    <option value="MS" <?=($estado == "MS")?'selected':''?>>Mato Grosso do Sul</option>
                                    <option value="MG" <?=($estado == "MG")?'selected':''?>>Minas Gerais</option>
                                    <option value="PA" <?=($estado == "PA")?'selected':''?>>Pará</option>
                                    <option value="PB" <?=($estado == "PB")?'selected':''?>>Paraíba</option>
                                    <option value="PR" <?=($estado == "PR")?'selected':''?>>Paraná</option>
                                    <option value="PE" <?=($estado == "PE")?'selected':''?>>Pernambuco</option>
                                    <option value="PI" <?=($estado == "PI")?'selected':''?>>Piauí</option>
                                    <option value="RJ" <?=($estado == "RJ")?'selected':''?>>Rio de Janeiro</option>
                                    <option value="RN" <?=($estado == "RN")?'selected':''?>>Rio Grande do Norte</option>
                                    <option value="RS" <?=($estado == "RS")?'selected':''?>>Rio Grande do Sul</option>
                                    <option value="RO" <?=($estado == "RO")?'selected':''?>>Rondônia</option>
                                    <option value="RR" <?=($estado == "RR")?'selected':''?>>Roraima</option>
                                    <option value="SC" <?=($estado == "SC")?'selected':''?>>Santa Catarina</option>
                                    <option value="SP" <?=($estado == "SP")?'selected':''?>>São Paulo</option>
                                    <option value="SE" <?=($estado == "SE")?'selected':''?>>Sergipe</option>
                                    <option value="TO" <?=($estado == "TO")?'selected':''?>>Tocantins</option>
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
                        <div class="col-md-5 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Perfil:</label><?php $perfil = $usuario['id_perfil_usuario']; ?>
                                <select name="id_perfil_usuario" class="form-control" value="<?php echo $usuario['id_perfil_usuario']; ?>">
                                    <option value="1" <?=($perfil == "1")?'selected':''?>>Administrador</option>
                                    <option value="2" <?=($perfil == "2")?'selected':''?>>Funcionario</option>
                                    <option value="3" <?=($perfil == "3")?'selected':''?>>Cliente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <label>Status:</label><?php $status = $usuario['status']; ?>
                            <select name="status" class="form-control" value="<?php echo $usuario['status']; ?>">
                                <option value="H" <?=($status == "H")?'selected':''?>>Habilitado</option>
                                <option value="D" <?=($status == "D")?'selected':''?>>Desabilitado</option>
                            </select>
                        </div>
                        <div class="col-md-5 botao col-md-offset-1">
                            <label></label>
                            <input type="submit" name="alterar" class="btn btn-success btn-block" value="Alterar"/>
                        </div>
                        <div class="col-md-5 botao">
                            <label></label>
                            <a href="usuarios.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
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
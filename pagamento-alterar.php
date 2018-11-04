<?php 
require_once('inc/conexao.php');
include('dashboard.php');
$idPagamento = $_GET["id_forma_pagamento"];

$pdo=Database::conexao();
$stmt = $pdo->prepare('SELECT * FROM tb_forma_pagamento WHERE id_forma_pagamento = :id_forma_pagamento');
$stmt->bindParam(':id_forma_pagamento', $idPagamento);   
$stmt->execute();
$pagamento = $stmt->fetch(PDO::FETCH_ASSOC);

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
            font-size: 20px;
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
        <div class="row">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Alterar Forma de Pagamento</h1>
                <hr>

                <form method="POST" action="inc/alterar-pagamento.php?id_forma_pagamento=<?php echo $idPagamento?>">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Descrição:</label>
                                <input type="text" name="descricao" class="form-control" value="<?php echo $pagamento['descricao']; ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label>Status:</label><?php $status = $pagamento['status']; ?>
                            <select name="status" class="form-control" value="<?php echo $pagamento['status']; ?>">
                                <option value="H" <?=($status == "H")?'selected':''?>>Habilitado</option>
                                <option value="D" <?=($status == "D")?'selected':''?>>Desabilitado</option>
                            </select>
                        </div>
                        <div class="col-md-2 botao">
                            <label></label>
                            <input type="submit" name="alterar" class="btn btn-success btn-block" value="Alterar"/>
                        </div>
                        <div class="col-md-2 botao">
                            <label></label>
                            <a href="forma-pagamento.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
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
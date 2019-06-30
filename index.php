<?php 
    include "openDB.php";

    $query = $conexao->query('select titulo, tipo, valor from gastos');
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    $vl_total = 0;
    foreach ($resultado as $total) {
        if ($total['tipo'] == "D"){
            $vl_total = $vl_total - $total['valor'];
        } else {
            $vl_total = $vl_total + $total['valor'];
        }
    }    
    if ($vl_total > 0){
        $icone = "feliz";
    } else {
        $icone = "triste";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gastos</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" media="screen" href="css/style.css" />
</head>
<body>
    <section>   
        <table class="despesas">
            <tr class="totais">
                <td><h3>Total</h3></td>
                <td><span>&nbsp;</span></td>
                <td><span>&nbsp;</span></td>
                <td align="right"><img src="../img/<?= $icone; ?>.png" width="40px" height="50px"></td>
                <td align="right"><h3>R$ <?= number_format($vl_total,2,',','.'); ?></h3>
            </tr>
            <?php 
            $corlinha = 0;
            foreach ($resultado as $total) {                
                if($total['tipo'] == "D"){
                    $fundo = "vermelho";
                } else {
                    $fundo = "azul";
                }
            ?>
            <tr>
                <td><h5><?= $total['titulo'];?></h5></td>
                <td><span>&nbsp;</span></td>
                <td><span>&nbsp;</span></td>
                <td><span>&nbsp;</span></td>
                <td align="right" class="<?= $fundo; ?>"><h5><?= number_format($total['valor'],2,',','.'); ?></h5></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </section> 
    <div class="botoes">
        <br><a href="#"><img src="../img/botao-somar.png" alt="somar" data-toggle="modal" data-target="#exampleModal"></a>
    </div>   

<div>

    <!-- Modal -->
    <form id="gastosform" action="salvarTransacao.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lançamentos (despesas/receitas)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">   
                        <label for="nome">Título</label><br>
                        <input type="text" name="titulo" id="titulo" placeholder="Título do lançamento" maxlength="100" size="40">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo de lançamento</label>
                        <select name="tipo" class="form-control" id="tipo">
                            <option selected disabled>Selecione</option>
                            <option value="D">Despesa</option>
                            <option value="R">Receita</option>                
                        </select>
                    </div>
                    <div class="form-group">  
                        <label for="valor">Valor</label><br>                           
                        <input type="number" name="valor" id="valor" placeholder="Valor do lançamento" maxlength="100" size="40">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">                
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
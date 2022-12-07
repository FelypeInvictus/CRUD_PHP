<?php require '../header.php'; ?>
<?php require '../config/conexao.php'; ?>

<div class="container mb-5">
    <h1>Listagem de Produtos</h1>
    <hr />

    <?php $produtos = $conexao->query("select * from produtos");?>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Preço Custo</th>
                <th>Preço Venda</th>
                <th>Quantida em estoque</th>
                <th><i class="fa fa-cogs"></i></th>
            </tr>
        </thead>
        <tbody>
              
             <?php foreach ($produtos->fetchAll(PDO::FETCH_OBJ) as $produto){?>

                <tr>
                    <td><?= $produto->id?></td>
                    <td><?= $produto->descricao?></td>
                    <td><?= $produto->preco_custo?></td>
                    <td><?= $produto->preco_venda?></td>
                    <td><?= $produto->qtde_estoque?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="/produtos/atualizar.php?id=<?=$produto->id?>"><i class="far fa-edit fa-fw"></i> Editar</a>
                        <a class="btn btn-danger btn-sm" href="/produtos/excluir.php?id=<?=$produto->id?>"><i class="fa fa-trash fa-fw"></i> Excluir</a>
                    </td>
                </tr>

             <?php }?>
        </tbody>
    </table>
</div>


<?php require '../footer.php'?>
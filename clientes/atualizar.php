<?php require '../header.php'?>

<?php 
  
  require '../config/conexao.php'; 

     if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        $descricao = strtoupper($_REQUEST['produto_descricao']);
        $preco_custo = $_REQUEST['produto_preco_custo'];
        $preco_venda = $_REQUEST['produto_preco_venda'];
        $qtde_estoque = $_REQUEST['produto_qtde_estoque'];
        $produto_codigo = $_REQUEST['produto_codigo'];

        $sql =  " update produtos ";
        $sql .= " set descricao=?, preco_custo=?, preco_venda=?, qtde_estoque=? ";
        $sql .= " where id = ? ";

        $stm = $conexao->prepare($sql);

        $stm->bindValue(1,    $descricao );
        $stm->bindValue(2,  $preco_custo );
        $stm->bindValue(3,  $preco_venda );
        $stm->bindValue(4, $qtde_estoque);
        $stm->bindValue(5, $produto_codigo);

        if ( $stm->execute() ){
            echo "registro salvo com sucesso";
        } else {
            echo "Erro ao tentar salvar o registro o produto";

        }

        header("Location: /produtos/listar.php");
  }

  $sql = "select * from produtos where id = ?";

  $stm = $conexao->prepare($sql);
  $stm->bindParam(1, $_REQUEST['id']);

  $stm->execute();

  $produto = $stm->fetch(PDO::FETCH_OBJ);

  //die(var_dump($produto));

?>


<div class="container mb-5">
    <h1>Inserir novo Produto</h1>
    <hr />

    <div class="card">
        <form method="POST" action="/produtos/atualizar.php">
        <div class="card-header">
            <div class="card-title">
                Cadastro de Produtos
                <span class="fa fa-spinner fa-2x fa-fw" id="progresso" style="display: none"></span>
            </div>
        </div>
        <div class="card-body">
            <h2>Vamos cadastrar alguns produtos.</h2>
            <p>O código do produto será gerado automaticamente, então o campo não será editável.</p>
           <div class="form-group col-md-2">
              <label for="produto_codigo">Código do Produto</label>
              <input type="text" class="form-control" id="produto_codigo" name="produto_codigo" value="<?=$_REQUEST['id']?>" readonly="readonly" >
           </div>
           
           <div class="row">
                <div class="form-group col-md-8">
                    <label for="produto_descricao" >Descrição</label>
                    <input type="text" class="form-control" id="produto_descricao" name="produto_descricao"  value="<?=$produto->descricao ?>" />
                </div>
                <div class="form-group col-md-2">
                    <label for="produto_preco_custo">Preço de custo</label>
                    <input type="text" class="form-control" id="produto_preco_custo" name="produto_preco_custo"  value="<?=$produto->preco_custo?>" />
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="produto_preco_venda">Preço de venda</label>
                    <input type="text" class="form-control" id="produto_preco_venda" name="produto_preco_venda"  value="<?=$produto->preco_venda?>" />
                </div>
                <div class="form-group col-md-2">
                    <label for="produto_qtde_estoque">Quantidade em estoque</label>
                    <input type="text" class="form-control" id="produto_qtde_estoque" name="produto_qtde_estoque"  value="<?=$produto->qtde_estoque?>" />
                </div>
            </div>
        </div>

        <div class="card-footer">
               <div class="btn-group gap-1">
                    <button type="button" class="btn btn-danger ">Voltar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
               </div>
        </div>

    </form>
</div>

    
    
 
<?php require '../footer.php'?>
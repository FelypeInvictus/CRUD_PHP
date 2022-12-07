<?php require '../header.php'?>
<div class="container mb-5">
    <h1>Inserir novo Cliente</h1>
    <hr />

    <div class="card">
        <form method="POST" action="/clientes/inserir.php">
        <div class="card-header">
            <div class="card-title">
                Cadastro de Clientes
                <span class="fa fa-spinner fa-2x fa-fw" id="progresso" style="display: none"></span>
            </div>
        </div>
        <div class="card-body">
            <h2>Vamos cadastrar alguns clientes.</h2>
            <p>O código do cliente será gerado automaticamente, então o campo não será editável.</p>
           <div class="form-group col-md-2">
              <label for="cliente_codigo">Código do Cliente</label>
              <input type="text" class="form-control" id="cliente_codigo" name="cliente_codigo" value="0" readonly="readonly" >
           </div>
           
           <div class="row">
                <div class="form-group col-md-2">
                    <label for="cliente_nome" >Nome</label>
                    <input type="text" class="form-control" id="cliente_nome" name="cliente_nome" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="cliente_email">Email</label>
                    <input type="email" step=".1" class="form-control" id="cliente_email" name="cliente_email">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cliente_celular">Celular</label>
                    <input type="tel"  step=".1" class="form-control" id="cliente_celular" name="cliente_celular">
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

    
    <?php 
     
     require '../config/conexao.php';

     if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $descricao = $_REQUEST['cliente_nome'];
        $preco_custo = $_REQUEST['cliente_email'];
        $preco_venda = $_REQUEST['cliente_celular'];
        $qtde_estoque = $_REQUEST['produto_qtde_estoque'];

        $sql =  " insert into clientes ( descricao, preco_custo, preco_venda,qtde_estoque) ";
        $sql .= " values( ?, ?, ?, ?)";

        $stm = $conexao->prepare($sql);

        $stm->bindValue(1,    strtoupper($descricao) );
        $stm->bindValue(2,  $preco_custo );
        $stm->bindValue(3,  $preco_venda );
        $stm->bindValue(4, $qtde_estoque);

        if ( $stm->execute() ){
            echo "registro salvo com sucesso";
        } else {
            echo "Erro ao tentar salvar o registro o cliente";

        }

        header("Location: /index.php");
     }
    ?>
</div>
<?php require '../footer.php'?>
<?php require __DIR__ . '/header.php'?>

<div class="container">
    <h1>CRUD Básico em PHP</h1>

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Cadatro de Produtos
                <span class="fa fa-spinner fa-2x fa-fw" id="progresso" style="display: none"></span>
            </div>
        </div>
        <div class="card-body">
            <h2>Menu Principal</h2>
            <p>Escolha a operação.</p>
           
            <div class="list-group">
                
                <a class="list-group-item btn btn-primary btn-block text-start" href="produtos/listar.php"><i class="fa fa-table fa-fw"></i>Listar</a>
                
                <a class="list-group-item btn btn-primary btn-block text-start" href="produtos/inserir.php"><i class="fa fa-plus-circle fa-fw"></i>Inserir</a>
            
                <a class="list-group-item btn btn-primary btn-block text-start" href="sobre.php"><i class="fa fa-question fa-fw"></i>Sobre</a>
            
            </div>
            
        </div>  
    </div>
</div>

<br>

<div class="card">
        <div class="card-header">
            <div class="card-title">
                Cadatro de Clientes
                <span class="fa fa-spinner fa-2x fa-fw" id="progresso" style="display: none"></span>
            </div>
        </div>
        <div class="card-body">
            <h2>Menu Principal</h2>
            <p>Escolha a operação.</p>
           
            <div class="list-group">
                
                <a class="list-group-item btn btn-primary btn-block text-start" href="clientes/listar.php"><i class="fa fa-table fa-fw"></i>Listar</a>
                
                <a class="list-group-item btn btn-primary btn-block text-start" href="clientes/inserir.php"><i class="fa fa-plus-circle fa-fw"></i>Inserir</a>
            
                <a class="list-group-item btn btn-primary btn-block text-start" href="sobre.php"><i class="fa fa-question fa-fw"></i>Sobre</a>
            
            </div>
            
        </div>  
    </div>
</div>

<?php require __DIR__ . '/footer.php'?>
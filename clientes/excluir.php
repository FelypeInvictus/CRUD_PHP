<?php require '../header.php'?>
<?php require '../config/conexao.php'; ?>

<div class="container mb-5">
    <h1>Excluir Produto</h1>
    <hr />

    <?php 
       if ( isset($_REQUEST['id'] ) && $_REQUEST['id'] > 0 ) {
           $sql = 'delete from produtos where id = ?';


           $stm = $conexao->prepare($sql);
           $stm->bindParam(1, $_REQUEST['id']);

           if(  $stm->execute() ){
              echo "registro excluído com sucesso.";
           } else {
              echo "erro ao tentar excluir o registo não conseguimos.";
           }

           header('Location: /produtos/listar.php');
       }
    ?>
</div>

<?php require '../footer.php'?>
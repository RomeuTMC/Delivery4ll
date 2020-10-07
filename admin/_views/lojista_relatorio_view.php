<?php if(!isset($TRUE) or ($TRUE<>"index.php")) die("LOCKED"); 
$dados=$_SESSION['dados']; 
?>
<div class="d-flex flex-row">
  <div class="col mx-auto">
    <div class="table-responsive">
      <h1>Relatório Geral Lojista</h1>
        <h2><?php echo($dados['nId'].':'.$dados['cNome'].' - '.$dados['cEmail']);?>
        <hr>
        <h2>LOJAS:</h2>
        
    </div>
  </div>
</div>

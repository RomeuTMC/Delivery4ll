<?php if(!isset($TRUE) or ($TRUE<>'index.php')) die('LOCKED'); 
logado();
$dados=$_SESSION['dados'];
?>
<!-- cabeçario/add -->
<link href="<?php echo URL;?>css/administrador.css" rel="stylesheet">
<div class="row m-0">
  <div class="w-100">
    <hr>
  </div>
  <h1 id="title" class="text-uppercase font-weight-bold m-0">Cadastro de Lojistas (login)</h1>
  <a href="<?php echo(ADMIN."lojista/novo"); ?>" class="btn btn-primary ml-auto m-1">Novo Cadastro</a>
  <div class="w-100">
    <hr>
  </div>
</div>

<!-- LISTAGEM -->
<div class="row">
  <div class="col">
    <div class="table-responsive">
      <table class="table table-hover" id="LogistaList">
        <thead>
          <tr class="table-primary">
            <th style="width:5%;">#ID</th>
            <th style="width:65%;">Nome Completo</th>
            <th style="width:5%;">E-Mail</th>
            <th style="width:5%;">ATIVO?</th>
            <th style="width:35%;">OPÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($dados['listagem'] as $l) { // percorrer dados
          ?><tr>
                <td><?php echo ($l['nId']); ?></td>
                <td><?php echo ($l['cNome']); ?></td>
                <td><?php echo ($l['cEmail']); ?></td>
                <td><?php echo ($l['eAtivo']); ?></td>
                <td class="d-flex justify-content-between">
                  <a href="<?php echo(ADMIN."lojista/atualiza/".$l['nId']); ?>" class="btn btn-primary ml-auto m-1">Atualizar</a>
                  <a href="#" style="width: 30%;" class="btn btn-danger ml-auto m-1 delError" onclick="LojistaDel('<?php echo ($l['nId']); ?>','<?php echo ($l['cEmail']); ?>','<?php echo ($l['cNome']); ?>');">Excluir</a>
                  <a href="<?php echo(ADMIN."lojista/ativa/".$l['nId']); ?>" style="width: 30%;" type="button" class="btn btn-success ml-auto m-1 delError"><?php if($l['eAtivo']=='S'){ echo "Desativar"; } else { echo "Ativar"; } ?></a>
                  <a href="<?php echo(ADMIN."lojista/relatorio/".$l['nId']); ?>" class="btn btn-info ml-auto m-1">Informações</a>
                </td>
              </tr>
          <?php
            } // ENDWHILE
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script language="javascript">
  $(document).ready(function() {
    $('#LogistaList').DataTable({
      language: {
        url: '<?php echo(URL.'/js/DT-pt-br.json'); ?>'
      },
      "paging":   true,
      "info":     true,
      "columns": [null, null, null, null, {
        "orderable": true,
        "searchable": true,
      }]
    })
  });


function LojistaDel(id, email, msg) {
    Swal.fire({
        title: "Confirmar Exclusão?",
        html: "<b>ID:" + id + " - " + msg + "</b><br><br>Será excluido o LOGISTA caso não tenha LOJA CADASTRADA. Confirma?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Confirmar!'
      })
      .then((result) => {
        if (result.value) {
          spinner.show();
          window.location.href = "<?php echo(ADMIN."lojista/exclui/"); ?>" + id + "/" + email;
        } else {
          console.log("cancela ID:" + id);
        }
      });
}
</script>
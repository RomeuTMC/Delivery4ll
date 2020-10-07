<?php if(!isset($TRUE) or ($TRUE<>"index.php")) die("LOCKED"); 
$dados=$_SESSION['dados']; ?>
<div class="d-flex flex-row">
  <div class="col mx-auto">
    <div class="table-responsive">
      <form method="POST" action="<?php echo(ADMIN."lojista/save/".$dados['nId']);?>" id="id_form_lojistas" name="form_lojistas">
      <fieldset class="frm_field">
        <legend><?php echo($dados['titulo']); ?></legend>
                <input type="hidden" id="id_nId" name="nId" value="<?php echo($dados['nId']);?>">
              <div class="form-group p-2">
                <label for="message-text" class="col-form-label">Nome do Lojista</label>
                <input type="text" class="form-control" id="id_cNome" name="cNome" value="<?php echo($dados['cNome']);?>" maxlength=200>
              </div>
              <div class="form-group p-2">
                <label for="message-text" class="col-form-label">E-Mail (login)</label>
                <input type="email" class="form-control" id="id_cEmail" name="cEmail" value="<?php echo($dados['cEmail']);?>" maxlength=200>
              </div>
              <div class="form-group p-2">
                <label for="message-text" class="col-form-label">Senha de Acesso</label>
                <input type="text" class="form-control" id="id_sSenha" name="sSenha" value="<?php echo($dados['sSenha']);?>" maxlength=300>
              </div>
              <div class="form-group p-2">
                <label for="message-text" class="col-form-label">Ativo no Sistema</label>SET
                <select class="form-control" id="id_eAtivo" name="eAtivo">
                <?php
                foreach($dados['eAtivo_opc'] as $k=>$v){
                    if($dados['eAtivo']==$k){
                        ?>
                        <option value="<?php echo($k);?>" selected><?php echo($v);?></option>
                        <?
                    } else {
                        ?>
                        <option value="<?php echo($k);?>"><?php echo($v);?></option>
                        <?    
                    }
                }
                ?>
                </select>
              </div>
        <div class="form-group">
        <button class="btn btn-secondary" onclick="ClickCancel()" >Cancelar</Button>
        <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
      </fieldset>
      </form>
    </div>
  </div>
</div>
<script languege="javascript">
function ClickCancel(){
  Swal.fire({
        title: "Confirmar Cancelamento?",
        html: "Ao confirmar, <b>TODAS</b> as alterações desta tela serão perdidas. Confirma?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Confirmar!"
      })
      .then((result) => {
        if (result.value) {
          spinner.show();
          window.location.href = "<?php echo(ADMIN."/lojista"); ?>"
        }
      });
}

$("#id_form_lojistas").validate({
  submitHandler: function(form) {
    // do other things for a valid form
    spinner.show();
    id_form_lojistas.submit();    
  },
    rules: {
      cNome: {
        required: true,
        minlength: 6,
        maxlength: 200
      },
      cEmail: {
        required: true,
        minlength: 6,
        maxlength: 200
      },
      sSenha: {
        required: true,
        minlength: 6,
        maxlength: 15
      }
    },
    messages: {
      cNome: {
        required: "Campo Obrigatório",
        minlength: "Tamanho mínimo 6 Caracteres",
        maxlength: "Tamanho Máximo 150 Caracteres"
    },
    cEmail: {
        required: "Campo Obrigatório",
        minlength: "Tamanho mínimo 6 Caracteres",
        maxlength: "Tamanho Máximo 150 Caracteres"
    },
    sSenha: {
        required: "Campo Obrigatório",
        minlength: "Tamanho mínimo 6 Caracteres",
        maxlength: "Tamanho Máximo 15 Caracteres"
    }
  }
});

</script>
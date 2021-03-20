<?php if(!isset($TRUE) or ($TRUE<>'index.php')) die('LOCKED');
logado();
$_SESSION['dados']=$_POST;
if(!isset($_SESSION['route'][1]) or $_SESSION['route'][1]=='list'){
    $_SESSION['dados']=loja_list();
} elseif($_SESSION['route'][1]=='novo'){
    $_SESSION['dados']=loja_novo();
}else {
    // VIEW PADRÃO ou MOSTRA QUE NÃO EXISTE se for DEV
    if(AMBIENTE == 'DEVELOPER') {
        print_r($_SESSION['route']);
    } else {
        $_SESSION['dados']=loja_list();
    }
}

function loja_list(){
    global $db;
    $_SESSION['view']='list';
    $sql="SELECT count(nId) as Total FROM lojas";
    $r=SqlQuery($sql);
    $l=$r->fetch(PDO::FETCH_ASSOC); 
    if($l['Total']==0){
        $_SESSION['erro_no']='3';
        $_SESSION['erro']='Nenhuma Loja Cadastrado, Faça Cadastro';
        $_SESSION['view']='form';
        return loja_novo();
    }
    $data['total']=$l['Total'];
    $sql="SELECT nId, cNome, cEmail, eAtivo FROM lojas ORDER BY nId";
    $r=SqlQuery($sql);
    $data['registros']=$r->RowCount();
    while($l = $r->fetch(PDO::FETCH_ASSOC)) {
        $data['listagem'][$l['nId']]=$l;
    }
    return $data;
}
<?php if(!isset($TRUE) or ($TRUE<>'index.php')) die('LOCKED'); 
logado();
$_SESSION['dados']=$_POST;
if(!isset($_SESSION['route'][1]) or $_SESSION['route'][1]=='list'){
    $_SESSION['dados']=lojista_list();
} elseif($_SESSION['route'][1]=='novo'){
    $_SESSION['dados']=lojista_novo();
} elseif($_SESSION['route'][1]=='save'){
    $_SESSION['dados']=lojista_save();
} elseif($_SESSION['route'][1]=='atualiza'){
    $_SESSION['dados']=lojista_atualiza();
} elseif($_SESSION['route'][1]=='ativa'){
    $_SESSION['dados']=lojista_ativa();
} elseif($_SESSION['route'][1]=='exclui'){
    $_SESSION['dados']=lojista_exclui();
} elseif($_SESSION['route'][1]=='relatorio'){
    $_SESSION['dados']=lojista_relatorio();
}else {
    // VIEW PADRÃO ou MOSTRA QUE NÃO EXISTE se for DEV
    if(AMBIENTE == 'DEVELOPER') {
        print_r($_SESSION['route']);
      } else {
        $_SESSION['dados']=administrador_list();
      }
}

function lojista_list(){
    $_SESSION['view']='list';
    $sql="SELECT count(nId) as Total FROM lojistas";
    $r=SqlQuery($sql);
    $l=$r->fetch(PDO::FETCH_ASSOC); 
    if($l['Total']==0){
        $_SESSION['erro_no']='3';
        $_SESSION['erro']='Nenhum Lojista Cadastrado, Faça Cadastro';
        $_SESSION['view']='form';
        return lojista_novo();
    }
    $data['total']=$l['Total'];
    $sql="SELECT nId, cNome, cEmail, eAtivo FROM lojistas ORDER BY nId";
    $r=SqlQuery($sql);
    $data['registros']=$r->RowCount();
    while($l = $r->fetch(PDO::FETCH_ASSOC)) {
        $data['listagem'][$l['nId']]=$l;
    }
    return $data;
}    

function lojista_novo(){
    global $db;
    $_SESSION['view']='form';
    $msg['titulo']='Incluir Novo Lojista';
    $msg['nId']=0;
    $msg['cNome']='';
    $msg['cEmail']='';
    $msg['sSenha']='';
    $r=SqlQuery("SELECT nId, cDescricao, eValor from ativos order by cDescricao");
    while($l = $r->fetch(PDO::FETCH_ASSOC)){
        $opc[$l['eValor']]=$l['cDescricao'];
    }
    $msg['eAtivo_opc']=$opc;
    $msg['eAtivo']='S';
    return $msg;
}

function lojista_save(){
    global $db;
    $_SESSION['view']='list';
    $_SESSION['dados']['titulo']='Logista Erro - Verifique Dados';
    $pr[':id']=filter_input(INPUT_POST, 'nId', FILTER_SANITIZE_NUMBER_INT);
    $pr[':nome']=filter_input(INPUT_POST, 'cNome', FILTER_SANITIZE_STRING);
    $pr[':login']=filter_input(INPUT_POST, 'cEmail', FILTER_SANITIZE_EMAIL);
    $pr[':senha']=filter_input(INPUT_POST, 'sSenha', FILTER_SANITIZE_STRING);
    $pr[':ativo']=filter_input(INPUT_POST, 'eAtivo', FILTER_SANITIZE_STRING);
    if($pr[':ativo']==null){
        $pr[':ativo']='S';
    }
    if($_SESSION['route'][2]=='0'){
        //se 0 é INCLUI
        $r=SqlQuery("select nId from lojistas where cNome='".$pr[':nome']."'");
        if($r->rowCount()>0){
            //se JÁ EXISTE wNome
            $_SESSION['erro_no']=2;
            $_SESSION['erro']='<h3>NÃO SALVO</h3>Já existe um usuário com este nome cadastrado, selecione outro e tente novamente';
            return lojista_list();
        } else {
            $r=SqlQuery("select nId from lojistas where cEmail='".$pr[':login']."'");
            if($r->rowCount()>0){
                //se JA EXISTE E-MAIL
                $_SESSION['erro_no']=2;
                $_SESSION['erro']='<h3>NÃO SALVO</h3>Já existe um usuário com este E-Mail cadastrado, selecione outro e tente novamente';
                return $_SESSION['dados'];    
            } else {
                //SE ESTA TUDO OK, SALVA NO BANCO
                unset($pr[':id']);
                $sql="INSERT INTO lojistas (nId, cNome, cEmail, sSenha, eAtivo) VALUES ('',:nome,:login,sha1(:senha),:ativo)";
                $r=SqlQuery($sql,$pr);
                $_SESSION['view']='list';
                $_SESSION['erro_no']=1;
                $_SESSION['erro']='<h3>SALVO COM SUCESSO</h3>Usuário criado com o ID:'.$db->lastInsertId();
                return lojista_list();
            }
        }
    } else {
         // é UPDATE ID=$route[2]
         //captura dados pelo ID
         $pr[':id']=filter_var($_SESSION['route'][2]);
         $r=SqlQuery("select * from lojistas where nId='".$pr[':id']."' limit 1");  
         if($r->rowCount()==0){
             //SE não tem, abre novo cadastro
             $_SESSION['erro_no']='3';
             $_SESSION['erro']=='Lojista Não Cadastrado, faça novo cadastro!';
             return lojista_list();
         } else {
            $l=$r->fetch(PDO::FETCH_ASSOC);
            if($pr[':login']==$l['cEmail']){
                $sql="update lojistas set cNome='".$pr[':nome']."', sSenha=sha1('".$pr[':senha']."'), eAtivo='".$pr[':ativo']."' where nId='".$pr[':id']."' limit 1";
                $r=SqlQuery($sql);
                $_SESSION['erro_no']=1;
                $_SESSION['erro']='Atualizado Com Sucesso!';
                return lojista_list();
            } else {
                $r=SqlQuery("select nId from lojistas where cEmail='".$pr[':login']."' ");
                if($r->rowCount()>0){
                    //se JA EXISTE E-MAIL
                    $_SESSION['erro_no']=2;
                    $_SESSION['erro']='<h3>NÃO SALVO</h3>Já existe um usuário com este E-Mail cadastrado!';
                    return lojista_list();
                } else {
                    $sql="update lojistas set cNome='".$pr[':nome']."', sSenha=sha1('".$pr[':senha']."'), cEmail='".$pr[':login']."', eAtivo='".$pr[':ativo']."' where nId='".$pr[':id']."' limit 1";
                    $r=SqlQuery($sql);
                    $_SESSION['erro_no']=1;
                    $_SESSION['erro']='Atualizado Com Sucesso!';
                    return lojista_list();
                }
            }
        } 
    }//endif ATUALIZA/NOVO
    return FALSE;    
}

function lojista_atualiza(){
    global $db;
    $_SESSION['view']='form';
    $pr[':id']=filter_var($_SESSION['route'][2]);
    $msg['titulo']='Atualiza Lojista - ID:';
    $r=SqlQuery("select * from lojistas where nId='".$pr[':id']."' limit 1");  
    if($r->rowCount()==0){
        $_SESSION['erro_no']=3;
        $_SESSION['erro']='Lojista Não Cadastrado, faça novo cadastro!';
        $_SESSION['view']='list';
        return lojista_list();
    } else {
        $l=$r->fetch(PDO::FETCH_ASSOC);
        $msg['titulo']='Atualiza Logista - ID:'.$l['nId'];
        $msg['nId']=$l['nId'];
        $msg['cNome']=$l['cNome'];
        $msg['cEmail']=$l['cEmail'];
        $msg['sSenha']='';
        $msg['eAtivo']=$l['eAtivo'];
        $r1=SqlQuery("SELECT nId, cDescricao, eValor from ativos order by cDescricao");
        while($l1 = $r1->fetch(PDO::FETCH_ASSOC)){
            $opc[$l1['eValor']]=$l1['cDescricao'];
        }
        $msg['eAtivo_opc']=$opc;
        return $msg;    
    }
}

function lojista_ativa(){
    global $db;
    $_SESSION['view']='list';
    $pr[':id']=filter_var($_SESSION['route'][2]);
    $r=SqlQuery("select nId, eAtivo from lojistas where nId='".$pr[':id']."' limit 1");  
    if($r->rowCount()==0){
        $_SESSION['erro_no']=3;
        $_SESSION['erro']='Lojista Não Cadastrado, faça novo cadastro!';
        return lojista_list();
    } else {
        $l=$r->fetch(PDO::FETCH_ASSOC);
        if($l['eAtivo']=='S'){
            $a='N';
        } else {
            $a='S';
        }
        $sql="UPDATE lojistas set eAtivo='$a' where nId='".$pr[':id']."' limit 1";
        $r=SqlQuery($sql);
        $_SESSION['erro_no']=1;
        $_SESSION['erro']='Atualizado Com Sucesso!';
        return lojista_list();
    }
}

function lojista_exclui(){
    global $db;
    $_SESSION['view']='list';
    $pr[':id']=filter_var($_SESSION['route'][2]);
    $pr[':email']=filter_var($_SESSION['route'][3]);
    $r=SqlQuery("select nId from lojistas where nId='".$pr[':id']."' and cEmail='".$pr[':email']."' limit 1");  
    if($r->rowCount()==0){
        $_SESSION['erro_no']=3;
        $_SESSION['erro']='Validação de xclusão Não Aceita';
        return lojista_list();
    } else {
        $sql="SELECT nId from lojas where nId_lojista='".$pr[':id']."'";
        $r=SqlQuery($sql);
        if($r->rowCount()<>0){
            $_SESSION['erro_no']='2';
            $_SESSION['erro']='Este lojistas Possui LOJAS Ativas, exclua as lojas ANTES de eliminar o lojista';
            return lojista_list();
        } else {
            $sql="DELETE from lojistas where nId='".$pr[':id']."' limit 1";
            $r=SqlQuery($sql);
            $_SESSION['erro_no']='1';
            $_SESSION['erro']='Lojista Excluído com Sucesso!';
            return lojista_list();
        }
        return lojista_list();
    }    
}

function lojista_relatorio(){
    global $db;
    $_SESSION['view']='relatorio';
    $pr[':id']=filter_var($_SESSION['route'][2]);
    $r=SqlQuery('SELECT nId, cNome, cEmail from lojistas where nId=:id limit 1',$pr);
    $l=$r->fetch(PDO::FETCH_ASSOC);
    $msg['nId']=$l['nId'];
    $msg['cNome']=$l['cNome'];
    $msg['cEmail']=$l['cEmail'];
    return $msg;
}
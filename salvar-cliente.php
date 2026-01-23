<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome=$_POST['nome_cliente'];
        $telefone= $_POST['telefone_cliente'];
        $email= $_POST['email_cliente'];
        $cpf= $_POST['cpf_cliente'];
        $dt_nasc= $_POST['dt_nasc_cliente'];
        $endereco= $_POST['endereco_cliente'];
        
        $sql= "INSERT INTO cliente(nome_cliente, cpf_cliente, email_cliente, telefone_cliente, dt_nasc_cliente, endereco_cliente)
        VALUES('{$nome}', '{$cpf}', '{$email}', '{$telefone}','{$dt_nasc}', '{$endereco}')";
        $res= $conn->query($sql);
        if($res == true){
            print("<script>alert('Cadastro feito com sucesso!');</script>");
            print("<script>location.href='?page=listar-cliente';</script>");
        }
        else{
            print("<script>alert('Falhou ao efetuar cadastro');</script>");
            print("<script>location.href='?page=listar-cliente';</script>");
        }
        break;
    case 'editar':
        $nome=$_POST['nome_cliente'];
        $telefone= $_POST['telefone_cliente'];
        $email= $_POST['email_cliente'];
        $cpf= $_POST['cpf_cliente'];
        $dt_nasc= $_POST['dt_nasc_cliente'];
        $endereco= $_POST['endereco_cliente'];

        $sql= "UPDATE cliente SET nome_cliente='{$nome}',telefone_cliente='{$telefone}', email_cliente='{$email}' ,cpf_cliente='{$cpf}', dt_nasc_cliente='{$dt_nasc}' , endereco_cliente='{$endereco}' 
        WHERE id_cliente=".$_REQUEST['id_cliente'];
        $res= $conn->query($sql);
        if($res == true){
            print("<script>alert('Cliente atualizado com sucesso!');</script>");
            print("<script>location.href='?page=listar-cliente';</script>");
        }
        else{
            print("<script>alert('Erro ao atualizar cliente');</script>");
            print("<script>location.href='?page=listar-cliente';</script>");
        }
        break;
    case 'excluir':

        try {
            $sql = "DELETE FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];
            $res = $conn->query($sql);
            if ($res) {
                print("<script>alert('Cliente excluído com sucesso!');</script>");
                print("<script>location.href='?page=listar-cliente';</script>");
            } else {
                print("<script>alert('Erro ao excluir cliente!');</script>");
                print("<script>location.href='?page=listar-cliente';</script>");
            }
        } catch (mysqli_sql_exception $e) {
            print("<script>alert('Não é possível excluir este cliente, pois ele está associado a vendas.');</script>");
            print("<script>location.href='?page=listar-cliente';</script>");
        }

    break;

    }
?>
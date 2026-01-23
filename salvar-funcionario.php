<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome = $_POST['nome-funcionario'];
            $email = $_POST['email-funcionario'];
            $telefone = $_POST['tel-funcionario'];

            $sql = "INSERT INTO funcionario(nome_funcionario, email_funcionario, telefone_funcionario)
                            VALUES('{$nome}', '{$email}','{$telefone}')";
        $res = $conn->query($sql);
        
        if($res==true){
            print("<script>alert('Cadastro efetuado com sucesso!');</script>");
            print("<script>location.href='?page=listar-funcionario';</script>");
        }else{
            print("<script>alert('Erro ao efetuar cadastro!');</script>");
            print("<script>location.href='?page=listar-funcionario';</script>");
        }
        break;

        case 'editar':
            $nome = $_POST['nome-funcionario'];
            $email = $_POST['email-funcionario'];
            $telefone = $_POST['tel-funcionario'];
            $sql = "UPDATE funcionario SET nome_funcionario = '{$nome}',  email_funcionario = '{$email}', telefone_funcionario ='{$telefone}' WHERE id_funcionario = ".$_REQUEST['id_funcionario'];
            $res = $conn->query($sql);
            if ($res){
                print("<script>alert('Editado com sucesso!');</script>");
                print("<script>location.href='?page=listar-funcionario';</script>");
            }
            else{
                print("<script>alert('Não foi possivel editar, tente novamente!');</script>");
                print("<script>location.href='?page=listar-funcionario';</script>");
            }
            break;
        case 'excluir':
    try {
        $sql = "DELETE FROM funcionario WHERE id_funcionario=".$_REQUEST['id_funcionario'];
        $res = $conn->query($sql);

        if($res){
            print("<script>alert('Excluiu com sucesso!');</script>");
            print("<script>location.href='?page=listar-funcionario';</script>");
        } else {
            print("<script>alert('Erro ao excluir funcionário!');</script>");
            print("<script>location.href='?page=listar-funcionario';</script>");
        }

    } catch (mysqli_sql_exception $e) {
        print("<script>alert('Não é possível excluir este funcionário, pois ele está associado a vendas.');</script>");
        print("<script>location.href='?page=listar-funcionario';</script>");
    }

    break;
    }
?>
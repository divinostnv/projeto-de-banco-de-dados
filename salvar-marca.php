<?php
    switch($_REQUEST['acao']){
        case 'cadastrar':
            $nome= $_REQUEST['nome-marca'];
            $sql= "INSERT INTO marca(nome_marca) VALUE('{$nome}')";
            $res= $conn->query($sql);
        if($res == True){
            print("<script>alert('Cadastro efetuado com sucesso!')</script>");
            print("<script>location.href='?page=listar-marca';</script>");
        }
        else{
            print("<script>alert('Falha ao cadastrar')</script>");
            print("<script>location.href='?page=listar-marca';</script>");
        }
        break;
        case 'editar':
            $nome_marca = $_POST['nome-marca'];
            $sql= "UPDATE marca SET nome_marca='{$nome_marca}' WHERE id_marca=".$_REQUEST['id_marca'];
            $res= $conn->query($sql);
            if($res == True){
                print("<script>alert('Marca atualizada com sucesso!')</script>");
                print("<script>location.href='?page=listar-marca';</script>");
            }
            else{
                print("<script>alert('Marca atualizada com sucesso!')</script>");
                print("<script>location.href='?page=listar-marca';</script>");
            }
            break;
        case 'excluir':
        try {
            $sql = "DELETE FROM marca WHERE id_marca=" . $_REQUEST['id_marca'];
            $res = $conn->query($sql);
            if ($res == true) {
                print("<script>alert('Marca excluída com sucesso!');</script>");
                print("<script>location.href='?page=listar-marca';</script>");
            } else {
                print("<script>alert('Erro ao excluir marca!');</script>");
                print("<script>location.href='?page=listar-marca';</script>");
            }
        } catch (mysqli_sql_exception $e) {
            print("<script>alert('Não é possível excluir esta marca, pois ela está associada a modelos.');</script>");
            print("<script>location.href='?page=listar-marca';</script>");
        }

        break;
    }
?>
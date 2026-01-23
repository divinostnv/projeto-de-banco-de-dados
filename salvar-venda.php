<?php
    switch ($_REQUEST['acao']){
        case 'cadastrar':
        $data = $_POST['data_venda'];
        $valor = $_POST['valor_venda'];
        $cliente = $_POST['cliente_id_cliente'];
        $funcionario = $_POST['funcionario_id_funcionario'];
        $modelo = $_POST['modelo_id_modelo'];
        $sql = "INSERT INTO venda (data_venda, valor_venda, cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo) VALUES ('{$data}', '{$valor}', '{$cliente}', '{$funcionario}', '{$modelo}')";
        $res = $conn->query($sql);
        if($res== true){
            print "<script>alert('Venda cadastrada com sucesso')</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
        else{
            print "<script>alert('Falha ao cadastrar venda')</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }
        break;
        case 'editar':
        $data = $_POST['data_venda'];
        $valor = $_POST['valor_venda'];
        $cliente = $_POST['cliente_id_cliente'];
        $funcionario = $_POST['funcionario_id_funcionario'];
        $modelo = $_POST['modelo_id_modelo'];
        $sql = "UPDATE venda SET data_venda= '{$data}', valor_venda='{$valor}', cliente_id_cliente='{$cliente}', funcionario_id_funcionario='{$funcionario}', modelo_id_modelo='{$modelo}'
        WHERE id_venda=". $_REQUEST['id_venda'];
        $res = $conn->query($sql);
            if($res == true){
                print("<script>alert('Venda editada com sucesso!');</script>");
                print("<script>location.href='?page=listar-venda';</script>");
            }
            else{
                print("<script>alert('Falha ao editar venda!');</script>");
                print("<script>location.href='?page=listar-venda';</script>");
            }
            break;
        case 'excluir':
            $sql="DELETE FROM venda WHERE  id_venda=".$_REQUEST['id_venda'];
            $res= $conn->query($sql);
            if($res == true){
                print("<script>alert('Excluido com sucesso!');</script>");
                print("<script>location.href='?page=listar-venda';</script>");
            }
            else{
                print("<script>alert('Venda excluida com sucesso');</script>");
                print("<script>location.href='?page=listar-venda';</script>");
            }
            break;
    }
?> 
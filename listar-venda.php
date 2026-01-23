<h1>Listar Venda</h1>
<?php
    $sql="SELECT * FROM venda AS mo INNER JOIN cliente AS ma ON mo.cliente_id_cliente = ma.id_cliente
    INNER JOIN funcionario AS fu ON mO.funcionario_id_funcionario= fu.id_funcionario
    INNER JOIN modelo AS md ON mo.modelo_id_modelo = md.id_modelo";
    $res= $conn->query($sql);
    $qtd= $res->num_rows;
    if($qtd > 0){
        print("<p>Encontrou <b>$qtd</b> resultado(s)</p>");
        print("<table class='table table-bordered table-striped table-houve'>");
        print("<tr>");
        print("<th>#</th>");
        print("<th>Valor</th>");
        print("<th>Data</th>");
        print("<th>cliente</th>");
        print("<th>funcionario</th>");
        print("<th>Modelo</th>");
        print("<th>Açoes</th>");
        print("</tr>");
    
        while($row = $res->fetch_object() ){
            print("<tr>");
            print("<td>". $row->id_venda . "</td>");
            print("<td>". $row->data_venda . "</td>");
            print("<td>". $row->valor_venda . "</td>");
            print("<td>". $row->nome_cliente . "</td>");
            print("<td>". $row->nome_funcionario . "</td>");
            print("<td>". $row->nome_modelo . "</td>");
            print("<td>
            <button class='btn btn-success' onclick=\"location.href='?page=editar-venda&id_venda=".$row->id_venda."';\">Editar</button>
            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza de que deseja excluir?')){location.href='?page=salvar-venda&acao=excluir&id_venda=".$row->id_venda."';}\">Excluir</button>
            </td>");
            print("</tr>");
        }
        print("</table>");
        

    }
    else{
        print("<p>Nenhum resultado encontrado.</p>");
    }
?>
<h1>Editar Funcionário</h1>
<?php
    $sql= "SELECT * FROM funcionario where id_funcionario = ". $_REQUEST['id_funcionario'];
    $res= $conn->query($sql);
    $row= $res->fetch_object();
?>
<form action="?page=salvar-funcionario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type ="hidden"  name="id_funcionario" value="<?php print $row->id_funcionario; ?>">
    <div class="mb-3">
        <label for="">Nome
            <input type="text" name="nome-funcionario" class="form-control" value ="<?php print($row->nome_funcionario)?>">
        </label>
    </div>

    <div class="mb-3">
        <label for="">E-mail
            <input type="email" name="email-funcionario" class="form-control" value ="<?php print($row->email_funcionario)?>">
        </label>
    </div>

    <div class="mb-3">
        <label for="">Telefone
            <input type="tel" name="tel-funcionario" class="form-control" value ="<?php print($row->telefone_funcionario)?>">
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
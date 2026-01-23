<h1>Cadastrar Modelo</h1>
<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label> Marca
            <select name="marca_id_marca" class="form-control" required>
                <option value="">-= Escolha =-</option>
                <?php
                    $sql2 = "SELECT * FROM marca";
                    $res2 = $conn->query($sql2);

                    while($marca = $res2->fetch_object()){
                        $selected = ($marca->id_marca == $row->marca_id_marca) ? "selected" : "";

                        echo "<option value='{$marca->id_marca}' $selected>
                                {$marca->nome_marca}
                              </option>";
                    }
                ?>
            </select>
        </label>
    </div>
    <div>
        <label>Nome
            <input type="text" name="nome_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Cor
            <input type="text" name="cor_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
    <label>Ano
        <input type="date" name="ano_modelo" class="form-control">
    </label>
    </div>
    <div>
        <label>Tipo
            <input type="text" name="tipo_modelo" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
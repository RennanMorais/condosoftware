<form action="<?=$base;?>/app/moradores/add_morador" method="POST">

    <h6>Novo Morador</h6>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
            <input type="text" class="form-control" name='name' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">E-mail</div>
            </div>
            <input type="email" class="form-control" name='email' required/>
        </div>      
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">RG</div>
            </div>
            <input type="text" class="form-control" name='rg' id="rg-field" required/>
        </div>    
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">CPF</div>
            </div>
            <input type="text" class="form-control" name='cpf' id="cpf-field" required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Telefone/Celular</div>
            </div>
            <input type="text" class="form-control" name='phone' id="phone-field"/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Tipo</div>
            </div>
            <select name="tipo" class="form-control">
                <option value="">Selecionar...</option>
                <option value="Morador">Morador</option>
                <option value="Proprietário">Proprietário</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Condomínio</div>
            </div>
            <select name="condominio" id="combo-condominio" class="form-control">
                <option value="">Selecionar...</option>
                <?php foreach($condominios as $condominiosItem):?>
                <option value="<?=$condominiosItem->nome;?>"><?=$condominiosItem->nome;?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Prédio</div>
            </div>
            <select name="predio" class="form-control">
                <option value="">Selecionar...</option>
                <?php foreach($predios as $prediosItem):?>
                <option value="<?=$prediosItem->nome;?>"><?=$prediosItem->nome;?></option>
                <?php endforeach;?>
            </select>
        </div>       
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Apartamento</div>
            </div>
            <input type="text" class="form-control" name='apto'/>
        </div>       
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>
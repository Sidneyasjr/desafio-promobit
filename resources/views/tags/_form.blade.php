@csrf
<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
       <x-adminlte-input name="name" type="text" placeholder="Nome" value="{{ old('name', @$tag->name) }}" />
    </div>
    <div>
        <button type="submit" class="btn btn-success toastsDefaultSuccess">Salvar</button>
    </div>
</div>

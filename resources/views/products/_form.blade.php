@csrf
<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
            value="{{ old('name', @$product->name) }}">
    </div>
    <div>
        <button type="submit" class="btn btn-success toastsDefaultSuccess">Salvar</button>
    </div>
</div>

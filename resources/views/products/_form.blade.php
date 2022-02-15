@csrf
<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <x-adminlte-input name="name" type="text" placeholder="Nome" value="{{ old('name', @$product->name) }}" />
    </div>
    <div class="form-group">
        @php
            $selected_tags = $selected_tags ?? [];
        @endphp
        <x-adminlte-select2 id="tags" name="tags[]" label="Tags" multiple>
            @forelse ($tags as $tag)
                <option value="{{$tag->id}}"{{ in_array($tag->id, $selected_tags) ? 'selected' : ''}}> {{$tag->name}}</option>
            @empty
                <option>-</option>
            @endforelse
        </x-adminlte-select2>
    </div>
    <div>
        <button type="submit" class="btn btn-success toastsDefaultSuccess">Salvar</button>
    </div>
</div>
@section('js')
    <script>
        $(document).ready(function() {
            $('#tags').select2({
                'placeholder' : 'Selecione uma ou mais tags',
                'allowClear' : true
            });
        });
    </script>
@stop

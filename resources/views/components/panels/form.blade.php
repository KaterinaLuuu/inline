<form enctype="multipart/form-data" action="{{ route('search') }}" class="row g-3 m-3">
    @csrf
    <div class="col-md-6">
        <h3 for="inputText" class="form-label">Поиск комментариев:</h3>
        <input type="text" name="text" class="form-control" id="text" placeholder="Введите текст">
        @if($errors->first('text') !== null)
            <span class="text-xs italic text-red-600">{{$errors->first('text')}}</span>
        @endif
    </div>
    @if($errors->first('text') !== null)
        <span class="text-xs italic text-red-600">{{$errors->first('text')}}</span>
    @endif
    <div>
        <button type="submit" class="btn btn-info">Найти</button>
    </div>
</form>


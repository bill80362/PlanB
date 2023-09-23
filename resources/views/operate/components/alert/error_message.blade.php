@if ($errors->any())
    <div class="alert text-white bg-danger" role="alert">
        <div class="alert-text">{!! implode('', $errors->all('<div>:message</div>')) !!}</div>
    </div>
@endif

@if(session('success'))
    <div class="alert text-white bg-success" role="alert">
        {!! __(session('success')) !!}
    </div>
@endif

@if(session('error'))
    <div class="alert text-white bg-danger" role="alert">
        {!! __(session('error')) !!}
    </div>
@endif

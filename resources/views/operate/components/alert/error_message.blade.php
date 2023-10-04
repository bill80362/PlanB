@if ($errors->any())
    <div class="alert text-danger bg-danger-light" role="alert">
        <div class="alert-text">{!! implode('', $errors->all('<div>:message</div>')) !!}</div>
    </div>
@endif

@if(session('success'))
    <div class="alert text-success bg-success-light" role="alert">
        {!! __(session('success')) !!}
    </div>
@endif

@if(session('error'))
    <div class="alert text-danger bg-danger-light" role="alert">
        {!! __(session('error')) !!}
    </div>
@endif

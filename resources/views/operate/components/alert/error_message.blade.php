@if ($errors->any())
    <div class="alert text-danger bg-danger-light" role="alert">
        <div class="alert-text">{!! implode('', $errors->all('<div>:message</div>')) !!}</div>
        <button class="alert-closer" type="button"><i class="ionicon-close-outline"></i></button>
    </div>
@endif

@if(session('success'))
    <div class="alert text-success bg-success-light" role="alert">
        <div class="alert-text">{!! __(session('success')) !!}</div>
        <button class="alert-closer" type="button"><i class="ionicon-close-outline"></i></button>
    </div>
@endif

@if(session('error'))
    <div class="alert text-danger bg-danger-light" role="alert">
        <div class="alert-text">{!! __(session('error')) !!}</div>
        <button class="alert-closer" type="button"><i class="ionicon-close-outline"></i></button>
    </div>
@endif

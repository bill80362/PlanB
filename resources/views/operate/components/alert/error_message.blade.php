@if ($errors->any())
    <div class="alert text-white bg-danger" role="alert">
        <div class="alert-text">{!! implode('', $errors->all('<div>:message</div>')) !!}</div>
    </div>
@endif

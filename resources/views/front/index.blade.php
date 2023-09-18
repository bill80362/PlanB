<form action="/login" method="post">
    @csrf
    {{ __('手機') }}: <input type="text" name="Cellphone">
    {{ __('密碼') }}: <input type="password" name="Login_Password">
    <button>submit</button>


    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
</form>

<br><br>
<button onclick="event.preventDefault(); document.getElementById('zt-form').submit();">中文</button>
<button onclick="event.preventDefault(); document.getElementById('en-form').submit();">English</button>


<form id="en-form" style="visibility:none" class="hidden" action="/change-lang?lang=en" method="POST">
    {{ csrf_field() }}
</form>

<form id="zt-form" style="visibility:none" class="hidden" action="/change-lang?lang=zh-tw" method="POST">
    {{ csrf_field() }}
</form>

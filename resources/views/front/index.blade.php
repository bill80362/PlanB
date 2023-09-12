<form action="/login" method="post">
    @csrf
    {{__('common.手機')}}: <input type="text" name="Cellphone">
    {{__('common.密碼')}}: <input type="password" name="Login_Password">
    <button>submit</button>


    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
</form>

<br><br>
{{-- <a href="/change-lang?lang=zh-tw"><button>中文</button></a>
<a href="/change-lang?lang=en"><button>English</button></a> --}}


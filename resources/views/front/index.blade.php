<form action="/login" method="post">
    @csrf
    phone: <input type="text" name="Cellphone">
    password: <input type="password" name="Login_Password">
    <button>submit</button>


    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
</form>

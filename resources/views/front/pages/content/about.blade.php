@extends('front.layout._masterFullSize')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div>
                    <h3>{{__("關於我們")}}</h3>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route("homepage")}}">{{__("前往")}}{{__("首頁")}}</a>
@endsection

@section('Modal')


@endsection

@section('BodyJavascript')
<script>

</script>
@endsection

@extends('operate.layout._Master')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2>
                                    <a class="btn btn-primary mr-2" href="{{route("user_list")}}?{{request()->getQueryString()}}"> < </a>
                                    {{ __('系統設定') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        @include('/operate/components/alert/error_message')
                        <form method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            @foreach($Model->SystemConfig as $groupTitle => $groupContent)
                            <div class="card card-outline mb-2">
                                <div class="card-header">
                                    {{$groupTitle}}
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        @foreach($groupContent as $item)
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                @if($item["input"]=="text")
                                                    <label>{{$item["title"]}}</label>
                                                    <input type="text" class="form-control" name="{{$item["id"]}}" value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                @elseif($item["input"]=="select")
                                                    <label>{{$item["title"]}}</label>
                                                    <select class="form-control" name="{{$item["id"]}}">
                                                        @foreach($item["options"] as $value => $option)
                                                        <option value="{{$value}}" selected>{{$option}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            <div class="row">
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary ">送出</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('BodyJavascript')

@endsection

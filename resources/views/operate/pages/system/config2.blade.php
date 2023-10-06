@extends('operate.layout._Empty')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>@include('/operate/components/title/page_title')</h2>

                                <div class="btn-group ms-2">
                                    <a class="btn btn-light" href="{{route("system_update_html")}}">{{__("取消")}}</a>
                                </div>
                                <div class="btn-group ms-2">
                                    <button type="submit" class="btn btn-primary">{{__("儲存")}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            @include('/operate/components/alert/error_message')

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
                                                            <input type="text" class="form-control"
                                                                   name="{{$item["id"]}}"
                                                                   value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                        @elseif($item["input"]=="select")
                                                            <label>{{$item["title"]}}</label>
                                                            <select class="form-control" name="{{$item["id"]}}">
                                                                @foreach($item["options"] as $value => $option)
                                                                    <option
                                                                        value="{{$value}}" {{$SystemConfigKeyValue[$item["id"]]==$value?"selected":""}}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        @elseif($item["input"]=="img")
                                                            <label>{{$item["title"]}}{{app(App\Services\Operate\UploadFileService::class)->viewUploadImageLimitTips($Model,$item["id"])}}</label>
                                                            <input type="text" class="form-control"
                                                                   name="{{$item["id"]}}"
                                                                   value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                            <div><img
                                                                    src="{{app(App\Services\Operate\UploadFileService::class)->url($SystemConfigKeyValue[$item["id"]])}}"
                                                                    width="200"></div>

                                                            <input type="file" class="form-control"
                                                                   name="{{$item["id"]}}_file">
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    <div class="btn-group ms-2">
                                        <a class="btn btn-light" href="{{route("system_update_html")}}">{{__("取消")}}</a>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button type="submit" class="btn btn-primary">{{__("儲存")}}</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('BodyJavascript')

@endsection

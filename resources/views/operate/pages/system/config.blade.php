@extends('operate.layout._Master')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data">
                    @include('/operate/components/alert/error_message')
                    @csrf
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>@include('/operate/components/title/page_title')</h2>

                                <div class="btn-group ms-2">
                                    <a class="btn btn-light" href="{{route("system_update_html")}}">{{__("取消")}}</a>
                                </div>
                                <div class="btn-group ms-2">
                                    <button class="btn btn-primary">{{__("儲存")}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                @foreach($Model->SystemConfig as $groupTitle => $groupContent)
                                <div class="col-12 col-xl-6 mb-6">
                                    <div class="card mb-3 card-detail border-0">
                                        <div class="card-header border-0">
                                            <h5 class="card-title">{{$groupTitle}}</h5>
                                        </div>
                                        <div class="card-body">
                                            @foreach($groupContent as $item)
                                                @if($item["input"]=="text")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <input type="text" class="form-control " name="{{$item["id"]}}" value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="select")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <select class="form-select " aria-label="Default select example" name="{{$item["id"]}}">
                                                                @foreach($item["options"] as $value => $option)
                                                                    <option value="{{$value}}" {{$SystemConfigKeyValue[$item["id"]]==$value?"selected":""}}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="date")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <div class="input-group mb-3 ">
                                                                <input type="date" class="form-control" name="{{$item["id"]}}" value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="datetime")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <div class="input-group mb-3">
                                                                <input type="datetime-local" class="form-control " step="1" name="{{$item["id"]}}" value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="time")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <div class="input-group mb-3">
                                                                <input type="time" class="form-control " step="1" type name="{{$item["id"]}}" value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="img")
                                                    <div class="row mb-3">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <img src="{{app(App\Services\Operate\UploadFileService::class)->url($SystemConfigKeyValue[$item["id"]])}}" width="200">
                                                            <input class="form-control" type="file" name="{{$item["id"]}}_file">
                                                            {{app(App\Services\Operate\UploadFileService::class)->viewUploadImageLimitTips($Model,$item["id"])}}
                                                            <input type="text" class="form-control" name="{{$item["id"]}}" value="{{$SystemConfigKeyValue[$item["id"]]??""}}">
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="radio")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            @foreach($item["options"] as $value => $option)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="{{$item["id"]}}" id="{{$item["id"].$value}}" value="{{$value}}" {{$SystemConfigKeyValue[$item["id"]]==$value?"checked":""}}>
                                                                    <label class="form-check-label" for="{{$item["id"].$value}}">{{$option}}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="checkbox")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            @foreach($item["options"] as $value => $option)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="{{$item["id"]}}[]" value="{{$value}}" id="{{$item["id"].$value}}" {{collect(explode(",",$SystemConfigKeyValue[$item["id"]]))->contains($value)?"checked":""}}>
                                                                <label class="form-check-label" for="{{$item["id"].$value}}">{{$option}}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="select2")
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <select name="{{$item["id"]}}[]" class="select2bs5 form-select" multiple="multiple" style="width: 100%">
                                                                @foreach($item["options"] as $value => $option)
                                                                <option value="{{$value}}" {{collect(explode(",",$SystemConfigKeyValue[$item["id"]]))->contains($value)?"selected":""}}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @elseif($item["input"]=="textarea")
                                                    <div class="row mb-3">
                                                        <label for="" class="col-12 col-sm-3 col-form-label">{{$item["title"]}}</label>
                                                        <div class="col-12 col-sm-9">
                                                            <textarea class="form-control" rows="10" name="{{$item["id"]}}">{{$SystemConfigKeyValue[$item["id"]]??""}}</textarea>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{----}}
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    <div class="btn-group ms-2">
                                        <a class="btn btn-light" href="{{route("system_update_html")}}">{{__("取消")}}</a>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button class="btn btn-primary">{{__("儲存")}}</button>
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

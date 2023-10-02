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
                                @include('/operate/components/title/page_title')
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        @include('/operate/components/alert/error_message')
                        <form method="post" enctype="multipart/form-data">
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
                                                        <option value="{{$value}}" {{$SystemConfigKeyValue[$item["id"]]==$value?"selected":""}}>{{$option}}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif($item["input"]=="img")
                                                    <label>{{$item["title"]}}{{app(App\Services\Operate\UploadFileService::class)->viewUploadImageLimitTips($Model,$item["id"])}}</label>
                                                    @if($SystemConfigKeyValue[$item["id"]])
                                                        <div><img src="{{asset('storage/'.$SystemConfigKeyValue[$item["id"]])}}" width="200"></div>
                                                        <button type="button" class="btn btn-xs btn-danger"
                                                                onclick="postForm('/operate/delete/image',{
                                                                            'id':'{{$item["id"]}}',
                                                                            _token:'{{ csrf_token() }}'
                                                                            })"
                                                        >{{__("刪除圖片")}}</button>
                                                    @else
                                                        <input type="file" class="form-control" name="{{$item["id"]}}" >
                                                    @endif

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

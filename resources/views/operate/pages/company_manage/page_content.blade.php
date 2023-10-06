@extends('operate.layout._Empty')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <form method="post">
                    @include('/operate/components/alert/error_message')
                    @csrf
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>@include('/operate/components/title/page_title')</h2>

                                <div class="btn-group ms-2">
                                    <a class="btn btn-light" href="{{request()->url()}}">{{__("取消")}}</a>
                                </div>
                                <div class="btn-group ms-2">
                                    <button class="btn btn-primary">{{__("儲存")}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-12">
                                    {{--標籤按鈕--}}
                                    <ul class="nav nav-tabs">
                                        @foreach ($datas as $key => $data)
                                        <li class="nav-item">
                                            <button class="nav-link {{$key==0?"active":""}}" data-bs-toggle="tab" data-bs-target="#tab{{$key}}" type="button">{{ $langTypeText[$data->lang_type] }}</button>
                                        </li>
                                        @endforeach
                                    </ul>
                                    {{--標籤內文--}}
                                    <div class="tab-content">
                                        @foreach ($datas as $key => $data)
                                        <div class="tab-pane fade {{$key==0?"show active":""}}" id="tab{{$key}}" >
                                            <div class="row">
                                                {{--編輯器--}}
                                                <div class="col-12 col-xl-7 mb-6">
                                                    <div class="card mb-3 card-detail border-0">
                                                        <div class="card-header border-0">
                                                            <h5 class="card-title">{{__("內文編輯")}}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            @include('operate.components.editor.ckeditor', [
                                                                     'defaultValue' => $data->content,
                                                                     'id' => "editor_{$data->lang_type}",
                                                                     'name' => 'editors[]',
                                                                     'height' => '400px',
                                                                 ])
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--textarea--}}
                                                <div class="col-12 col-xl-5 mb-6">
                                                    <div class="card mb-3 card-detail border-0">
                                                        <div class="card-header border-0">
                                                            <h5 class="card-title">{{__("SEO")}}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <textarea class="form-control" name="seoArray[]" rows="10">{{$data->seo}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="ids[]" value="{{ $data->id }}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            {{----}}
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    <div class="btn-group ms-2">
                                        <a class="btn btn-light" href="{{request()->url()}}">{{__("取消")}}</a>
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

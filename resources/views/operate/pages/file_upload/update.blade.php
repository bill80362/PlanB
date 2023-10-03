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
                                    <a class="btn btn-primary mr-2"
                                        href="{{ route('file_upload_list') }}?{{ request()->getQueryString() }}">
                                        < </a>
                                    {{ __(app("App\Services\Route\RouteTitle")->getTitle(request()->route()->getName())) }} : {{$DirName}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        @include('/operate/components/alert/error_message')
                        <div class="row mt-2">
                            @foreach($DataList as $Data)
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{$Data->url}}">
                                    <div class="card-body">
                                        <div class="card-title">
                                            {{$Data->file}}
                                        </div>
                                        <p class="card-text">
                                            {{__("檔案大小")}}:{{$Data->size}}
                                        </p>
                                        <p class="card-text">
                                            {{__("修改時間")}}:{{$Data->updated_at}}
                                        </p>

                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="postForm('{{ route('file_upload_del') }}?{{ request()->getQueryString() }}',{
                                                        'id_array[]':'{{$Data->file}}',
                                                        _token:'{{ csrf_token() }}'
                                                        })"
                                        >{{__("刪除圖片")}}</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('BodyJavascript')
    <script>
        function selectGroup(item) {
            $('input[type=\'checkbox\']').prop('checked', '');
            item.permission_grouop_items.forEach(element => {
                $('input[name="' + element.perm_key + '"]').prop('checked', true);
                //
            });
        }
    </script>
@endsection

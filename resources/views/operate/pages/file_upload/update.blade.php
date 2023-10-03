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
                            <div class="col-lg-3 text-center">
                                <div class="card">
                                    <img src="{{$Data->url}}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$Data->file}}</h5>
                                        <button type="button" class="btn btn-xs btn-danger"
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

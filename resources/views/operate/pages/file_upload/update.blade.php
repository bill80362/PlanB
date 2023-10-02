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
                        <div class="row mt-2">
                            @foreach($DataList as $Data)
                            <div class="col-lg-4 text-center">
                                <img src="{{$Data->url}}" width="150" />
                                <span>{{$Data->file}}</span>
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

@extends('operate.layout._Master')

@section('HeaderCSS')
@endsection


@section('Content')
    <!-- main content part here -->
    <section>
        <div class="container-fluid p-0 ">
            <!-- page Content  -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>@include('/operate/components/title/page_title')</h2>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle" data-column="default_serial_number">{{__("default_serial_number")}}</th>
                                                    <th class="sortStyle" data-column="id">{{__("目錄名稱")}}</th>
                                                    <th class="sortStyle" data-column="url">{{__("網址")}}</th>
                                                    <th class="sortStyle" data-column="files_count">{{__("檔案數量")}}</th>
                                                    <th class="sortStyle" data-column="size">{{__("使用空間")}}</th>

                                                    <th class="text-end" data-column="operate">
{{--                                                        <button class="btn btn-link slideFunc-toggle text-muted" onclick="$('#listSetting').toggleClass('in-active')"--}}
{{--                                                            data-target="#listSetting"><i--}}
{{--                                                                class="ti-settings"></i></button>--}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($Paginator->items() as $index => $Item)
                                                <tr class="{{$index%2?"":"bg-muted-light"}}">
                                                    <td class="border-0" data-column="default_serial_number">
                                                        <input type="checkbox" class="form-check-input" name="id_array[]" value="1"> {{$index+1}}
                                                    </td>
                                                    <td class="border-0" data-column="id">{{$Item->id}}</td>
                                                    <td class="border-0" data-column="url">{{$Item->url}}</td>
                                                    <td class="border-0" data-column="files_count">{{count($Item->files)}}</td>
                                                    <td class="border-0" data-column="size">{{$Item->size}}</td>

                                                    <td class="border-0 text-end" data-column="operate">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
{{--                                                                @can('file_upload_update')--}}
                                                                    <li><a class="dropdown-item"
                                                                       href="/operate/file_upload/{{$Item->id}}?{{request()->getQueryString()}}"
                                                                    >{{__("編輯")}}</a></li>
{{--                                                                @endcan--}}
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
{{--                            @include("/operate/include/_PaginatorList")--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- main content part end -->



    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>
@endsection


@section('Modal')

@endsection


@section('BodyJavascript')
    <script>

    </script>
@endsection

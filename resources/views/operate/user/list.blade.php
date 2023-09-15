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
                            <h2>{{ __('後台管理員') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    {{--搜尋START--}}
                    <form>
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>{{$Model->Column_Title_Text["Formal_Flag"]}}</label>--}}
{{--                                    <select name="Filter_Formal_Flag[]" class="select2bs5" multiple="multiple" style="width: 100%;">--}}
{{--                                        @foreach ($Model->Formal_Flag_Text as $key => $value)--}}
{{--                                            <option--}}
{{--                                                value="{{$key}}" {{in_array($key,(array)request()->get("Filter_Formal_Flag"))?"selected":""}} >{{$value}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <label>文字搜尋</label>
                                <div class="form-group">
                                    <div class="input-group input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control" name="filter_text_key">
                                                <option>不限制</option>
                                                <option value="name">姓名</option>
                                                <option value="id">ID</option>
                                                <option value="email">Email</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="filter_text_value">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>排序</label>
                                <select class="form-control" name="order_by">
                                    <option value="id_desc">建立時間(反)</option>
                                    <option value="id_asc">建立時間(正)</option>
                                    <option value="id_desc">ID(反)</option>
                                    <option value="id_asc">ID(正)</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>&nbsp;</label>
                                <div class="form-group">
                                    <button class="btn btn-primary">搜尋</button>
                                    <a class="btn btn-secondary" href="{{request()->url()}}">取消</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--搜尋END--}}

                    {{--表格--}}
                    <div class="table-responsive m-b-30">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>編號</th>
                                <th>名稱</th>
                                <th>Email</th>
                                <th>狀態</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form>
                            @foreach ($Paginator->items() as $Item)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input"
                                               value="{{$Item->id}}">
                                        {{$Item->id}}
                                    </td>
                                    <td>{{$Item->name}}</td>
                                    <td>{{$Item->email}}</td>
                                    <td>{{$Item->email}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           href="/operate/user/{{$Item->id}}?{{request()->getQueryString()}}"
                                        >編輯</a>
                                        <button class="btn btn-sm btn-danger"
                                                type="button"
                                                onclick="postForm('/operate/user/del?{{request()->getQueryString()}}',{
                                                                            'ID[]':{{$Item->ID}},
                                                                            _token:'{{ csrf_token() }}'
                                                                            })"
                                        >刪除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </form>
                            </tbody>
                        </table>
                    </div>

                    @include("/operate/include/_PaginatorList")
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('BodyJavascript')
    <script>

    </script>
@endsection

@extends('admin.layout._Master')

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
                            <h3>{{ __('admin.member.list_title',["Attribute"=>"我是範本I am"]) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="table-responsive m-b-30">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>排序</th>
                                <th>姓名</th>
                                <th>生日</th>
                                <th>手機</th>
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
                                               value="{{$Item->ID}}">
                                        {{$Item->ID}}
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text"
                                               style="width: 50px;"
                                               name="Order_No[{{$Item->ID}}]"
                                               value="">
                                    </td>
                                    <td>{{$Item->Name}}</td>
                                    <td>{{$Item->Birthday}}</td>
                                    <td>{{$Item->Cellphone}}</td>
                                    <td>{{$Item->Email}}</td>
                                    <td>{{$Item->Formal_Flag_Text[$Item->Formal_Flag]}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           href="/oper/Member_Data/{{$Item->ID}}?{{request()->getQueryString()}}"
                                        >編輯</a>
                                        <button class="btn btn-sm btn-danger"
                                                type="button"
                                                onclick="postForm('/oper/Member_Data/del?{{request()->getQueryString()}}',{
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

                    @include("/admin/include/_PaginatorList")
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

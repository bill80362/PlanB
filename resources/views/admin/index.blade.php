@extends('admin.layout._Master')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">會員管理</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">B計畫</a></li>
                        <li class="breadcrumb-item active">會員管理</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header text-center">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">列表</h3>
{{--                                <a>View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body">
                            Page內文
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection

@section('BodyJavascript')

@endsection

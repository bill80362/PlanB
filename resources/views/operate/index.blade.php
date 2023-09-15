@extends('admin.layout._Master')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">B計畫</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    Dashboard
                </div>

                @can('manage_users')
                    有權限manage_users的帳號才看的到
                @endcan
            </div>

        </div>
    </div>
@endsection

@section('BodyJavascript')
@endsection

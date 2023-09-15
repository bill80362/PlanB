@extends('admin.layout._MasterNoAuth')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="container-fluid p-0">
        <form method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">

                            <div class="col-lg-6">
                                <div class="modal-content cs_modal">
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Oper管理系統</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/operate/login" method="POST">
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="請輸入帳號"
                                                    name="Account">
                                            </div>
                                            <div class="">
                                                <input type="password" class="form-control" placeholder="請輸入密碼"
                                                    name="Password">
                                            </div>
                                            <button type="submit" class="btn_1 full_width text-center">登入</button>
                                        </form>

                                        <div class="mt_30">
                                            @include('operate.components.alert.error_message')
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('BodyJavascript')
@endsection

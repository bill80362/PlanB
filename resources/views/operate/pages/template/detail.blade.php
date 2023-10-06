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
                        <div class="d-flex align-items-center justify-content-between">
                            <h2>商品細節頁 檢修頁</h2>
                            <!-- Example single danger button -->

                            <div class="btn-group ms-2">
                                <button type="button" class="btn btn-light dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="##">
                                        複製新增
                                    </a>
                                    <a class="dropdown-item" href="##">
                                        開啟預覽頁
                                    </a>
                                    <a class="dropdown-item" href="##">
                                        開啟前台網頁
                                    </a>
                                    <a class="dropdown-item" href="##">
                                        刪除
                                    </a>
                                </div>
                            </div>
                            <div class="btn-group ms-2">
                                <a class="btn btn-light" href="##">
                                    取消
                                </a>
                            </div>
                            <div class="btn-group ms-2">
                                <a class="btn btn-primary" href="##">
                                    儲存
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="row">
                            <!-- <div class="col-12 mb-3">
                                <div class="card mb-4 border-muted">
                                    <div class="card-header border-muted">基本表單樣式</div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="formString"
                                                class="col-12 col-sm-3 col-form-label">字串顯示</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext"
                                                    id="formString" value="email@example.com">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">文字輸入</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">密碼輸入</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="password" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">日期選擇</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="date" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">日期時間選擇</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="datetime-local" step="1" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">時間選擇</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="time" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">單選</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadio" value="" id="flexRadio1">
                                                    <label class="form-check-label" for="flexRadio1">
                                                        單選 1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadio" value="" id="flexRadio2">
                                                    <label class="form-check-label" for="flexRadio2">
                                                        單選 2
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadio" value="" id="flexRadio3">
                                                    <label class="form-check-label" for="flexRadio3">
                                                        單選 3
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadio" value="" id="flexRadio4">
                                                    <label class="form-check-label" for="flexRadio4">
                                                        單選 4
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadio" value="" id="flexRadio5">
                                                    <label class="form-check-label" for="flexRadio5">
                                                        單選 5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">單選 (行內)</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        單選 1
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        單選 2
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="FlexRadio" value="" id="FlexRadio3">
                                                    <label class="form-check-label" for="FlexRadio3">
                                                        單選 3
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="FlexRadio" value="" id="FlexRadio4">
                                                    <label class="form-check-label" for="FlexRadio4">
                                                        單選 4
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="FlexRadio" value="" id="FlexRadio5">
                                                    <label class="form-check-label" for="FlexRadio5">
                                                        單選 5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">複選</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheck1">
                                                    <label class="form-check-label" for="flexCheck1">
                                                        複選 1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheck2">
                                                    <label class="form-check-label" for="flexCheck2">
                                                        複選 2
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheck3">
                                                    <label class="form-check-label" for="flexCheck3">
                                                        複選 3
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheck4">
                                                    <label class="form-check-label" for="flexCheck4">
                                                        複選 4
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheck5">
                                                    <label class="form-check-label" for="flexCheck5">
                                                        複選 5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">複選</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="FlexCheck1">
                                                    <label class="form-check-label" for="FlexCheck1">
                                                        複選 1
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="FlexCheck2">
                                                    <label class="form-check-label" for="FlexCheck2">
                                                        複選 2
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="FlexCheck3">
                                                    <label class="form-check-label" for="FlexCheck3">
                                                        複選 3
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="FlexCheck4">
                                                    <label class="form-check-label" for="FlexCheck4">
                                                        複選 4
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="FlexCheck5">
                                                    <label class="form-check-label" for="FlexCheck5">
                                                        複選 5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">下拉式選單</label>
                                            <div class="col-12 col-sm-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>請選擇</option>
                                                    <option value="1">選項一</option>
                                                    <option value="2">選項二</option>
                                                    <option value="3">選項三</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">下拉式選單
                                                (複選)</label>
                                            <div class="col-12 col-sm-9">
                                                <select class="form-select" aria-label="Default select example"
                                                    multiple>
                                                    <option selected>請選擇</option>
                                                    <option value="1">選項一</option>
                                                    <option value="2">選項二</option>
                                                    <option value="3">選項三</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">下拉式選單
                                                (複選)</label>
                                            <div class="col-12 col-sm-9">
                                                <select class="form-select select2bs5"
                                                    aria-label="Default select example" multiple
                                                    style="width: 100%">
                                                    <option selected>請選擇</option>
                                                    <option value="1">選項一</option>
                                                    <option value="2">選項二</option>
                                                    <option value="3">選項三</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">檔案上傳</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="file" class="form-control " id="inputGroupFile01">
                                                <div class="text-hint fz-sm text-muted d-block mt-1">這邊是提示文字
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <ul class="nav nav-tabs lang-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">繁體中文</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">简体中文</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">English</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-xl-7 mb-6">
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">圖片和影片</h5>
                                        <div class="button-group d-flex align-items-center ms-auto">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                                <label class="form-check-label" for="inlineRadio1">全選</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">取消全選</label>
                                            </div>
                                        </div>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-2">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <ul class="prodPic-list theme-main">
                                            @for ($i = 0; $i < 6; $i++)
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="/template/Salessa/img/products/1000_1000_{{str_pad($i + 1, 3, '0', STR_PAD_LEFT)}}.jpg"
                                                     alt="">
                                                <div class="prodPic-hover">
                                                    <div class="func-group">
                                                        <a href="##"><i class="ti-pencil"></i></a>
                                                        <a href="##"><i class="ti-close"></i></a>
                                                    </div>
                                                    <i class="ti-move"></i>
                                                </div>
                                            </li>
                                            @endfor
                                            <li class="prodPic-item">
                                                <div class="prodPic-upload">
                                                    <i class="ti-plus"></i>
                                                </div>
                                                <input class="prodPic-uploadbox" type="file">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">商品基本資料</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品名稱</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品簡稱</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品品牌</label>
                                            <div class="col-12 col-sm-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>請選擇</option>
                                                    <option value="1">選項一</option>
                                                    <option value="2">選項二</option>
                                                    <option value="3">選項三</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品編號</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">年度</label>
                                            <div class="col-12 col-sm-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>請選擇</option>
                                                    <option value="1">選項一</option>
                                                    <option value="2">選項二</option>
                                                    <option value="3">選項三</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品標籤</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">短褲</option>
                                                    <option value="2">人氣熱銷</option>
                                                    <option value="3">下殺5折</option>
                                                    <option value="4">熱銷補貨</option>
                                                    <option value="5">小編推薦</option>
                                                    <option value="6">保暖內搭$490起</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">相關商品</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" class="form-control" id="">
                                                <span class="text-hint fz-sm text-muted d-block mt-1">(多個請以,分隔)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">金額設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">成本價</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">定價名稱</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">定價</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">結帳價名稱</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">結帳價</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control mb-3" type="number">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">結帳價紅字</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">優惠價類型</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        固定價
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        折扣
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">優惠價</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-text">NT$</span>
                                                    <input type="number" class="form-control" placeholder=""
                                                           aria-label="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">優惠折扣</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder=""
                                                           aria-label="">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">優惠價時間</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="優惠價時間起" aria-label="優惠價時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="優惠價時間迄" aria-label="優惠價時間迄">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheck2">
                                                    <label class="form-check-label" for="flexCheck2">
                                                        同上架時間
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">定期定額價格</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">紅利兌換</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">優惠設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">活動主圖</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="file">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">活動主圖時間</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="活動主圖時間起" aria-label="活動主圖時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="活動主圖時間迄" aria-label="活動主圖時間迄">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheck2">
                                                    <label class="form-check-label" for="flexCheck2">
                                                        同上架時間
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">使用優惠方案</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio1">
                                                    <label class="form-check-label" for="flexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio2">
                                                    <label class="form-check-label" for="flexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">商品資訊欄位</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品說明</label>
                                            <div class="col-12 col-sm-9">
                                                <textarea class="form-control" name="" id="" rows="3">此處需套用 CKEditor</textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品資訊</label>
                                            <div class="col-12 col-sm-9">
                                                <textarea class="form-control" name="" id="" rows="3">此處需套用 CKEditor</textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品成分</label>
                                            <div class="col-12 col-sm-9">
                                                <textarea class="form-control" name="" id="" rows="3">此處需套用 CKEditor</textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品簡介</label>
                                            <div class="col-12 col-sm-9">
                                                <textarea class="form-control" name="" id="" rows="3">此處需套用 CKEditor</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 mb-3">
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">顯示狀態</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">編修狀態</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        完成
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        未完成
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">狀態</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        上架
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        下架
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">上架時間</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group">
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="上架時間起" aria-label="上架時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="上架時間迄" aria-label="上架時間迄">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">加入購物車時間</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="加入購物車時間起" aria-label="加入購物車時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" step="1" class="form-control"
                                                           placeholder="加入購物車時間迄" aria-label="加入購物車時間迄">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheck2">
                                                    <label class="form-check-label" for="flexCheck2">
                                                        同上架時間
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">一頁式商品</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">商品類型</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        商品
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        贈品
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">商品組合</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">多入組</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">熱銷狀態</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">品牌熱銷狀態</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        是
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        否
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">商品分類設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">開闔功能</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        全關
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        全開
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio1">
                                                    <label class="form-check-label" for="FlexRadio1">
                                                        全選
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="FlexRadio" value="" id="FlexRadio2">
                                                    <label class="form-check-label" for="FlexRadio2">
                                                        取消全選
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-sm-3 text-end">
                                                <p>分店</p>
                                                <p>分館</p>
                                                <p>分類</p>
                                                <p>細分類</p>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <ol class="collapse-list">
                                                    <li class="collapse-item with-child in-extand">
                                                        <button type="button" class="collapse-btn"><ion-icon name="chevron-forward-outline"></ion-icon></button>
                                                        <div class="form-check" for="">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label" for="">分店名稱一</label>
                                                        </div>
                                                        <ol class="collapse-list">
                                                            <li class="collapse-item with-child in-extand">
                                                                <button type="button"
                                                                        class="collapse-btn"><ion-icon name="chevron-forward-outline"></ion-icon></button>
                                                                <div class="form-check" for="">
                                                                    <input class="form-check-input"
                                                                           type="checkbox">
                                                                    <label class="form-check-label"
                                                                           for="">分館名稱一</label>
                                                                </div>
                                                                <ol class="collapse-list">
                                                                    <li
                                                                        class="collapse-item with-child in-extand">
                                                                        <button type="button"
                                                                                class="collapse-btn"><ion-icon name="chevron-forward-outline"></ion-icon></button>
                                                                        <div class="form-check" for="">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox">
                                                                            <label class="form-check-label"
                                                                                   for="">分類名稱一</label>
                                                                        </div>
                                                                        <ol class="collapse-list">
                                                                            <li class="collapse-item">
                                                                                <div class="form-check" for="">
                                                                                    <input
                                                                                        class="form-check-input"
                                                                                        type="checkbox">
                                                                                    <label
                                                                                        class="form-check-label"
                                                                                        for="">細分類名稱一</label>
                                                                                </div>
                                                                            </li>
                                                                            <li class="collapse-item">
                                                                                <div class="form-check" for="">
                                                                                    <input
                                                                                        class="form-check-input"
                                                                                        type="checkbox">
                                                                                    <label
                                                                                        class="form-check-label"
                                                                                        for="">細分類名稱二</label>
                                                                                </div>
                                                                            </li>
                                                                            <li class="collapse-item">
                                                                                <div class="form-check" for="">
                                                                                    <input
                                                                                        class="form-check-input"
                                                                                        type="checkbox">
                                                                                    <label
                                                                                        class="form-check-label"
                                                                                        for="">細分類名稱三</label>
                                                                                </div>
                                                                            </li>
                                                                        </ol>
                                                                    </li>
                                                                    <li class="collapse-item">
                                                                        <div class="form-check" for="">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox">
                                                                            <label class="form-check-label"
                                                                                   for="">分類名稱二</label>
                                                                        </div>
                                                                    </li>
                                                                    <li class="collapse-item">
                                                                        <div class="form-check" for="">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox">
                                                                            <label class="form-check-label"
                                                                                   for="">分類名稱三</label>
                                                                        </div>
                                                                    </li>
                                                                </ol>
                                                            </li>
                                                            <li class="collapse-item">
                                                                <div class="form-check" for="">
                                                                    <input class="form-check-input"
                                                                           type="checkbox">
                                                                    <label class="form-check-label"
                                                                           for="">分館名稱二</label>
                                                                </div>
                                                            </li>
                                                            <li class="collapse-item">
                                                                <div class="form-check" for="">
                                                                    <input class="form-check-input"
                                                                           type="checkbox">
                                                                    <label class="form-check-label"
                                                                           for="">分館名稱三</label>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="collapse-item">
                                                        <div class="form-check" for="">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label" for="">分店名稱二</label>
                                                        </div>
                                                    </li>
                                                    <li class="collapse-item">
                                                        <div class="form-check" for="">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label" for="">分店名稱三</label>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">篩選器</h5>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">款式</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">短袖</option>
                                                    <option value="2">長袖</option>
                                                    <option value="3">無袖</option>
                                                    <option value="4">五分袖</option>
                                                    <option value="5">短褲</option>
                                                    <option value="6">長褲</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">顏色</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">紅色</option>
                                                    <option value="2">綠色</option>
                                                    <option value="3">藍色</option>
                                                    <option value="4">白色</option>
                                                    <option value="5">黑色</option>
                                                    <option value="6">灰色</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">尺寸</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">XS</option>
                                                    <option value="2">S</option>
                                                    <option value="3">M</option>
                                                    <option value="4">L</option>
                                                    <option value="5">XL</option>
                                                    <option value="6">2L</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">金流設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">可用付款方式</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">ApplePay (20)</option>
                                                    <option value="2">LINE Pay (16)</option>
                                                    <option value="3">超商取貨付款 (7)</option>
                                                    <option value="4">全支付 (24)</option>
                                                    <option value="5">貨到付款 (5)</option>
                                                    <option value="6">信用刷卡 (3)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">物流設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">海外配送設定</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio1">
                                                    <label class="form-check-label" for="flexRadio1">
                                                        可海外配送
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio2">
                                                    <label class="form-check-label" for="flexRadio2">
                                                        不可海外配送
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">可配送國家</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">台灣 (1)</option>
                                                    <option value="2">台灣離島 (19)</option>
                                                    <option value="3">香港 (26)</option>
                                                    <option value="4">澳門 (27)</option>
                                                    <option value="5">新加坡 (28)</option>
                                                    <option value="6">東馬來西亞 (29)</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label pt-0">超取設定</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio1">
                                                    <label class="form-check-label" for="flexRadio1">
                                                        可超取
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio2">
                                                    <label class="form-check-label" for="flexRadio2">
                                                        不可超取
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">可用配送方式</label>
                                            <div class="col-12 col-sm-9">
                                                <select name="filter_status[]" class="select2bs5 form-select"
                                                        multiple="multiple" style="width: 100%">
                                                    <option value="1">宅配 (3)</option>
                                                    <option value="2">7-11取貨不付款 (2)</option>
                                                    <option value="3">全家取貨不付款 (4)</option>
                                                    <option value="4">宅配-宅配通 (13)</option>
                                                    <option value="5">7-11跨境宅配 (7)</option>
                                                    <option value="6">7-11跨境門市取貨不付款 (9)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">SEO 設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">基本設定</h5>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">SEO 標題</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">SEO 關鍵字</label>
                                            <div class="col-12 col-sm-9">
                                                <textarea class="form-control" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">SEO 描述檔</label>
                                            <div class="col-12 col-sm-9">
                                                <textarea class="form-control" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">URL 代稱</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">Canonical
                                                URL</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">社群相關設定</h5>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">Facebook
                                                分類</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">Facebook
                                                分享圖</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="file">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">自訂標籤 0</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">自訂標籤 1</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">自訂標籤 2</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">自訂標籤 3</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">自訂標籤 4</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">廣告分組</label>
                                            <div class="col-12 col-sm-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">商品規格設定</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-2 col-form-label pt-0">規格類型</label>
                                            <div class="col-12 col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio1">
                                                    <label class="form-check-label" for="flexRadio1">
                                                        無規格
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio2">
                                                    <label class="form-check-label" for="flexRadio2">
                                                        單規格
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio1">
                                                    <label class="form-check-label" for="flexRadio1">
                                                        雙規格
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="flexRadio" value="" id="flexRadio2">
                                                    <label class="form-check-label" for="flexRadio2">
                                                        三規格
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-12">
                                                <a href="##">+ 設定規格一</a>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-2 col-form-label">規格二</label>
                                            <div class="col-12 col-sm-10">
                                                <div class="input-group">
                                                    <span class="form-control-plaintext variant-settings">
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-image: url('/template/Salessa/img/products/1000_1000_001.jpg');"></span>S</span>
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-image: url('/template/Salessa/img/products/1000_1000_002.jpg');"></span>M</span>
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-image: url('/template/Salessa/img/products/1000_1000_003.jpg');"></span>L</span>
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-image: url('/template/Salessa/img/products/1000_1000_004.jpg');"></span>XL</span>
                                                    </span>
                                                    <button class="btn btn-light">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-2 col-form-label">規格三</label>
                                            <div class="col-12 col-sm-10">
                                                <div class="input-group">
                                                    <span class="form-control-plaintext variant-settings">
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-color: red;"></span>A</span>
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-color: blue;"></span>B</span>
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-color: green;"></span>C</span>
                                                        <span class="variant-setting"><span class="variant-thumbnail" style="background-color: cyan;"></span>D</span>
                                                    </span>
                                                    <button class="btn btn-light">
                                                        <i class="ti-pencil"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 card-detail border-0">
                                    <div class="card-header border-0 d-flex align-items-center">
                                        <h5 class="card-title">商品規格管理</h5>
                                        <span class="card-arrow d-flex align-items-center justify-content-end fs-4 ms-auto">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group variant-group mb-3">
                                            <li class="list-group-item">
                                                <div class="row align-items-center text-center">
                                                    <div class="col">規格主圖</div>
                                                    <div class="col sortStyle ascStyle">商品規格</div>
                                                    <div class="col sortStyle descStyle">展示狀態</div>
                                                    <div class="col sortStyle unsortStyle">商品料號</div>
                                                    <div class="col sortStyle unsortStyle">庫存</div>
                                                    <div class="col-2 sortStyle unsortStyle">上架起迄時間</div>
                                                    <div class="col sortStyle unsortStyle">定價</div>
                                                    <div class="col sortStyle unsortStyle">結帳價</div>
                                                    <div class="col sortStyle unsortStyle">優惠價</div>
                                                    <div class="col sortStyle unsortStyle">管理</div>
                                                </div>
                                            </li>
                                            @for ($i = 0; $i < 10; $i++)
                                            <li class="list-group-item collapse-item">
                                                <div class="row align-items-center text-center">
                                                    <div class="col">
                                                        <div class="variant-img">
                                                            <img src="/template/Salessa/img/products/1000_1000_{{str_pad($i + 1, 3, '0', STR_PAD_LEFT)}}.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col">紅色 - S</div>
                                                    <div class="col">
                                                        <select class="form-select" name="" id="">
                                                            <option value="1" selected>銷售中</option>
                                                            <option value="2">銷售中可補貨</option>
                                                            <option value="3">展示中</option>
                                                            <option value="4">展示中未定價</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                    <div class="col">50</div>
                                                    <div class="col-2 text-center">
                                                        2023/08/01 00:00:00 ~ <br>2023/12/31 23:59:59
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="number">
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="number">
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="number">
                                                    </div>
                                                    <div class="col d-flex align-items-center justify-content-end">
                                                        <div class="form-check form-switch p-0 ms-2">
                                                            <input class="form-check-input float-none d-block" type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                        <a class="text-dark ms-2 d-flex align-items-center fs-5 variant-setting" href="##">
                                                            <ion-icon name="settings-outline"></ion-icon>
                                                        </a>
                                                        <a class="text-dark ms-2 d-flex align-items-center fs-5 variant-delete" href="##">
                                                            <ion-icon name="trash-outline"></ion-icon>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="collapse-box">
                                                    <div class="row">
                                                        <h5 class="card-title col-12 mb-3">規格圖片</h5>
                                                        <div class="col-12 mb-3">
                                                            <ul class="prodPic-list theme-variant">
                                                                @for ($j = 0; $j < 10; $j++)
                                                                <li class="prodPic-item">
                                                                    <img class="prodPic-img" src="/template/Salessa/img/products/1000_1000_{{str_pad($j + 1, 3, '0', STR_PAD_LEFT)}}.jpg"
                                                                        alt="">
                                                                    <div class="prodPic-hover">
                                                                        <div class="func-group">
                                                                            <a href="##"><i class="ti-pencil"></i></a>
                                                                            <a href="##"><i class="ti-close"></i></a>
                                                                        </div>
                                                                        <i class="ti-move"></i>
                                                                    </div>
                                                                </li>
                                                                @endfor
                                                                <li class="prodPic-item">
                                                                    <div class="prodPic-upload">
                                                                        <i class="ti-plus"></i>
                                                                    </div>
                                                                    <input class="prodPic-uploadbox" type="file">
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <h5 class="card-title col-12 mb-3">基本設定</h5>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">商品序號</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control-plaintext" id="Pos_No" name="Pos_No" value="0A920100110F"
                                                                        placeholder="商品料號">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">商品料號</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Pos_No" name="Pos_No" value="0A920100110F"
                                                                        placeholder="商品料號">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">單位數</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Unit" name="Unit" value="" placeholder="單位數">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">活動小字</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="S_Act_Str" name="S_Act_Str" value=""
                                                                        placeholder="活動小字">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">活動小字色碼</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="color" class="form-control" id="S_Act_Str_Color" name="S_Act_Str_Color" value=""
                                                                        placeholder="活動小字色碼">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">Sale小圖</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple" style="width: 100%">
                                                                        <option value="1">Sale</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">限購量</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control inpusm" id="Limit_Purchase" name="Limit_Purchase" value=""
                                                                        placeholder="限購量">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">限購文字</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Limit_Purchase_Text" name="Limit_Purchase_Text"
                                                                        value="" placeholder="限購文字">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title col-12 mb-3">顯示狀態</h5>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">上架狀態</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <select id="SShow_Flag" name="SShow_Flag" class="form-select">
                                                                        <option value="1" selected="">上架</option>
                                                                        <option value="2">下架</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">商品屬性</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <select id="Prod_Attribute" name="Prod_Attribute" class="form-select">
                                                                        <option value="1" selected="">正價品</option>
                                                                        <option value="2">正價品及促銷商品</option>
                                                                        <option value="3">特價活動商品</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">展示狀態</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <select id="Display_Flag" name="Display_Flag" class="form-select">
                                                                        <option value="1" selected="">銷售中</option>
                                                                        <option value="2">展示中</option>
                                                                        <option value="3">銷售中可補貨</option>
                                                                        <option value="4">展示中未定價</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">上架時間</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="input-group">
                                                                        <input type="datetime-local" step="1" class="form-control" placeholder="上架時間起" aria-label="上架時間起">
                                                                        <span class="input-group-text">~</span>
                                                                        <input type="datetime-local" step="1" class="form-control" placeholder="上架時間迄" aria-label="上架時間迄">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">加入購物車時間</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="input-group">
                                                                        <input type="datetime-local" step="1" class="form-control" placeholder="加入購物車時間起" aria-label="加入購物車時間起">
                                                                        <span class="input-group-text">~</span>
                                                                        <input type="datetime-local" step="1" class="form-control" placeholder="加入購物車時間迄" aria-label="加入購物車時間迄">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">
                                                                    預購品
                                                                </label>
                                                                <div class="col-12 col-sm-9">
                                                                    <select id="S_Pre_Flag" name="S_Pre_Flag" class="form-select">
                                                                        <option value="1">是</option>
                                                                        <option value="2" selected="">否</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">到貨時間</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="datetime-local" step="1" class="form-control" id="Arrive_Date" name="Arrive_Date" value=""
                                                                        placeholder="到貨時間">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title col-12 mb-3">金額設定</h5>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">定價</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control mb-3" id="Hops_List" name="Hops_List" value="" placeholder="規格定價">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔金額
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">結帳價</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control mb-3" id="Hops_Price" name="Hops_Price" value="0" placeholder="規格結帳價">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔金額
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">規格兌換紅利</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control mb-3" id="Hops_RBonus" name="Hops_RBonus" value="0" placeholder="規格兌換紅利">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔金額
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">優惠價時間</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="input-group">
                                                                        <input type="datetime-local" step="1" class="form-control"
                                                                            placeholder="優惠價時間起" aria-label="優惠價時間起">
                                                                        <span class="input-group-text">~</span>
                                                                        <input type="datetime-local" step="1" class="form-control"
                                                                            placeholder="優惠價時間迄" aria-label="優惠價時間迄">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-12 col-sm-3 col-form-label pt-0">優惠價類型</label>
                                                                <div class="col-12 col-sm-9 form-check-wrap">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="FlexRadio" value="" id="FlexRadio1">
                                                                        <label class="form-check-label" for="FlexRadio1">
                                                                            固定價
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="FlexRadio" value="" id="FlexRadio2">
                                                                        <label class="form-check-label" for="FlexRadio2">
                                                                            折扣
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">優惠價</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">NT$</span>
                                                                        <input type="number" class="form-control" placeholder=""
                                                                            aria-label="">
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔金額
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">優惠折扣</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="input-group mb-3">
                                                                        <input type="number" class="form-control" placeholder=""
                                                                            aria-label="">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔金額
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">定期定額價格</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control mb-3" id="SSIT_Price" name="SSIT_Price" value="" placeholder="定期定額價格">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔金額
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">定期定額限購數</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control mb-3" id="SSIT_Max" name="SSIT_Max" value="" placeholder="定期定額限購數">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                                                                        <label class="form-check-label" for="flexCheck2">
                                                                            同主檔數量
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title col-12 mb-3">優惠管理</h5>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">整單免運商品</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <select id="ShippingFee_Free_Flag" name="ShippingFee_Free_Flag" class="form-control">
                                                                        <option value="1" selected="">是</option>
                                                                        <option value="2">否</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">免運文字</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="ShippingFee_Free_Text" name="ShippingFee_Free_Text" value="" placeholder="免運文字">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">贈品贈送時間</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="input-group mb-3">
                                                                        <input type="datetime-local" step="1" class="form-control"
                                                                            placeholder="贈品贈送時間起" aria-label="贈品贈送時間起">
                                                                        <span class="input-group-text">~</span>
                                                                        <input type="datetime-local" step="1" class="form-control"
                                                                            placeholder="贈品贈送時間迄" aria-label="贈品贈送時間迄">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">贈品編號</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Gift_No" name="Gift_No" value="" placeholder="贈品編號">
                                                                    <span class="text-hint fz-sm text-muted d-block mt-1">（多個請以／隔開）</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">可得購物金</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Get_Bonus" name="Get_Bonus" value="" placeholder="可得購物金">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title col-12 mb-3">倉儲管理</h5>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">庫存</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Stock" name="Stock" value="220" placeholder="庫存" fun="checkNull" len="10" nullstr="請輸入庫存" errorstr="" readonly="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">預購庫存</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Pre_Stock" name="Pre_Stock" value="0" placeholder="預購庫存" fun="checkNull" len="10" nullstr="請輸入預購庫存" errorstr="" readonly="">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">安全庫存</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Safe_Stock" name="Safe_Stock" value="0" placeholder="安全庫存" fun="checkNull" len="10" nullstr="請輸入安全庫存" errorstr="" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">儲櫃</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Stock" name="Stock" placeholder="儲櫃" fun="checkNull" len="10" nullstr="請輸入儲櫃">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">儲位</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="text" class="form-control" id="Pre_Stock" name="Pre_Stock" placeholder="儲位" fun="checkNull" len="10" nullstr="請輸入儲位">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">重量(g)</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Safe_Stock" name="Safe_Stock" placeholder="重量(g)" fun="checkNull" len="10" nullstr="請輸入重量(g)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">長(cm)</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Stock" name="Stock" placeholder="長(cm)" fun="checkNull" len="10" nullstr="請輸入長(cm)">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">寬(cm)</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Pre_Stock" name="Pre_Stock" placeholder="寬(cm)" fun="checkNull" len="10" nullstr="請輸入寬(cm)">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-12 col-sm-3 col-form-label">高(cm)</label>
                                                                <div class="col-12 col-sm-9">
                                                                    <input type="number" class="form-control" id="Safe_Stock" name="Safe_Stock" placeholder="高(cm)" fun="checkNull" len="10" nullstr="請輸入高(cm)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endfor
                                        </ul>
                                        <div class="row mb-3">
                                            <div class="col-12 d-flex align-items-center justify-content-between">
                                                <div class="text-muted fz-sm me-2">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-light active" aria-current="page">25</a>
                                                        <a href="#" class="btn btn-light">50</a>
                                                        <a href="#" class="btn btn-light">100</a>
                                                        <a href="#" class="btn btn-light">200</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <ul class="pagination pagination-sm m-0">
                                                        <li class="page-item page-arrow"><a class="page-link" href=""
                                                                                            aria-label="第一頁"><i class="ti-angle-double-left"></i></a></li>
                                                        <li class="page-item page-arrow"><a class="page-link" href=""
                                                                                            aria-label="上一頁"><i class="ti-angle-left"></i></a></li>
                                                        <li class="page-item "><a class="page-link"
                                                                                  href="http://127.0.0.1/operate/user?page=1">1</a></li>
                                                        <li class="page-item "><a class="page-link"
                                                                                  href="http://127.0.0.1/operate/user?page=1">2</a></li>
                                                        <li class="page-item active"><a class="page-link"
                                                                                        href="http://127.0.0.1/operate/user?page=1">3</a></li>
                                                        <li class="page-item "><a class="page-link"
                                                                                  href="http://127.0.0.1/operate/user?page=1">4</a></li>
                                                        <li class="page-item "><a class="page-link"
                                                                                  href="http://127.0.0.1/operate/user?page=1">5</a></li>
                                                        <li class="page-item page-arrow"><a class="page-link" href=""
                                                                                            aria-label="下一頁"><i class="ti-angle-right"></i></a></li>
                                                        <li class="page-item page-arrow"><a class="page-link" href=""
                                                                                            aria-label="最尾頁"><i class="ti-angle-double-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <a class="d-block" href="##">+ 新增規格商品</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <p class="text-end fz-sm text-muted">最後修改時間：2023/10/04 09:29:55</p>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-end">
                                <div class="btn-group ms-2">
                                    <a class="btn btn-light" href="##">
                                        取消
                                    </a>
                                </div>
                                <div class="btn-group ms-2">
                                    <a class="btn btn-primary" href="##">
                                        儲存
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert text-danger bg-danger-light" role="alert">錯誤訊息!!!</div>
@endsection

@section('BodyJavascript')
    <script>

        //Initialize Select2 Elements
        $('.select2bs5').each(function(i, ele) {
            $(ele).select2({
                // dropdownParent: $('#prodFilter'),
            })
        })

        /**
         * sends a request to the specified url from a form. this will change the window location.
         * @param {string} path the path to send the post request to
         * @param {object} params the parameters to add to the url
         * @param {string} [method=post] the method to use on the form
         */

        function postForm(path, params, method = 'post') {
            const form = document.createElement('form');
            form.method = method;
            form.action = path;
            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];

                    form.appendChild(hiddenField);
                }
            }
            document.body.appendChild(form);
            form.submit();
        }

        // sortable.js
        new Sortable(document.getElementById('sortGroup'), {
            filter: '.in-fixed', // 'filtered' class is not draggable
            animation: 150,
            handle: '.ti-align-justify',
            ghostClass: 'bg-secondary-light'
        });
    </script>
@endsection

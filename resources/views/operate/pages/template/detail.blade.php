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
                                        儲存並複製
                                    </a>
                                    <a class="dropdown-item" href="##">
                                        開啟預覽頁
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
                            <div class="col-12 mb-3">
                                <div class="card mb-3 border-muted">
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
                                                <input type="datetime-local" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">時間選擇</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="time" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">單選</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">單選 (行內)</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">複選</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">複選</label>
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
                            </div>
                            <div class="col-12">
                                <ul class="nav nav-tabs">
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">圖片和影片</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="prodPic-list">
                                            <li class="prodPic-item main-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_001.jpg"
                                                     alt="">
                                                <div class="prodPic-hover">
                                                    <i class="ti-move"></i>
                                                </div>
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_002.jpg"
                                                     alt="">
                                                <div class="prodPic-hover">
                                                    <i class="ti-move"></i>
                                                </div>
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_003.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_004.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_005.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_006.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_007.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_008.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_009.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_010.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_011.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <img class="prodPic-img" src="./img/products/1000_1000_012.jpg"
                                                     alt="">
                                            </li>
                                            <li class="prodPic-item">
                                                <div class="prodPic-upload">
                                                    <i class="ti-plus"></i>
                                                </div>
                                                <input class="prodPic-uploadbox" type="file">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">商品基本資料</h5>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">金額設定</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">成本價</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">價格一名稱</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">價格一</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control mb-3" type="number">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">價格一紅字</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">價格二
                                                (定價)</label>
                                            <div class="col-12 col-sm-9 form-check-wrap">
                                                <input class="form-control" type="number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">優惠價類型</label>
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
                                                    <input type="datetime-local" class="form-control"
                                                           placeholder="優惠價時間起" aria-label="優惠價時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" class="form-control"
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">優惠設定</h5>
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
                                                    <input type="datetime-local" class="form-control"
                                                           placeholder="活動主圖時間起" aria-label="活動主圖時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" class="form-control"
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">使用優惠方案</label>
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">商品資訊欄位</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品說明</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                       value="商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明、商品說明">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品資訊</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                       value="商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊、商品資訊">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品成分</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                       value="商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分、商品成分">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品簡介</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                       value="商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介、商品簡介">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-12">
                                                <a href="##">+ 新增資訊欄位</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-5 mb-3">
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">顯示狀態</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">編修狀態</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">狀態</label>
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
                                                    <input type="datetime-local" class="form-control"
                                                           placeholder="上架時間起" aria-label="上架時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" class="form-control"
                                                           placeholder="上架時間迄" aria-label="上架時間迄">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">加入購物車時間</label>
                                            <div class="col-12 col-sm-9">
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local" class="form-control"
                                                           placeholder="加入購物車時間起" aria-label="加入購物車時間起">
                                                    <span class="input-group-text">~</span>
                                                    <input type="datetime-local" class="form-control"
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">一頁式商品</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品類型</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">商品組合</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">多入組</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">熱銷狀態</label>
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
                                            <label for="" class="col-12 col-sm-3 col-form-label">品牌熱銷狀態</label>
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">商品分類設定</h5>
                                    </div>
                                    <div class="card-body">
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">金流設定</h5>
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">物流設定</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">海外配送設定</label>
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
                                        </div>
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
                                        <div class="row mb-3">
                                            <label for="" class="col-12 col-sm-3 col-form-label">超取設定</label>
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
                                        </div>
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

                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">SEO 設定</h5>
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
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">商品規格設定</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">顏色
                                                (規格一)</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                       value="紅色,綠色,藍色,灰色">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-12 col-sm-3 col-form-label">規格二</label>
                                            <div class="col-12 col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                       value="S,M,L,XL">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <a class="d-block" href="##">+ 新增商品規格</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3 card-detail border-0">
                                    <div class="card-header border-0">
                                        <h5 class="card-title">商品規格管理</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group variant-group mb-3">
                                            <li class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-2">規格</div>
                                                    <div class="col-2">庫存</div>
                                                    <div class="col-2">SKU</div>
                                                    <div class="col-2">定價</div>
                                                    <div class="col-2">結帳價</div>
                                                    <div class="col-2">管理</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item collapse-item">
                                                <div class="row align-items-center">
                                                    <div class="col-2">紅色 - S</div>
                                                    <div class="col-2">50</div>
                                                    <div class="col-2">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-control" type="number">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-control" type="number">
                                                    </div>
                                                    <div class="col-2 d-flex align-items-center justify-content-end">
                                                        <div class="form-check form-switch p-0 ms-2">
                                                            <input class="form-check-input float-none d-block" type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                        <a class="text-muted ms-2 d-block" href="##">
                                                            <i class="ti-settings"></i>
                                                        </a>
                                                        <a class="text-danger ms-2 d-block" href="##">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- <div class="row collapse-box">
                                                    <div class="col-4">
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-12 col-sm-3 col-form-label">上架狀態</label>
                                                            <div class="col-12 col-sm-9">
                                                                <input type="text" readonly class="form-control-plaintext" id=""
                                                                    value="S,M,L,XL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </li>
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
@endsection


@section('Modal')
    <!-- 彈出視窗 -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="http://127.0.0.1/operate/user/import" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="UEaa9fn2Xg2Q62KnLiHIuiXhGZm0cNiRznD1WIbG" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">匯入新增</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="card-subtitle mb-2">請上傳Excel檔案</h6>
                        <div class=" mb-0">
                            <input type="file" class="" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="slideFunc-box" id="prodFilter">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="prodFilterTitle">商品篩選器</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="slideFunc-body px-3 py-3">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label class="form-label d-block">編修狀態</label>
                            <div class="form-check-wrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio1">
                                    <label class="form-check-label" for="FlexRadio1">
                                        不限制
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio2">
                                    <label class="form-check-label" for="FlexRadio2">
                                        完稿
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        草稿
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">上架狀態</label>
                            <div class="form-check-wrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio1">
                                    <label class="form-check-label" for="FlexRadio1">
                                        不限制
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio2">
                                    <label class="form-check-label" for="FlexRadio2">
                                        上架
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        下架
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">上架期間狀態</label>
                            <div class="form-check-wrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio1">
                                    <label class="form-check-label" for="FlexRadio1">
                                        不限制
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio2">
                                    <label class="form-check-label" for="FlexRadio2">
                                        未開始
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        進行中
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        已結束
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">熱銷品牌狀態</label>
                            <div class="form-check-wrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio1">
                                    <label class="form-check-label" for="FlexRadio1">
                                        不限制
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio2">
                                    <label class="form-check-label" for="FlexRadio2">
                                        是
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        否
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">新品狀態</label>
                            <div class="form-check-wrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio1">
                                    <label class="form-check-label" for="FlexRadio1">
                                        不限制
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio2">
                                    <label class="form-check-label" for="FlexRadio2">
                                        是
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        否
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">串接狀態</label>
                            <div class="form-check-wrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio1">
                                    <label class="form-check-label" for="FlexRadio1">
                                        不限制
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio2">
                                    <label class="form-check-label" for="FlexRadio2">
                                        未串接
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        串接成功
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="FlexRadio" value=""
                                        id="FlexRadio3">
                                    <label class="form-check-label" for="FlexRadio3">
                                        串接失敗
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品分店</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品分館</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品分類</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品細分類</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品品牌</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品類型</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">商品組合</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">一頁式商品</label>
                            <select name="filter_status[]" class="select2bs5 form-select" multiple="multiple"
                                style="width: 100%">
                                <option value="Y">未開始</option>
                                <option value="N">進行中</option>
                                <option value="N">已過期</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">建立時間</label>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="建立時間起" aria-label="建立時間起">
                                <span class="input-group-text">~</span>
                                <input type="date" class="form-control" placeholder="建立時間迄" aria-label="建立時間迄">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">上架時間</label>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="建立時間起" aria-label="建立時間起">
                                <span class="input-group-text">~</span>
                                <input type="date" class="form-control" placeholder="建立時間迄" aria-label="建立時間迄">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">加入購物車時間</label>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="建立時間起" aria-label="建立時間起">
                                <span class="input-group-text">~</span>
                                <input type="date" class="form-control" placeholder="建立時間迄" aria-label="建立時間迄">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">庫存數量</label>
                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect02">
                                    <option selected>請選擇</option>
                                    <option value="1">小於</option>
                                    <option value="2">等於</option>
                                    <option value="3">大於</option>
                                </select>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">預購庫存數量</label>
                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect02">
                                    <option selected>請選擇</option>
                                    <option value="1">小於</option>
                                    <option value="2">等於</option>
                                    <option value="3">大於</option>
                                </select>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label d-block">安全庫存數量</label>
                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect02">
                                    <option selected>請選擇</option>
                                    <option value="1">小於</option>
                                    <option value="2">等於</option>
                                    <option value="3">大於</option>
                                </select>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <input id="searchFilter" type="hidden" value="">
                <input id="searchString" type="hidden" value="">
            </div>
            <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                <button type="reset" class="btn btn-muted mx-2">清除篩選器</button>
                <button type="submit" class="btn btn-primary mx-2">套用N篩選條件</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="slideFunc-box" id="listSetting">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="listSettingTitle">列表欄位調整</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="slideFunc-body px-3 py-3">
                <div class="row">
                    <div class="col-12">
                        <div class="list-group">
                            <div class="sort-item">
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input" checked disabled>
                                        <label class="form-check-label" for="">編號</label>
                                    </div>
                                    <i class="ti-lock "></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">排列序號</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">圖片</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                            </div>
                            <div class="sort-item" id="sortGroup">
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">編修狀態</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">名稱</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">商品編號</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">狀態/日期</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">點閱數</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">串接狀態</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">類型</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">組合商品</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">一頁式商品</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">最後修改者</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">最後修改日期</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">建置日期</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                            </div>
                            <div class="sort-item">
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">規格一</label>
                                    </div>
                                    <i class="ti-lock "></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">規格二</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">規格三</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                <button type="reset" class="btn btn-muted mx-2">取消</button>
                <button type="submit" class="btn btn-primary mx-2">儲存</button>
            </div>
        </div>
    </div>
@endsection


@section('BodyJavascript')
    <script>
        console.log($trans('確認要刪除嗎？'))

        //Initialize Select2 Elements
        $('.select2bs5').each(function(i, ele) {
            $(ele).select2({
                dropdownParent: $('#prodFilter'),
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

        // tableSort
        // $('#sortableTable').tablesort();

        // sortable.js
        new Sortable(document.getElementById('sortGroup'), {
            filter: '.in-fixed', // 'filtered' class is not draggable
            animation: 150,
            handle: '.ti-align-justify',
            ghostClass: 'bg-secondary-light'
        });
    </script>
@endsection

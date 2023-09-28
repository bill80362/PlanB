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
                                <h2>管理人管理 列表</h2>
                                <!-- Example single danger button -->
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i> 處理
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item">全選</button>
                                        <button type="button" class="dropdown-item">取消全選</button>
                                        <button type="button" class="dropdown-item">反向選擇</button>
                                        <hr class="dropdown-divider">
                                        <button type="button" class="dropdown-item">勾選顯示</button>
                                        <button type="button" class="dropdown-item">勾選不顯示</button>
                                        <button type="button" class="dropdown-item">勾選熱銷品牌</button>
                                        <button type="button" class="dropdown-item">勾選非熱銷品牌</button>
                                        <button type="button" class="dropdown-item">勾選新品</button>
                                        <button type="button" class="dropdown-item">勾選非新品</button>
                                        <button type="button" class="dropdown-item">設定排列序號</button>
                                        <button type="button" class="dropdown-item">重置排列序號</button>
                                        <hr class="dropdown-divider">
                                        <button type="button" class="dropdown-item">勾選刪除</button>
                                    </div>
                                </div>
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        匯入 / 匯出
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#importModal">
                                            匯入
                                        </button>
                                        <a class="dropdown-item" href="http://127.0.0.1/operate/user/export?">
                                            匯出
                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="http://127.0.0.1/operate/user/0?">
                                        新增
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group input-group" id="searchContnet">
                                            <div class="input-group-prepend">
                                                <select class="form-select" name="filter_text_key"
                                                    data-target="#searchFilter">
                                                    <option value="">不限制</option>
                                                    <option value="name">姓名</option>
                                                    <option value="id">編號</option>
                                                    <option value="email">Email</option>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" name="filter_text_value"
                                                value="" data-target="#searchString">
                                            <button class="btn btn-dark" type="button" id="searchButton"><i
                                                    class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <button class="btn btn-secondary slideFunc-toggle" data-target="#prodFilter"><ion-icon
                                            name="funnel-outline"></ion-icon>
                                        篩選器</button>
                                    <button class="btn btn-muted">重置查詢</button>
                                    <!-- modals ppup  -->
                                </div>
                                <div class="col-12">
                                    <p class="d-flex align-items-center flex-content-start fz-sm filter-string">
                                        <span class="text-muted me-2">篩選器：</span>
                                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3">上架狀態：上架 <i
                                                class="ti-close"></i></button>
                                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3">上架區間狀態：進行中、未開始
                                            <i class="ti-close"></i></button>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle ascStyle">編號</th>
                                                    <th class="sortStyle descStyle">排列序號</th>
                                                    <th class="sortStyle unsortStyle">圖片</th>
                                                    <th class="sortStyle unsortStyle">名稱</th>
                                                    <th class="sortStyle unsortStyle">商品編號</th>
                                                    <th class="sortStyle unsortStyle">狀態</th>
                                                    <th class="sortStyle unsortStyle">點閱數</th>
                                                    <th class="sortStyle unsortStyle">串接狀態</th>
                                                    <th class="sortStyle unsortStyle">類型</th>
                                                    <th class="sortStyle unsortStyle">組合</th>
                                                    <th class="sortStyle unsortStyle">最後修改者</th>
                                                    <th class="sortStyle unsortStyle">最後修改日期</th>
                                                    <th class="sortStyle unsortStyle">建置日期</th>
                                                    <th class="text-end">
                                                        <button class="btn btn-link slideFunc-toggle text-muted"
                                                            data-target="#listSetting"><i
                                                                class="ti-settings"></i></button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-muted-light">
                                                    <td rowspan="2">
                                                        <input type="checkbox" class="form-check-input" name="id_array[]"
                                                            value="1">
                                                        1
                                                    </td>
                                                    <td rowspan="2"><input class="form-control" type="number"></td>
                                                    <td rowspan="2">
                                                        <img src="./img/products/img-1.png" alt="">
                                                    </td>
                                                    <td class="border-0">測試用商品1</td>
                                                    <td class="border-0">TEST_29N1</td>
                                                    <td class="border-0">
                                                        <div class="form-check form-switch p-0">
                                                            <input class="form-check-input float-none mx-auto d-block"
                                                                type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                        <div class="text-success fz-sm text-center">2023/10/31<br>23:59:59
                                                            迄</div>
                                                    </td>
                                                    <td class="border-0">100</td>
                                                    <td class="border-0"><span class="text-muted">未串接</span></td>
                                                    <td class="border-0">商品</td>
                                                    <td class="border-0">無</td>
                                                    <td class="border-0">admin</td>
                                                    <td class="border-0">2023-09-21<br>14:41:41</td>
                                                    <td class="border-0">2023-09-21<br>14:41:41</td>
                                                    <td class="border-0 text-end">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="/operate/user/1?">編輯</a></li>
                                                                <li><a class="dropdown-item" href="#">複製新增</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">商品規格</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">商品內容</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">尺寸表</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="/operate/user/1/audit?">修改紀錄</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="postForm('/operate/user/del?',{'id_array[]':1,_token:'UEaa9fn2Xg2Q62KnLiHIuiXhGZm0cNiRznD1WIbG'})">刪除</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="bg-muted-light">
                                                    <td class="pt-0 text-muted" colspan="11">顏色：<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: red; width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: green; width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: blue; width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: gray; width: 1em; height: 1em; vertical-align: middle;"></span>&nbsp;&nbsp;|&nbsp;&nbsp;尺寸：S、M、L、XL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">
                                                        <input type="checkbox" class="form-check-input" name="id_array[]"
                                                            value="1">
                                                        2
                                                    </td>
                                                    <td rowspan="2"><input class="form-control" type="number"></td>
                                                    <td rowspan="2">
                                                        <img src="./img/products/img-2.png" alt="">
                                                    </td>
                                                    <td class="border-0">測試用商品2</td>
                                                    <td class="border-0">TEST_29N2</td>
                                                    <td class="border-0">
                                                        <div class="form-check form-switch p-0">
                                                            <input class="form-check-input float-none mx-auto d-block"
                                                                type="checkbox" id="flexSwitchCheckDefault">
                                                        </div>
                                                        <div class="text-muted fz-sm text-center">2023/11/01<br>00:00:00 起
                                                        </div>
                                                    </td>
                                                    <td class="border-0">100</td>
                                                    <td class="border-0"><span class="text-danger">串接失敗</span></td>
                                                    <td class="border-0">贈品</td>
                                                    <td class="border-0">無</td>
                                                    <td class="border-0">admin</td>
                                                    <td class="border-0">2023-09-21<br>14:41:41</td>
                                                    <td class="border-0">2023-09-21<br>14:41:41</td>
                                                    <td class="border-0 text-end">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="/operate/user/1?">編輯</a></li>
                                                                <li><a class="dropdown-item" href="#">複製新增</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">商品規格</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">商品內容</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">尺寸表</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="/operate/user/1/audit?">修改紀錄</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="postForm('/operate/user/del?',{'id_array[]':1,_token:'UEaa9fn2Xg2Q62KnLiHIuiXhGZm0cNiRznD1WIbG'})">刪除</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pt-0 text-muted" colspan="11">
                                                        表面尺寸：8cm、10cm&nbsp;&nbsp;|&nbsp;&nbsp;表面顏色：<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: rgb(230, 230, 230); width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: rgb(0, 0, 0); width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: rgb(10, 11, 90); width: 1em; height: 1em; vertical-align: middle;"></span>&nbsp;&nbsp;|&nbsp;&nbsp;錶帶顏色：<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: rgb(0, 0, 0); width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: rgb(243, 215, 198); width: 1em; height: 1em; vertical-align: middle;"></span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-muted-light">
                                                    <td rowspan="2">
                                                        <input type="checkbox" class="form-check-input" name="id_array[]"
                                                            value="1">
                                                        3
                                                    </td>
                                                    <td rowspan="2"><input class="form-control" type="number"></td>
                                                    <td rowspan="2">
                                                        <img src="./img/products/img-1.png" alt="">
                                                    </td>
                                                    <td class="border-0">測試用商品3</td>
                                                    <td class="border-0">TEST_29N3</td>
                                                    <td class="border-0">
                                                        <div class="form-check form-switch p-0">
                                                            <input class="form-check-input float-none mx-auto d-block"
                                                                type="checkbox" id="flexSwitchCheckDefault" checked>
                                                        </div>
                                                        <div class="text-danger fz-sm text-center">2023/08/31<br>23:59:59迄
                                                        </div>
                                                    </td>
                                                    <td class="border-0">100</td>
                                                    <td class="border-0"><span class="text-success">串接成功</span></td>
                                                    <td class="border-0">特惠組</td>
                                                    <td class="border-0">無</td>
                                                    <td class="border-0">admin</td>
                                                    <td class="border-0">2023-09-21<br>14:41:41</td>
                                                    <td class="border-0">2023-09-21<br>14:41:41</td>
                                                    <td class="border-0 text-end">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="/operate/user/1?">編輯</a></li>
                                                                <li><a class="dropdown-item" href="#">複製新增</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">商品規格</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">商品內容</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">尺寸表</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="/operate/user/1/audit?">修改紀錄</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="postForm('/operate/user/del?',{'id_array[]':1,_token:'UEaa9fn2Xg2Q62KnLiHIuiXhGZm0cNiRznD1WIbG'})">刪除</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="bg-muted-light">
                                                    <td class="pt-0 text-muted" colspan="11">顏色：<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: red; width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: green; width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: blue; width: 1em; height: 1em; vertical-align: middle;"></span>、<span
                                                            class="d-inline-block rounded-circle"
                                                            style="background-color: gray; width: 1em; height: 1em; vertical-align: middle;"></span>&nbsp;&nbsp;|&nbsp;&nbsp;尺寸：S、M、L、XL
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="text-muted fz-sm me-2">
                                        <span class="text-primary">1</span>-<span class="text-primary">50</span> / <span
                                            class="text-primary">495</span>，每頁顯示 <a class="text-dark"
                                            href="##">10</a>、<a class="text-primary" href="##">25</a>、<a
                                            class="text-primary" href="##">50</a>、<a class="text-primary"
                                            href="##">100</a> 筆
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

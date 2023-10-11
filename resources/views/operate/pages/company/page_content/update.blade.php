@extends('operate.layout._Empty')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <form method="post">
                    @include('/operate/components/alert/error_message')
                    @csrf
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>@include('/operate/components/title/page_title') - {{ __($pageName) }}</h2>

                                <div class="btn-group ms-2">
                                    <a class="btn btn-light" href="{{ route('page_content_list') }}">{{ __('回總覽') }}</a>
                                </div>
                                <div class="btn-group ms-2">
                                    <button type="button" class="btn btn-dark">{{ __('草稿') }}</button>
                                </div>
                                <div class="btn-group ms-2">
                                    <button class="btn btn-primary">{{ __('儲存') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-12">
                                    {{-- 標籤按鈕 --}}
                                    <ul class="nav nav-tabs">
                                        @foreach ($datas as $key => $data)
                                            <li class="nav-item">
                                                <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                    data-bs-toggle="tab" data-bs-target="#tab{{ $key }}"
                                                    type="button">{{ $langTypeText[$data->lang_type] }}</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    {{-- 標籤內文 --}}
                                    <div class="tab-content">
                                        @foreach ($datas as $key => $data)
                                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                                id="tab{{ $key }}">
                                                <div class="row">
                                                    {{-- 編輯器 --}}
                                                    <div class="col-12 col-xl-8 mb-6">
                                                        <div class="card mb-3 card-detail border-0">
                                                            <div class="card-header border-0">
                                                                <h5 class="card-title">{{ __('內文編輯') }}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                @include(
                                                                    'operate.components.editor.ckeditor',
                                                                    [
                                                                        'defaultValue' => $data->content,
                                                                        'id' => "editor_{$data->lang_type}",
                                                                        'name' => 'editors[]',
                                                                        'height' => '400px',
                                                                        'index' => $key + 1,
                                                                    ]
                                                                )
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- textarea --}}
                                                    <div class="col-12 col-xl-4 mb-6">
                                                        <div class="card mb-3 card-detail border-0">
                                                            <div class="card-body">
                                                                <h5 class="card-title">SEO {{ __('設定') }}</h5>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-12 col-sm-3 col-form-label">SEO
                                                                        {{ __('標題') }}</label>
                                                                    <div class="col-12 col-sm-9">
                                                                        <input class="form-control" name="seo_title[]"
                                                                            type="text" value="{{ $data->seo_title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-12 col-sm-3 col-form-label">SEO
                                                                        {{ __('關鍵字') }}</label>
                                                                    <div class="col-12 col-sm-9">
                                                                        <textarea class="form-control" name="seo_keywords[]" rows="10">{{ $data->seo_keywords }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-12 col-sm-3 col-form-label">SEO
                                                                        {{ __('描述檔') }}</label>
                                                                    <div class="col-12 col-sm-9">
                                                                        <textarea class="form-control" name="seo_description[]" rows="10">{{ $data->seo_description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-12 col-sm-3 col-form-label">URL
                                                                        代稱</label>
                                                                    <div class="col-12 col-sm-9">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-12 col-sm-3 col-form-label">Canonical
                                                                        URL</label>
                                                                    <div class="col-12 col-sm-9">
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="ids[]" value="{{ $data->id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            {{-- --}}
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    <div class="btn-group ms-2">
                                        <a class="btn btn-light" href="{{ route('page_content_list') }}">{{ __('回總覽') }}</a>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button type="button" id="draftBtn"
                                            class="btn btn-dark">{{ __('草稿') }}</button>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button class="btn btn-primary">{{ __('儲存') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var datas = @json($datas);
        var data = datas[0];
        // 是否有草稿
        checkHasDraft();

        async function checkHasDraft() {

            var haveDraft = @json($haveDraft);
            if (haveDraft) {
                var yes = await confirm($trans('目前有草稿，是否要載入草稿？'));

                if (yes) {
                    // 載入草稿
                    let ids = $("input[name='ids[]']").map(function() {
                        return $(this).val();
                    }).get();
                    ids.forEach((element, index) => {
                        let i = index + 1;
                        window.editor[i].data.set(datas[index].draft);
                    });
                    alert($trans('載入草稿完成'));
                } else {
                    // 不載入草稿，不需做任何操作。
                }
            }
        }



        document.getElementById('draftBtn').onclick = function() {

            let editors = [];
            let ids = $("input[name='ids[]']").map(function() {
                return $(this).val();
            }).get();

            ids.forEach((element, index) => {
                let i = index + 1;
                editors.push(window.editor[i].getData());
            });

            //頁面加載
            $.ajax({
                type: 'POST',
                url: '/operate/page_content/' + data.id + '/draft',
                dataType: 'json',
                data: {
                    ids: ids,
                    editors: editors
                },
                headers: {
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content,
                },
            }).then((res) => {
                console.log(res.urls); // 目前前台沒有網址先帶入假網址
                window.open("http://127.0.0.1:8000/");
            }).catch((xhr, status, error) => {
                //console.error(xhr.responseText);
            })
        }
    </script>
@endsection

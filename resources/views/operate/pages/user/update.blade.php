@extends('operate.layout._Empty')

@section('HeaderCSS')
@endsection

@section('Content')
    {{--  --}}
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card">
                    <div class="white_card_header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2> {{ __('管理人管理') }} {{ $data->id ? __('修改') : __('新增') }}</h2>

                            {{-- @can('user_delete')
                                @if ($data->id)
                                    <div class="btn-group ms-2">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" id="delBtn" href="javascript:void(0)">
                                                刪除
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endcan --}}
                            <div class="btn-group ms-2">
                                <a class="btn btn-light" href="{{ route('user_list') }}?{{ request()->getQueryString() }}">
                                    {{ __('回總覽') }}
                                </a>
                            </div>
                            <div class="btn-group ms-2">
                                <button class="btn btn-primary" id="saveBtn">
                                    {{ __('儲存') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="subForm">
                        <div class="white_card_body">
                            <div class="row">
                                @include('/operate/components/alert/error_message')
                                <div class="col-12 col-xl-5 mb-6">
                                    <div class="card mb-3 card-detail border-0">
                                        <div class="card-header border-0">
                                            <h5 class="card-title">{{ __('基本資料') }}</h5>
                                        </div>

                                        <div class="card-body">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                                            {{-- <div class="mb-3 row">
                                                <label for="" class="col-12 col-sm-3 col-form-label pt-0">
                                                    {{ __($data->Column_Title_Text['status']) }}
                                                </label>
                                                <div class="col-12 col-sm-9">
                                                    <select class="form-select" name="status">
                                                        @foreach ($data->statusText as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ $data->status == $key ? 'selected' : '' }}>
                                                                {{ __($value) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="mb-3 row">
                                                <label for="" class="col-12 col-sm-3 col-form-label pt-0">
                                                    {{ __($data->Column_Title_Text['status']) }}
                                                </label>
                                                <div class="col-12 col-sm-9 form-check-wrap">
                                                    @foreach ($data->statusText as $key => $value)
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $data->status == $key ? 'checked' : '' }}
                                                                class="form-check-input" type="radio" name="status"
                                                                value="{{ $key }}" id="{{ $key }}">
                                                            <label class="form-check-label"
                                                                for="FlexRadio1{{ $key }}">
                                                                {{ __($value) }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            {{-- 時間差更新檢查用 --}}
                                            @include('/operate/components/input/update_at_input', [
                                                // 'updated_at' => $data->updated_at,
                                            ])


                                            <div class="mb-3 row">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">{{ __($data->Column_Title_Text['name']) }}</label>
                                                <div class="col-12 col-sm-9">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $data->name }}">
                                                </div>
                                            </div>



                                            <div class="mb-3 row">
                                                <label for="" class="col-12 col-sm-3 col-form-label pt-0">
                                                    {{ __($data->Column_Title_Text['password']) }}
                                                </label>
                                                <div class="col-12 col-sm-9">
                                                    <input type="password" class="form-control" name="password"
                                                        value="">
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label for="" class="col-12 col-sm-3 col-form-label pt-0">
                                                    {{ __($data->Column_Title_Text['email']) }}
                                                </label>
                                                <div class="col-12 col-sm-9">
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ $data->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 card-detail border-0">
                                        <div class="card-header border-0">
                                            <h5 class="card-title">{{ __('收信設定') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">訂單收信</label>
                                                <div class="col-12 col-sm-9 form-check-wrap">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="FlexRadio"
                                                            value="" id="FlexRadio1">
                                                        <label class="form-check-label" for="FlexRadio1">
                                                            是
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="FlexRadio"
                                                            value="" id="FlexRadio2">
                                                        <label class="form-check-label" for="FlexRadio2">
                                                            否
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="mb-3 row">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">庫存收信</label>
                                                <div class="col-12 col-sm-9 form-check-wrap">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="FlexRadio"
                                                            value="" id="FlexRadio1">
                                                        <label class="form-check-label" for="FlexRadio1">
                                                            是
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="FlexRadio"
                                                            value="" id="FlexRadio2">
                                                        <label class="form-check-label" for="FlexRadio2">
                                                            否
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 mb-6">

                                    @foreach ($groupItemPermission as $key => $value)
                                        <div class="card mb-3 card-detail border-0">
                                            <div class="card-header border-0 d-flex align-items-center">
                                                <h5 class="card-title">{{ $value['groupName'] }}</h5>
                                                <div
                                                    class="allselect-group button-group d-flex align-items-center ms-auto">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions_{{ $key }}"
                                                            id="inlineRadio1_{{ $key }}" value="1" checked>
                                                        <label class="form-check-label"
                                                            for="inlineRadio1_{{ $key }}">全選</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions_{{ $key }}"
                                                            id="inlineRadio2_{{ $key }}" value="0">
                                                        <label class="form-check-label"
                                                            for="inlineRadio2_{{ $key }}">取消全選</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($value['permissions'] as $permission)
                                                    <div class="mb-3 row">
                                                        <label for=""
                                                            class="col-12 col-sm-3 col-form-label pt-0">{{ $permission['label'] }}</label>
                                                        <div class="col-12 col-sm-9 form-check-wrap">
                                                            @foreach ($permission['actions'] as $action)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="{{ $action['key'] }}"
                                                                        name="{{ $action['key'] }}"
                                                                        {{ in_array($action['key'], $dataPermission->toArray()) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="{{ $action['key'] }}">
                                                                        {{ $action['label'] }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    <div class="btn-group ms-2">
                                        <a class="btn btn-light"
                                            href="{{ route('user_list') }}?{{ request()->getQueryString() }}">{{ __('回總覽') }}</a>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button type="submit" class="btn btn-primary">{{ __('儲存') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{--  --}}
@endsection

@section('BodyJavascript')
    <script>
        function selectGroup(item) {
            $('input[type=\'checkbox\']').prop('checked', '');
            item.permission_grouop_items.forEach(element => {
                $('input[name="' + element.perm_key + '"]').prop('checked', true);
                //
            });
        }
        let saveBtn = document.getElementById("saveBtn");
        saveBtn.onclick = function() {
            document.getElementById("subForm").submit();
        }
        let delBtn = document.getElementById("delBtn");
        delBtn.onclick = function() {
            let yes = confirm('你確定嗎？');
            let data = @json($data);
            let id = data.id;
            if (yes) {
                var postArray = [];
                let val = $(this).val();
                postArray["id_array[" + id + "]"] = id;
                postArray["_token"] = '{{ csrf_token() }}';
                //送出
                postForm('/operate/user/del?{{ request()->getQueryString() }}', postArray)
            }
        }
    </script>
@endsection

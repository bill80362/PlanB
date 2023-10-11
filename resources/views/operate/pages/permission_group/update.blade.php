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
                            <h2> {{ __('群組') }} {{ $Data->id ? __('修改') : __('新增') }}</h2>

                            @can('permission_group_delete')
                                @if ($Data->id)
                                    <div class="btn-group ms-2">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" id="delBtn" href="javascript:void(0)">
                                                {{ __('刪除') }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endcan
                            <div class="btn-group ms-2">
                                <a class="btn btn-light"
                                    href="{{ route('permission_group_list') }}?{{ request()->getQueryString() }}">
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

                                            <div class="mb-3 row">
                                                <label for="" class="col-12 col-sm-3 col-form-label pt-0">
                                                    {{ __($Data->Column_Title_Text['status']) }}
                                                </label>
                                                <div class="col-12 col-sm-9 form-check-wrap">
                                                    @foreach ($Data->statusText as $key => $value)
                                                        <div class="form-check form-check-inline">
                                                            <input {{ $Data->status == $key ? 'checked' : '' }}
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

                                            <div class="mb-3 row">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">{{ __($Data->Column_Title_Text['name']) }}</label>
                                                <div class="col-12 col-sm-9">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $Data->name }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 mb-6">

                                    @foreach ($GroupItemPermission as $key => $value)
                                        <div class="card mb-3 card-detail border-0">
                                            <div class="card-header border-0">
                                                <h5 class="card-title">{{ $value['groupName'] }}</h5>
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
                                                                        {{ in_array($action['key'], $DataPermission->toArray()) ? 'checked' : '' }}>
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
                                            href="{{ route('permission_group_list') }}?{{ request()->getQueryString() }}">{{ __('回總覽') }}</a>
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
            let data = @json($Data);
            let id = data.id;
            if (yes) {
                var postArray = [];
                let val = $(this).val();
                postArray["id_array[" + id + "]"] = id;
                postArray["_token"] = '{{ csrf_token() }}';
                //送出
                postForm('/operate/permission_group/del?{{ request()->getQueryString() }}', postArray)
            }
        }
    </script>
@endsection

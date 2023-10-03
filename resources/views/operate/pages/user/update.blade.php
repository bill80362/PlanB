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
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2>
                                    <a class="btn btn-primary mr-2"
                                        href="{{ route('user_list') }}?{{ request()->getQueryString() }}">
                                        < </a>
                                            {{ __('管理人管理') }} {{ $Data->id ? __('修改') : __('新增') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form method="post">
                            <input type="hidden" class="form-control" name="updated_at" value="{{ $Data->updated_at }}">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>{{ _('編號') }}:{{ $Data->id }}</div>
                                                <div>{{ _('最後更新時間') }}:{{ $Data->updated_at }}</div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @include('/operate/components/alert/error_message')
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>{{ __($Data->Column_Title_Text['name']) }}</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $Data->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __($Data->Column_Title_Text['password']) }}</label>
                                                        <input type="password" class="form-control" name="password"
                                                            value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __($Data->Column_Title_Text['email']) }}</label>
                                                        <input type="text" class="form-control" name="email"
                                                            value="{{ $Data->email }}">
                                                    </div>
                                                    <div class="form-group mb-5">
                                                        <label>{{ __($Data->Column_Title_Text['status']) }}</label>
                                                        <select class="form-control" name="status">
                                                            @foreach ($Data->statusText as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $Data->status == $key ? 'selected' : '' }}>
                                                                    {{ __($value) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- start --}}


                                                    @php
                                                        $mails = [
                                                            [
                                                                'label' => '訂單信件',
                                                                'actions' => [['key' => 'order1', 'label' => '新訂單通知'], ['key' => 'order2', 'label' => '到貨通知']],
                                                            ],
                                                            [
                                                                'label' => '庫存信件',
                                                                'actions' => [['key' => 'stock1', 'label' => '無庫存通知']],
                                                            ],
                                                        ];
                                                    @endphp

                                                    <div class="card card-outline mb-2">
                                                        <div class="card-header">
                                                            {{ __('收信功能') }}： (範本)
                                                        </div>
                                                        <div class="card-body">
                                                            @foreach ($mails as $mail)
                                                                <div class="card">
                                                                    <div class="card-header"
                                                                        id="heading_{{ $mail['label'] }}">
                                                                        <input class="form-check-input" type="checkbox">
                                                                        <span class="btn" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse_{{ $mail['label'] }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="heading_{{ $mail['label'] }}">
                                                                            {{ $mail['label'] }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="collapse show"
                                                                        id="collapse_{{ $mail['label'] }}"
                                                                        aria-labelledby="heading_{{ $mail['label'] }}"
                                                                        data-parent="#accordionclose" style="">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                @foreach ($mail['actions'] as $action)
                                                                                    <div class="col-3">
                                                                                        <div class="form-check">
                                                                                            {{-- <input class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="{{ $action['key'] }}"
                                                                                                name="{{ $action['key'] }}"
                                                                                                {{ in_array($action['key'], $DataPermission->toArray()) ? 'checked' : '' }}> --}}
                                                                                            <label
                                                                                                class="form-label form-check-label"
                                                                                                for="{{ $action['key'] }}">
                                                                                                {{ $action['label'] }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    {{-- end --}}


                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <button class="btn btn-sm btn-primary m-2" type="button"
                                                            onclick="$('input[type=\'checkbox\']').prop('checked', true);">{{ __('全部打勾') }}</button>
                                                    </div>
                                                    <div>
                                                        {{ __('選擇群組') }}：
                                                        @foreach ($PermissionGroups as $PermissionGroup)
                                                            <button class="btn btn-sm btn-secondary m-2" type="button"
                                                                onclick="selectGroup({{ json_encode($PermissionGroup) }})">{{ $PermissionGroup['name'] }}</button>
                                                        @endforeach
                                                    </div>
                                                    @foreach ($GroupItemPermission as $key => $value)
                                                        <div class="card card-outline mb-2">
                                                            <div class="card-header">
                                                                {{ $value['groupName'] }}
                                                            </div>
                                                            <div class="card-body">
                                                                @foreach ($value['permissions'] as $permission)
                                                                    <div class="card">
                                                                        <div class="card-header"
                                                                            id="heading_{{ $permission['label'] }}">
                                                                            <span class="btn" data-bs-toggle="collapse"
                                                                                data-bs-target="#collapse_{{ $permission['label'] }}"
                                                                                aria-expanded="true"
                                                                                aria-controls="heading_{{ $permission['label'] }}">
                                                                                {{ $permission['label'] }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="collapse show"
                                                                            id="collapse_{{ $permission['label'] }}"
                                                                            aria-labelledby="heading_{{ $permission['label'] }}"
                                                                            data-parent="#accordionclose" style="">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    @foreach ($permission['actions'] as $action)
                                                                                        <div class="col-3">
                                                                                            <div class="form-check">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    id="{{ $action['key'] }}"
                                                                                                    name="{{ $action['key'] }}"
                                                                                                    {{ in_array($action['key'], $DataPermission->toArray()) ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="form-label form-check-label"
                                                                                                    for="{{ $action['key'] }}">
                                                                                                    {{ $action['label'] }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">{{ __('送出') }}</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </script>
@endsection

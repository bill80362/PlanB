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
                                        href="{{ route('permission_group_list') }}?{{ request()->getQueryString() }}">
                                        < </a>
                                            {{ __('群組') }} {{ $Data->id ? __('修改') : __('新增') }}
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
                                                        <label>{{ __('狀態') }}</label>
                                                        <select class="form-control" name="show_flag">
                                                            {{-- name="{{ $item['id'] }}" --}}
                                                            @foreach ($Model->showFlagText as $value => $option)
                                                                <option value="{{ $value }}"
                                                                {{$Data->show_flag==$value?"selected":""}} >
                                                                    {{ $option }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>名稱</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $Data->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <button class="btn btn-sm btn-primary m-2" type="button"
                                                            onclick="$('input[type=\'checkbox\']').prop('checked', true);">全部打勾</button>
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
                                            <button type="submit" class="btn btn-primary">送出</button>
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
@endsection
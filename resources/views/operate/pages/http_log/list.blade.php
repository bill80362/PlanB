@extends('operate.layout._Empty')

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
                            <h2> @include('/operate/components/title/page_title')</h2>
                        </div>
                    </div>
                    <div class="white_card_body">
                        @include('/operate/components/alert/error_message')
                        {{-- 搜尋START --}}
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>{{ __('文字搜尋') }}</label>
                                    <div class="form-group">
                                        <div class="input-group input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control" name="filter_text_key">
                                                    <option value="">{{ __('不限制') }}</option>
                                                    <option value="type"
                                                        {{ request()->get('filter_text_key') == 'type' ? 'selected' : '' }}>
                                                        {{ __($Model->Column_Title_Text['type']) }}</option>
                                                    <option value="primary_key"
                                                        {{ request()->get('filter_text_key') == 'primary_key' ? 'selected' : '' }}>
                                                        {{ __($Model->Column_Title_Text['primary_key']) }}</option>
                                                    <option value="url"
                                                        {{ request()->get('filter_text_key') == 'url' ? 'selected' : '' }}>
                                                        {{ __($Model->Column_Title_Text['url']) }}</option>
                                                    {{-- <option value="event"
                                                        {{ request()->get('filter_text_key') == 'url' ? 'selected' : '' }}>
                                                        {{ __($Model->Column_Title_Text['event']) }}</option>
                                                    <option value="tags"
                                                        {{ request()->get('filter_text_key') == 'url' ? 'selected' : '' }}>
                                                        {{ __($Model->Column_Title_Text['tags']) }}</option> --}}
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" name="filter_text_value"
                                                value="{{ request()->get('filter_text_value') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>{{ __('排序') }}</label>
                                    <select class="form-control" name="order_by">
                                        <option value="id,desc">
                                            {{ __($Model->Column_Title_Text['id']) }}({{ __('反序') }})</option>
                                        <option value="id,asc">
                                            {{ __($Model->Column_Title_Text['id']) }}({{ __('正序') }})</option>
                                        <option value="created_at,desc">{{ __('建立時間') }}({{ __('反序') }})</option>
                                        <option value="created_at,asc">{{ __('建立時間') }}({{ __('正序') }})</option>
                                        <option value="updated_at,desc">{{ __('更新時間') }}({{ __('反序') }})</option>
                                        <option value="updated_at,asc">{{ __('更新時間') }}({{ __('正序') }})</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary">{{ __('搜尋') }}</button>
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ request()->url() }}">{{ __('取消') }}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- 搜尋END --}}

                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>

                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 表格 --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __($Model->Column_Title_Text['id']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['type']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['primary_key']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['status']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['status_code']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['connect_time']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['method']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['created_at']) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Paginator->items() as $Item)
                                        <tr>
                                            <td>{{ $Item->id }}</td>
                                            <td>{{ $Item->type }}
                                                <a class="btn btn-sm btn-primary"
                                                    href="/operate/http_log/{{ $Item->id }}?{{ request()->getQueryString() }}">{{ __('檢視') }}</a>
                                            </td>
                                            <td>{{ $Item->primary_key }}</td>
                                            <td>{{ $Item->status }}</td>
                                            <td>{{ $Item->status_code }}</td>
                                            <td>{{ $Item->connect_time }}</td>
                                            <td>{{ $Item->method }}</td>
                                            <td>{{ $Item->created_at->toDateTimeString() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @include('/operate/include/_PaginatorList')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Modal')
@endsection

@section('BodyJavascript')
@endsection

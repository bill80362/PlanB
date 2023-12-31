@if ($template == 'select2')
    <div class="form-group mb-3">
        <label>{{ __($columnName) }}</label>
        <select name="filter_{{ $column }}[]" class="select2bs5" multiple="multiple" style="width: 100%;">
            @foreach ((array) $model->{Str::camel($column) . 'Text'} as $key => $value)
                <option value="{{ $key }}"
                    {{ in_array($key, (array) request()->get('filter_' . $column)) ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
@elseif($template == 'rangeDate')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ __($columnName) }}</label>
        <div class="input-group">
            <input type="date" class="form-control" name="filter_{{ $column }}_start"
                value="{{ request()->get('filter_' . $column . '_start') }}">
            <span class="input-group-text">~</span>
            <input type="date" class="form-control" name="filter_{{ $column }}_end"
                value="{{ request()->get('filter_' . $column . '_end') }}">
        </div>
    </div>
@elseif($template == 'radio')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ __($columnName) }}</label>
        <div class="form-check-wrap">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"name="filter_{{ $column }}[]"
                    {{ count(array_filter((array) request()->get('filter_' . $column))) == 0 ? 'checked' : '' }}
                    value="" id="FlexRadio1">
                <label class="form-check-label" for="FlexRadio1">
                    {{ __('不限制') }}
                </label>
            </div>

            @foreach ((array) $model->{Str::camel($column) . 'Text'} as $key => $value)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="filter_{{ $column }}[]"
                        value="{{ $key }}" id="FlexRadio2-{{ $key }}"
                        {{ in_array($key, (array) request()->get('filter_' . $column)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="FlexRadio2-{{ $key }}">
                        {{ $value }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@elseif($template == 'checkbox')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ __($columnName) }}</label>
        <div class="form-check-wrap">
            @foreach ((array) $model->{Str::camel($column) . 'Text'} as $key => $value)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="filter_{{ $column }}[]"
                        {{ in_array($key, (array) request()->get('filter_' . $column)) ? 'checked' : '' }}
                        value="{{ $key }}" id="checkbox-{{ $key }}">
                    <label class="form-check-label" for="checkbox-{{ $key }}">
                        {{ $value }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@elseif($template == 'selectAndInput')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ __($columnName) }}</label>
        <div class="input-group">
            <select class="form-select" name="filter_{{ $column }}_type">
                <option selected>{{ __('請選擇') }}</option>
                <option value="1" {{ '1' == request()->get("filter_{$column}_type") ? 'selected' : '' }}>
                    {{ __('小於') }}</option>
                <option value="2" {{ '2' == request()->get("filter_{$column}_type") ? 'selected' : '' }}>
                    {{ __('等於') }}</option>
                <option value="3" {{ '3' == request()->get("filter_{$column}_type") ? 'selected' : '' }}>
                    {{ __('大於') }}</option>
            </select>
            <input type="number" class="form-control" name="filter_{{ $column }}_value"
                value="{{ request()->get("filter_{$column}_value") }}">
        </div>
    </div>
@elseif($template == 'rangeDateTime')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ __($columnName) }}</label>
        <div class="input-group">
            <input type="datetime-local" class="form-control" name="filter_{{ $column }}_start"
                value="{{ request()->get('filter_' . $column . '_start') }}">
            <span class="input-group-text">~</span>
            <input type="datetime-local" class="form-control" name="filter_{{ $column }}_end"
                value="{{ request()->get('filter_' . $column . '_end') }}">
        </div>
    </div>
@elseif($template == 'text')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ __($columnName) }}</label>
        <div class="input-group">
            <input type="text" class="form-control" name="filter_{{ $column }}"
                   value="{{ request()->get("filter_{$column}") }}">
        </div>
    </div>
@endif

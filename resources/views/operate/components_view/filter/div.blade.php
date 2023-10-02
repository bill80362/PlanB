@if ($template == 'select2')
    <div class="form-group">
        <label>{{ $model->Column_Title_Text[$column] ?? $column }}</label>
        <select name="filter_{{ $column }}[]" class="select2bs5" multiple="multiple" style="width: 100%;">
            @foreach ((array) $model->{$column . 'Text'} as $key => $value)
                <option value="{{ $key }}"
                    {{ in_array($key, (array) request()->get('filter_' . $column)) ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
@elseif($template == 'rangeDate')
    <div class="form-group mb-3">
        <label class="form-label d-block">{{ $model->Column_Title_Text[$column] ?? $column }}</label>
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
        <label class="form-label d-block">{{ $model->Column_Title_Text[$column] ?? $column }}</label>
        <div class="form-check-wrap">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"name="filter_{{ $column }}[]"
                    {{ count((array) request()->get('filter_' . $column)) == 0 ? 'checked' : '' }} value=""
                    id="FlexRadio1">
                <label class="form-check-label" for="FlexRadio1">
                    {{ __('不限制') }}
                </label>
            </div>

            @foreach ((array) $model->{$column . 'Text'} as $key => $value)
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
@endif

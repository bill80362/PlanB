<th class="{{$className}}"
    data-column="{{$column}}"
    onclick="{{$clickString}}" 
    @style($styleSetting)
    >
    {{__($model->Column_Title_Text[$column] ?? $column)}}
</th>

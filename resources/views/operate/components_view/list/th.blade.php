<th class="{{$className}}"
    data-column="{{$column}}"
    onclick="{{$clickString}}" >
    {{__($model->Column_Title_Text[$column]??$column)}}
</th>

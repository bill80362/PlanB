@extends('operate.layout._Master')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __($key) }}</h1>
                </div>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('/operate/components/alert/error_message')
                @include('/operate/components/alert/info')
                <div class="mb-5"></div>
                <form method="POST" action="">
                    <input type="hidden" name="key" value="{{ $key }}">
                    @foreach ($datas as $data)
                        <div class="col-12">
                            <h4> {{ $data->page_name }} ({{ $langTypeText[$data->lang_type] }})</h4>
                        </div>
                        <div class="col-12 mb-5">
                            @csrf
                            @include('operate.components.editor.ckeditor', [
                                'defaultValue' => $data->content,
                                'id' => "editor_{$data->lang_type}",
                                'name' => 'editors[]',
                                'height' => '400px',
                            ])
                            <input type="hidden" name="ids[]" value="{{ $data->id }}">
                        </div>
                    @endforeach

                    <div class="card-footer text-center">
                        @can($key . '_update')
                            <button type="submit" class="btn btn-primary">{{ __('送出') }}</button>
                        @endcan

                    </div>
                </form>


            </div>

        </div>
    </div>
@endsection

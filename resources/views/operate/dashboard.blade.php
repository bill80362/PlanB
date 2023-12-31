@extends('operate.layout._Empty')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">B計畫</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div id="editor"></div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('BodyJavascript')
    <script>
        // console.log("{{__('儀表板')}}")
        // console.log("{{__('儀表板1')}}")
        ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
                toolbar: {
                    items: [
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'code', 'subscript', 'superscript',
                        '|',
                        'bulletedList', 'numberedList', '|',
                        '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'codeBlock', 'htmlEmbed',
                        '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing', 'fullscreen'
                    ],
                    shouldNotGroupWhenFull: true
                },
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

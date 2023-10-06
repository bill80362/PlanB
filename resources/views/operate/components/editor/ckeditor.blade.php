<textarea id="{{ $id }}" name="{{ $name }}">{{ $defaultValue }}</textarea>

<style>
    .ck-editor__editable_inline {
        min-height: {{ $height }};
    }
</style>

<script>
    // https://ckeditor.com/docs/ckeditor5/latest/features/html/general-html-support.html

    ClassicEditor
        .create(document.querySelector('#' + "{{ $id }}"), {
            extraPlugins: [MyCustomUploadAdapterPlugin],
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true,
                }],
                disallow: [{
                    name: /^(script)$/, //是否允語使用script語法
                }]
            },
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
                    '|', 'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'sourceEditing', '|', 'fullscreen'
                ],
                shouldNotGroupWhenFull: true
            },
        })
        .then(editor => {
            window.editor[{{ $index ?? '1' }}] = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>

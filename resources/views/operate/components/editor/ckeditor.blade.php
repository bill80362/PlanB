<textarea id="{{ $id }}" name="{{ $name }}">{{ $defaultValue }}</textarea>

<style>
    .ck-editor__editable_inline {
        min-height: {{ $height }};
    }
</style>

<script>
    ClassicEditor
        .create(document.querySelector('#' + "{{ $id }}"), {
            extraPlugins: [MyCustomUploadAdapterPlugin],
            // toolbar: {
            //     items: [
            //         'findAndReplace', 'selectAll', '|',
            //         'heading', '|',
            //         'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
            //         'removeFormat', '|',
            //         'bulletedList', 'numberedList', 'todoList', '|',
            //         'outdent', 'indent', '|',
            //         'undo', 'redo',
            //         '-',
            //         'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
            //         'alignment', '|',
            //         'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
            //         '|',
            //         'specialCharacters', 'horizontalLine', 'pageBreak', '|',
            //         'textPartLanguage', '|',
            //         'sourceEditing'
            //     ],
            //     shouldNotGroupWhenFull: true
            // },
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
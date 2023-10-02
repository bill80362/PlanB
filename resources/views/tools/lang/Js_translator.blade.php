@inject('jsTranslator', 'App\Tools\Lang\JsTranslator')

<script>
    function $trans(key) {
        let lang = @json($jsTranslator->getJsLang());
        return lang[key];
    }
</script>

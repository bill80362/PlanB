@inject('jsTranslator', 'App\Tools\Lang\JsTranslator')

<script>
    function $trans(key) {
        let lang = @json($jsTranslator->getJsLang());
        if (lang[key]) {
            return lang[key];
        } else {
            // "沒有語系" + key
            return key;
        }
    }
</script>

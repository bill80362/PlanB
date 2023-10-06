@inject('SystemConfigService', 'App\Services\Operate\SystemConfigService')

@include('/operate/include/_Aside')

@yield('Content')

@include('/operate/components/alert/error_message')
{{-- 彈出視窗 --}}
@yield('Modal')

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

@yield('BodyJavascript')

{{--會有字串過長問題，被截斷，無法render() --}}
{{--@php echo app(\Barryvdh\Debugbar\Facades\Debugbar::class)::render(); @endphp--}}

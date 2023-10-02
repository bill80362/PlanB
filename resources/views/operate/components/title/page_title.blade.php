@inject('menuService', 'App\Services\Operate\MenuService')


@php
    // $breadCrumbs = $menuService->getCurrentBreadCrumbs();
    $path = $menuService->getCurrentLastMenu();
@endphp


{{-- @foreach ($breadCrumbs as $key => $breadCrumb)
    @if ($key != 0)
        =>
    @endif
    {{ $breadCrumb }}
@endforeach --}}


<h2>{{ $path['name'] }}</h2>

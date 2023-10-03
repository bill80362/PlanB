{{-- @inject('menuService', 'App\Services\Operate\MenuService') --}}

{{ __(app("App\Services\Route\RouteTitle")->getTitle(request()->route()->getName())) }}

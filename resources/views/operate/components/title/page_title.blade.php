{{-- @inject('menuService', 'App\Services\Operate\MenuService') --}}

<h2>{{ __(app("App\Services\Route\RouteTitle")->getTitle(request()->route()->getName())) }}</h2>

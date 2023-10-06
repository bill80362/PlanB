<?php

namespace App\Http\Middleware;

use App\Services\Operate\SystemConfigService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterTags
{
    public function __construct(
        protected SystemConfigService $oSystemConfigService
    ) {}
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //後台是否開啟
        $values = $this->oSystemConfigService->SystemConfigKeyValue;
        if($values["filter_css_js"]=="N") return $next($request);
        //條件過濾
        $userInput = $request->all();
        array_walk_recursive($userInput, function (&$userInput) {
            $userInput = $this->filterTags($userInput);
        });
        $request->merge($userInput);
        return $next($request);
    }

    public function filterTags($str){
//        $str = preg_replace("/\s+/", " ", $str); //过滤多余回车
        $str = preg_replace("/<[ ]+/si", "<", $str); //过滤<__("<"号后面带空格)

        $str = preg_replace("/<\!--.*?-->/si", "", $str); //注释
        $str = preg_replace("/<(\!.*?)>/si", "", $str); //过滤DOCTYPE
        $str = preg_replace("/<(\/?html.*?)>/si", "", $str); //过滤html标签
        $str = preg_replace("/<(\/?head.*?)>/si", "", $str); //过滤head标签
        $str = preg_replace("/<(\/?meta.*?)>/si", "", $str); //过滤meta标签
        $str = preg_replace("/<(\/?body.*?)>/si", "", $str); //过滤body标签
        $str = preg_replace("/<(\/?link.*?)>/si", "", $str); //过滤link标签
        $str = preg_replace("/<(\/?form.*?)>/si", "", $str); //过滤form标签
        $str = preg_replace("/cookie/si", "COOKIE", $str); //过滤COOKIE标签

        $str = preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si", "", $str); //过滤applet标签
        $str = preg_replace("/<(\/?applet.*?)>/si", "", $str); //过滤applet标签

        $str = preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si", "", $str); //过滤style标签
        $str = preg_replace("/<(\/?style.*?)>/si", "", $str); //过滤style标签

        $str = preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si", "", $str); //过滤title标签
        $str = preg_replace("/<(\/?title.*?)>/si", "", $str); //过滤title标签

        $str = preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si", "", $str); //过滤object标签
        $str = preg_replace("/<(\/?objec.*?)>/si", "", $str); //过滤object标签

        $str = preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si", "", $str); //过滤noframes标签
        $str = preg_replace("/<(\/?noframes.*?)>/si", "", $str); //过滤noframes标签

        $str = preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si", "", $str); //过滤frame标签
        $str = preg_replace("/<(\/?i?frame.*?)>/si", "", $str); //过滤frame标签

        $str = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si", "", $str); //过滤script标签
        $str = preg_replace("/<(\/?script.*?)>/si", "", $str); //过滤script标签
        $str = preg_replace("/javascript/si", "Javascript", $str); //过滤script标签
        $str = preg_replace("/vbscript/si", "Vbscript", $str); //过滤script标签
        $str = preg_replace("/on([a-z]+)\s*=/si", "nOn\\1=", $str); //过滤script标签
        $str = preg_replace("/([style]+)\s*=/si", "nStyle\\1=", $str); //过滤style标签
        $str = preg_replace("/&#/si", "&＃", $str); //过滤script标签，如javaScript:alert(

        return $str;
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use DOMDocument;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XSS
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userInput = $request->all();
        array_walk_recursive($userInput, function (&$userInput) {
//            $userInput = strip_tags($userInput,["style"]);
            $userInput = $this->stripUnwantedTagsAndAttrs($userInput);

        });
        $request->merge($userInput);
        return $next($request);
    }

    public function stripUnwantedTagsAndAttrs($html_str): bool|string
    {
        $xml = new DOMDocument();
        //Suppress warnings: proper error handling is beyond scope of example
        libxml_use_internal_errors(true);
        $allowed_tags = array("html", "body", "b", "br", "em", "hr", "i", "li", "ol", "p", "s", "span", "table", "tr", "td", "u", "ul");
        $allowed_attrs = array ("class", "id", "style");
        if (!strlen($html_str)){return false;}
        if ($xml->loadHTML($html_str, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD)){
            foreach ($xml->getElementsByTagName("*") as $tag){
                if (!in_array($tag->tagName, $allowed_tags)){
                    $tag->parentNode->removeChild($tag);
                }else{
                    foreach ($tag->attributes as $attr){
                        if (!in_array($attr->nodeName, $allowed_attrs)){
                            $tag->removeAttribute($attr->nodeName);
                        }
                    }
                }
            }
        }
        return $xml->saveHTML();
    }
}

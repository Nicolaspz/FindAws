<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizationLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*$language = explode(',',$request->server('HTTP_ACCEPT_LANGUAGE'));
        //dd($language);
        if($language != null){
             App::setLocale($language[2]);
        }
        else{
            App::setLocale('en');
        }
*/
        // Obtém o idioma da sessão ou usa 'en' por padrão
        $language = $request->session()->get('locale', 'pt');
        //dd($language);
        // Define a localidade
        App::setLocale($language);

        return $next($request);

        return $next($request);
    }
}

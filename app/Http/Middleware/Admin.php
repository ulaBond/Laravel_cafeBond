<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**Handle an incoming request.     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        //для пользователя с ролью admin открываем доступ к функционалу
        //если роль пользователя НЕ admin - отправим на страницу dashboard
        if ($user && $user->role === 'admin'){
            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}

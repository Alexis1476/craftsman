<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('webadmin')->check()) {
            return redirect(route('login'))->withErrors([
                'login' => 'Vous devez vous connecter pour voir cette page'
            ]);
        }
        $admin = auth()->guard('webadmin')->user();
        if ($admin->right === 0) {
            /* Si l'utilisateur est un apprenti, il ne peut pas modifier
            son mot de passe ou ajouter une activité*/
            if ($request->route()->named('admin.modify', 'admin.addActivity', 'admin.activityDelete')) {
                return redirect(route('home'));
            }
        }
        return $next($request);
    }
}

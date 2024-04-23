<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;



class AdminMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = $request->user();
        $redirectTo = 'home'; // Redirection par défaut

        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                // Définissez les redirections en fonction du rôle
                switch ($role) {
                    case 'admin':
                        $redirectTo = '/admin/dashboard';
                        break;
                    case 'user':
                        $redirectTo = '/user/home';
                        break;
                    // Ajoutez d'autres rôles et redirections au besoin
                }

                // Redirigez immédiatement si le rôle correspond
                return redirect($redirectTo);
            }
        }

        // Si aucun rôle ne correspond, continuez avec la demande ou redirigez comme nécessaire
        return $next($request);
    }
}

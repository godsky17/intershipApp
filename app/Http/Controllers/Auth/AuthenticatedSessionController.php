<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
use PhpParser\Node\Stmt\Return_;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        // return Inertia::render('Auth/Login', [
        //     'canResetPassword' => Route::has('password.request'),
        //     'status' => session('status'),
        // ]);

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        if($request->role == "admin")
        {
            try {
                
                $credentials = $request->only('email', 'password');
                if(!Auth::guard('admin')->attempt($credentials)){
                    return back()->withErrors([
                        'email' => "Les informations d'identification sont incorrectes"
                    ]);
                };
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard', absolute: false));

            } catch (Exception $e) {

                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
        }else{
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(route('stagiaireDashboard', absolute: false));
        }

        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

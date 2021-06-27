<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Webpatser\Uuid\Uuid;

class SignInWithProviderController extends Controller
{

    private function authenticate(User $user) {
        Auth::login($user, true);
        return redirect(route("dashboard"));
    }

    private function LoginFakeUser() {
        $user = User::first();
        if ($user === null) {
            $user = User::firstOrCreate([
                "apple_id" => Uuid::generate(4)
            ]);
        }
        return $this->authenticate($user);
    }

    public function RedirectToAppleLogin(Request $request) {
        $host = Str::of($request->server->get("HTTP_HOST"));
        if (env('APP_ENV') === "testing" ||
            (env('APP_ENV') === "local"
                && $host->endsWith(".test"))) {
            return $this->LoginFakeUser();
        }
        return Socialite::driver('apple')
            ->scopes(["name", "email"])
            ->redirect();
    }



    public function SignInWithApple() {
        $auth = Socialite::driver('apple')->user();

        $user = User::firstOrNew([
           "apple_id" => $auth->getId()
        ]);
        $user->apple_email = $auth->getEmail();
        $user->save();
        return $this->authenticate($user);
    }

}

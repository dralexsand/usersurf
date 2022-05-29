<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('report')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("report")->withSuccess('You have signed-in');
    }

    /**
     * @param array $data
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function report()
    {
        if (Auth::check()) {
            return view('vue.index');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }


}

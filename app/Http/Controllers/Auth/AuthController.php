<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Illuminate\Log\log;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    // Register User
    public function register(Request $request)
    {
       log('Registering user', ['request' => $request->all()]); 
        $validator = Validator::make($request->all(), [
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|min:6|confirmed',
            'profile_img'    => 'nullable|string',
            'mobile_number'  => 'nullable|string|max:15',
            'if_user_is_prime' => 'nullable|boolean|default:false',
            'pancard'        => 'nullable|string',
            'stats'          => 'nullable|json'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'profile_img'      => $request->profile_img,
            'mobile_number'    => $request->mobile_number,
            'if_user_is_prime' => $request->if_user_is_prime??false,
            'pancard'          => $request->pancard,
            'stats'            => $request->stats,
        ]);
        if($user) {
            return redirect()->back()->with('success', 'User registered successfully');
        } else {
            log('User registration failed');
            return response()->json(['error' => 'User registration failed'], 500);
        } 

        
    }

// Login User
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Regenerate session to prevent fixation
        $request->session()->regenerate();
        session()->put('user', Auth::user());

        // Check if session is correctly set
        if (session()->has('user')) {
            return redirect()->route('dashboard.admindashboard')
                ->with('message', 'Login successful');
        } else {
            return redirect()->back()->withErrors([
                'session' => 'Login successful, but session could not be set',
            ])->withInput();
        }
    }

    return redirect()->back()->withErrors([
        'email' => 'Login failed: incorrect email or password',
    ])->withInput();
}

}

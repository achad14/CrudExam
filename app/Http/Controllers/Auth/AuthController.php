<?php
 namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
 
class AuthController extends Controller
{
    // code login method
    public function index()
    {
        return view('auth.login');
    }
    // code registration method
    public function registration()
    {
        return view('auth.registration');
    }
 
    // code action login method
    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->withSuccess('Please enter valid credentials');
    }
 
    // code action registration method
    public function actionRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('You have Successfully logged-in');
    }
 
    // code dashboard method
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You do not have access');
    }
 
    // code create method
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
 
    // code logout method
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
 
 
?>

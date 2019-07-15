<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('list','form','create','delete','update','form','onesearch');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function showRegistrationForm()
    {
        return "register";
        return view('auth.register');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     public function list()
     {
          $usuarios = DB::table('users')
                          ->join('role_user', 'users.id', '=', 'role_user.user_id')
                          ->join('roles', 'roles.id', '=', 'role_user.role_id')
                         ->select('users.id','users.name','users.email','roles.description','users.created_at')
                         ->orderBy('users.updated_at','desc')
                         ->get();

          // dd($usuarios);
          return view('Backend.usuarios',['usuarios'=>$usuarios]);
     }
     public function form()
     {

        $perfiles = Role::pluck('description','id');
         return view('auth.register',['perfiles'=>$perfiles]);
     }
    protected function create(Request $request)
    {        
      // dd($data);
            $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $user->roles()
            ->attach(Role::where('id', $request['role_id'])->first());

            return redirect()->route("verusuarios");
    }
    public function onesearch($id)
    {
        $user = DB::table('users')
                  ->join('role_user', 'role_user.user_id', '=', 'users.id')
                  ->select('users.id','users.name','users.email','role_user.role_id')
                  ->where('users.id', $id)
                  ->first();
                    $perfiles = Role::pluck('description','id');
        if (!$user){
          return view('Backend.index');
        }
        else{
          return view('auth.formuser',['usuario'=>$user,'perfiles'=>$perfiles]);
        }

    }
    public function update(Request $request, $id)
    {
      $user = DB::table('users')
                ->where('id', $id)
                ->first();

      if (!$user){
        return view('Backend.index');
      }
      else{
            $user = User::find($id)
                        ->fill($request->input());
            $user->save();
            $user = DB::table('role_user')
                      ->where('user_id', $user->id)
                      ->update(['role_id'=>$request["role_id"]]);
          return redirect()->route("verusuarios");
       }
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route("verusuarios");
    }
    public function formu()
    {
        return view('auth.formuser');
    }
}

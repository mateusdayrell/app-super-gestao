<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index (Request $request) {

        $error = '';

        if ($request->get('error')  == 1){
            $error =  'Usuário e/ou senha inválidos';
        } 
        else if ($request->get('error')  == 2){
            $error =  'Realize o login para ter acesso à página';
        }

        return view ('site.login', ['error' => $error]);
    }

    public function autenthicate (Request $request) {

        //Validation rules        
        $rules = [
            'user' => 'required|email',
            'password' => 'required'
        ];

        $feedback = [
            'user.required' => 'O campo usuário é obrigatório',
            'user.email' => 'E-mail inválido',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($rules, $feedback);

        //Get parameters
        $email = $request->get('user');
        $password = $request->get('password');

        //Init UserModel
        $modelUser = new User();

        //Verify on database
        $user = $modelUser->where('email', $email)
                       ->where('password', $password)
                       ->get()
                       ->first();

        if(isset($user->name)){
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    public function logOut () {
        session_destroy();
        return redirect()->route('site.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Core\Constants\SessionConstants;
use App\Core\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function login(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->pw
        ];
        if (Auth::attempt($login)) {
            $user = Auth::user();
            Session::put(SessionConstants::USER, $user);
            echo '<script>alert("Đăng nhập thành công.");window.location.assign("/");</script>';
        } else {
            echo '<script>alert("Đăng nhập thất bại.");window.location.assign("login");</script>';
        }
    }
    public function logout()
    {
        Session::forget(SessionConstants::USER);
        Session::forget(SessionConstants::CART);
        return redirect('/');
    }
    public function Register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        $input['password'] = bcrypt($input['password']);
        User::create($input);
        Mail::send($request->email, Mail::CREATE_NEW_ACCOUNT_SUBJECT, view("mails.new-account", ["user" => $request->name, "password" => $request->password]));
        echo '<script>alert("Đăng ký thành công. Vui lòng đăng nhập.");window.location.assign("login");</script>';
    }
    public function resetPassword(Request $request) {
        $request->validate([
            "email" => "required|exists:App\Models\User,email"
        ], [
            "email.required" => "Bạn chưa nhập email!",
            "email.exists" => "Email chưa đăng kí tài khoản!"
        ]);
        $user = User::where("email", $request->email)->first();
        $user->reset_password_token = Str::random(50);
        $user->save();

        Mail::send($user->email, Mail::RESET_PASSWORD_SUBJECT, view("mails.reset-password", ["user" => $user->name, "resetPwdToken" => $user->reset_password_token])->render());
        echo "<script>alert('Vui lòng check email!');window.location.assign('/login')</script>";
    }
    public function verifyResetPwdRequest(Request $request) {
        if (empty($request->token)) {
            return view("users.reset-password");
        }
        $user = User::where("reset_password_token", $request->token)->first();
        if ($user == null) {
            return redirect("/");
        }
        $user->reset_password_token = "";
        return view("users.update-password", ["email" => $user->email]);
    }
    public function updatePassword(Request $request) {
        $request->validate([
            "password" => "required",
            "re-password" => "same:password"
        ], [
            "password.required" => "Bạn chưa nhập mật khẩu mới!",
            "re-password.same" => "Mật khẩu không khớp!"
        ]);

        $user = User::where("email", $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        echo "<script>alert('Đổi mật khẩu thành công!');window.location.assign('/login')</script>";
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Core\Constants\SessionConstants;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {
  public function login(Request $request) {
    $request->validate([
      "email" => "required|exists:App\Models\User,email",
      "password" => "required"
    ], [
      "email.required" => "Email không được để trống!",
      "email.exists" => "Email không tồn tại!",
      "pasword.required" => "Mật khẩu không được để trống!"
    ]);

    $admin = User::where("email", $request->email)->where("role", "admin")->first();
    if ($admin == null) {
      return view("admin.login", ["errorMsg" => "Email không tồn tại!"]);
    }
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      Session::put(SessionConstants::ADMIN, $admin);
      return redirect()->route("adminIndex");
    }
    return view("admin.login", ["errorMsg" => "Mật khẩu sai!!"]);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Admin Login</title>
		<style>
				body {
						height: 100vh;
						width: 100vw;
				}
        .row {
          display: flex;
          flex-direction: row;
          justify-content: space-evenly;
          align-items: center;
          height: 100%;
        }
        input, .error {
          margin-bottom: 1rem
        }
        input[type="text"], input[type="password"] {
          line-height: 2rem;
          padding: 0 1rem;
          border: 1px black solid;
        }
        .error {
          color: red;
        }
        button {
          padding: 0.5rem 1rem;
          font-size: 1.3rem;

        }
        .btn-login {
          text-align: center;
        }
		</style>
</head>

<body>
		<div class="row">
				<div class="title">
						<h1>Đăng nhập <br/>với tư cách ADMIN</h1>
				</div>
				<div class="login-section">
						<form action="{{ route('adminLogin') }}" method="post">
								@csrf
                <input type="text" name="email" placeholder="Nhập admin email..."><br/>
                @error("email")
                  <div class="error">{{$message}}</div>
                @enderror 
                <input type="password" name="password" placeholder="Nhập password..."><br/>
                @error("password")
                  <div class="error">{{$message}}</div>
                @enderror
                @if (isset($errorMsg)) <div class="error">{{$errorMsg}}</div> @endif
                <div class="btn-login">
                  <button type="submit">Login</button>
                </div>
						</form>
				</div>
		</div>
</body>

</html>

@extends('layouts.master')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 50vh">
        <div class="w-50">
            <form action="{{ route('resetPassword') }}" method="post">
                @csrf
                <input type="text" class="form-control" name="email" placeholder="Nhập email để lấy lại mật khẩu...">
                @error('email')
                    <div class="text-center text-danger mt-3">{{$message}}</div>
                @enderror
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Send request to email</button>
                </div>
            </form>
        </div>
    </div>
@endsection

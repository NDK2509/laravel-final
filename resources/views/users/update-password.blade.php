@extends('layouts.master')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 50vh">
        <div class="w-50">
            <form action="{{ route('updatePassword') }}" method="post">
                <input type="hidden" name="email" value="{{$email}}">
                @csrf
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới...">
                @error('password')
                    <div class="text-center text-danger mt-3">{{$message}}</div>
                @enderror
                <input type="password" class="form-control mt-3" name="re-password" placeholder="Nhập lại mật khẩu...">
                @error('re-password')
                    <div class="text-center text-danger mt-3">{{$message}}</div>
                @enderror
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Send request to email</button>
                </div>
            </form>
        </div>
    </div>
@endsection
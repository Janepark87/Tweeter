@extends('layouts.master')

@section('sign')
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <div class="text-center d-flex align-items-center mb-3">
                <a href="{{ url()->previous() }}" class="h4 text-dark pull-left"><i class="fa fa-angle-left"></i></a>
                <p class="h3 d-inline mx-auto py-3">Log-In to Bowwow</p>
            </div>

            <form action="/login" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email" class="sr-only">Email Address:</label>
                    <input type="text" name="email" id="email" value="{{  old('email')  }}" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">Log In</button>
                </div>

                {{-- 빈칸을 잘 채웠는지 아닌지 체크하는 것.validation --}}
                @include('layouts.errors')
            </form>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <p class="p-title h3 text-white d-block d-sm-none">Log-In</p>
    </div>
@endsection

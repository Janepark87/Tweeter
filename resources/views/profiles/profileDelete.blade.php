@extends('layouts.master')

@section('content')
    <div class="container">
        <p class="p-title h3 text-white d-block d-sm-none">My Profile</p>
    </div>
@endsection

@section('editprofile')
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <a href="{{ url()->previous() }}" class="h4 pl-2 ml-auto text-dark"><i class="fa fa-angle-left"></i></a>

        <div class="col-md-8 offset-md-2 text-center p-3">
            <h4>Are you sure you want to deactivate your account ??</h4>
            <p class="text-muted py-3">You’re about to start the process of deactivating your BowWow account. Your display name, and public profile will no longer be viewable on bowwow.com.</p>

            <div class="mt-4">
                <form action="/profile/{{ Auth::user()->id }}" method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}

                    <div class="form-group">
                        <button class="btn btn-danger btn-sm" type="submit">Deactivate your Account</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

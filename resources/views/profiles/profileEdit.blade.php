@extends('layouts.master')

@section('content')
    <div class="container">
        <p class="p-title h3 text-white d-block d-sm-none">My Profile</p>
    </div>
@endsection

@section('editprofile')
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <a href="{{ url()->previous() }}" class="h4 pl-2 ml-auto text-dark"><i class="fa fa-angle-left"></i></a>

        <form  enctype="multipart/form-data" action="/profile/{{ Auth::user()->id }}/update" method="POST" class="m-auto text-center">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="row">
                <div class="col-md-4 p-5">
                    <div class="d-flex flex-column text-center">
                        <img src="/img/saveImg/{{ Auth::user()->avatar }}" alt="Avatar" class="avatar m-auto">
                        <small class="d-block text-muted my-3">Upload a different photo..</small>

                        <div class="custom-file mt-3">
                            <input type="file" name="avatar" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 p-5 personal-info">
                    <div class="form-group row border-bottom">
                        <h3 class="pull-left py-3">{{ Auth::user()->name }}'s Infomation</h3>
                    </div>

                    <div class="form-group row mt-5">
                        <label class="d-none d-md-block col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="First and Lsat name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="d-none d-md-block col-md-2 col-form-label">Bio</label>
                        <div class="col-md-10">
                            <textarea type="text" name="bio" class="form-control" placeholder="Add a bio to your profile">{{ Auth::user()->bio }}</textarea>
                        </div>
                    </div>

                    <div class="row mt-3 pr-3">
                        <button type="submit" class=" btn btn-primary btn-sm ml-auto">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="col-md-8 offset-md-2 text-center p-3">
            <h4>This will deactivate your account</h4>
            <small class="text-muted">You're about to start the process of deactivating your BowWow account.</small>

            <div class="mt-4">
                <a href="/profile/{{ Auth::user()->id }}/delete" class="btn btn-danger btn-sm"> Deactivate your Account</a>
            </div>

        </div>
    </div>

@endsection

@extends('admin.layouts.master')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.index')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
            </div>
            <div class="section-body">
            <h2 class="section-title">Hi, {{Auth::user()->name}} </h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.profile.update' , Auth::user()->id)}}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                            @csrf
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-12">
                                    <div >
                                        <img class="rounded rounded-circle" height="100px" width="100px" src="{{asset(Auth::user()->image)}}" alt="">
                                    </div>
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" >
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required="">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-7">

                    <div class="card">
                        <form method="post" action="{{route('admin.profile.update.password' , Auth::user()->id)}}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                            @csrf
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Current Password</label>
                                    <input type="password" value="{{old('current_password')}}" name="current_password" class="form-control" >
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>New Password</label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" >
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" >
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
            </div>
        </section>
    </div>
@endsection

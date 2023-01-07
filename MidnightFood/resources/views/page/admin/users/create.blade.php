@extends('layout.admin')

@section('title')
<x-AdminBreadcrumb page="Manages Staff" path="" />
@endsection

@section('body')
<div class="page-content">
   <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Create a new staff</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('staffs.create') }}" method="POST" class="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="first-name-column">First Name</label>
                                            <input required maxlength="20" type="text" id="first-name-column" class="form-control" name="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="last-name-column">Last Name</label>
                                            <input required maxlength="30" type="text" id="last-name-column" class="form-control" name="lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="city-column">Phone</label>
                                            <input pattern="(\+84|0)\d{9,10}" maxlength="10" minlength="10" required type="text" id="phone" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="first-name-column">Email</label>
                                            <input required type="email" id="first-name-column" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="city-column">Address</label>
                                            <textarea required name="address" maxlength="255" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div><hr/>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="first-name-column">Username</label>
                                            <input required maxlength="20" type="text" id="first-name-column" class="form-control" name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="last-name-column">Password</label>
                                            <input required maxlength="20" type="text" id="last-name-column" class="form-control" name="password">
                                        </div>
                                    </div>
                                    @error('username')
                                        <div class="col-md-6 col-12 text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="col-12 d-flex justify-content-end mt-2">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a onclick="location.reload();" type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<a href="{{ route('staffs.index') }}" class="text-light"><div class="fab back">
    <i class="bi bi-arrow-bar-left"></i>
</div></a>
@endsection

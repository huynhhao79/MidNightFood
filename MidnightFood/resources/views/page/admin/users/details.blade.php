@extends('layout.admin')

@section('title')
   <x-AdminBreadcrumb page="Manages Staff" path=""/>
@endsection

@section('body')
<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Personal information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $staff->fullname }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $staff->email }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $staff->phone }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $staff->address }}</label>
                                        </div>

                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Account information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $staff->username }}</label>
                                        </div>
                                    </div>
                                </div>

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

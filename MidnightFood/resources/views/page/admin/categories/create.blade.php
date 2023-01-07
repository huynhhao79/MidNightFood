@extends('layout.admin')

@section('title')
<x-AdminBreadcrumb page="Manages Category" path="" />
@endsection

@section('body')
<div class="page-content">
   <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Create a new category</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('categories.create') }}" method="POST" class="form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="first-name-column">Image</label>
                                            <input name="image" required type="file" accept="image/png, image/jpg, image/jpeg" id="first-name-column" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-2" for="last-name-column">Name</label>
                                            <input required maxlength="255" type="text" id="last-name-column" class="form-control" name="name">
                                        </div>
                                    </div>
                                    @error('name')
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
<a href="{{ route('categories.index') }}" class="text-light"><div class="fab back">
    <i class="bi bi-arrow-bar-left"></i>
</div></a>
@endsection

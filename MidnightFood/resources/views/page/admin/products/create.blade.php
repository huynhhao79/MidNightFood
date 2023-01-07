@extends('layout.admin')

@section('style')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection

@section('title')
<x-AdminBreadcrumb page="Manages Product" path="" />
@endsection

@section('body')
<div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Create a new product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('products.create') }}" method="POST" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-3" for="first-name-column">Image</label>
                                            <input name="image" required type="file" accept="image/png, image/jpg, image/jpeg" id="first-name-column" class="form-control">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-3" for="last-name-column">Name</label>
                                            <input required maxlength="255" type="text" id="last-name-column"
                                                class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-3" for="last-name-column">Category</label>
                                            <select class="form-select" name="category_id" id="basicSelect">
                                                @foreach ($lsCategories as $cat)
                                                <option value="{{ $cat->id }}">
                                                    {{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-3" for="last-name-column">Price</label>
                                            <input required value="10000" min="10000" max="1000000" step="1000"
                                                type="number" id="last-name-column" class="form-control" name="price">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-3" for="city-column">Description</label>
                                            <textarea required name="description" maxlength="255" class="form-control"
                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="mb-3" for="last-name-column">Image</label>
                                            <div class="filepond--root multiple-files-filepond filepond--hopper"
                                                data-style-button-remove-item-position="left"
                                                data-style-button-process-item-position="right"
                                                data-style-load-indicator-position="right"
                                                data-style-progress-indicator-position="right"
                                                data-style-button-remove-item-align="false" style="height: 76px;">
                                                <input
                                                    class="filepond--browser" type="file"
                                                    id="filepond--browser-dd1sespc6" name="filepond"
                                                    aria-controls="filepond--assistant-dd1sespc6"
                                                    aria-labelledby="filepond--drop-label-dd1sespc6" multiple="">
                                                <div class="filepond--drop-label"
                                                    style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label
                                                        for="filepond--browser-dd1sespc6"
                                                        id="filepond--drop-label-dd1sespc6" aria-hidden="true">Drag
                                                        &amp; Drop your files or <span class="filepond--label-action"
                                                            tabindex="0">Browse</span></label></div>
                                                <div class="filepond--list-scroller"
                                                    style="transform: translate3d(0px, 60px, 0px);">
                                                    <ul class="filepond--list" role="list"></ul>
                                                </div>
                                                <div class="filepond--panel filepond--panel-root" data-scalable="true">
                                                    <div class="filepond--panel-top filepond--panel-root"></div>
                                                    <div class="filepond--panel-center filepond--panel-root"
                                                        style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);">
                                                    </div>
                                                    <div class="filepond--panel-bottom filepond--panel-root"
                                                        style="transform: translate3d(0px, 68px, 0px);"></div>
                                                </div><span class="filepond--assistant"
                                                    id="filepond--assistant-dd1sespc6" role="status" aria-live="polite"
                                                    aria-relevant="additions"></span>
                                                <div class="filepond--drip"></div>
                                                <fieldset class="filepond--data"></fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-2">
                                    <button id="btnCreate" type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a onclick="location.reload();" type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<a href="{{ route('products.index') }}" class="text-light">
    <div class="fab back">
        <i class="bi bi-arrow-bar-left"></i>
    </div>
</a>
@endsection
@section('script')
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    FilePond.create(document.querySelector('.multiple-files-filepond'), {
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: false
    });

    FilePond.create( document.querySelector('.with-validation-filepond'), {
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: true,
        acceptedFileTypes: ['image/png'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

</script>
<script>
    // $("#btnCreate").click(function (e) {
    //     e.preventDefault();
    //     var $fileUpload = $("input[type='filepond']");

    //     console.log($fileUpload.files.length);
    // });
</script>
@endsection

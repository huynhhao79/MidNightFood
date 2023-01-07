@extends('layout.admin')

@section('title')
<x-AdminBreadcrumb page="Manages Category" path="" />
@endsection

@section('body')
<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-9 col-12">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title">The list products</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>IMAGE</th>
                                                        <th>SKU</th>
                                                        <th>NAME</th>
                                                        <th>STOCK</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lsProducts as $item )
                                                    <tr>
                                                        <td class="text-bold-500">
                                                            <img width="70px" height="70px"
                                                                src="{{ asset('img/product') }}/{{ $item->image->image1 }}"
                                                                alt="">
                                                        </td>
                                                        <td style="width:30%">{{ $item->sku }}</td>
                                                        <td style="width:50%" class="text-bold-500">{{ $item->name }}
                                                        </td>
                                                        <td style="width:50%" class="text-bold-500">
                                                            {{ $item->quantity }}
                                                        </td>
                                                        <td>
                                                            <a type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#animation-{{ $item->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-send"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                                </svg>
                                                            </a>
                                                            <div class="modal text-left" id="animation-{{ $item->id }}"
                                                                tabindex="-1" aria-labelledby="myModalLabel6"
                                                                style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="myModalLabel6">
                                                                                Change to other categoty
                                                                        </div>
                                                                        <form action="{{ route('categories.change') }}" method="POST">
                                                                            @csrf
                                                                            <input type="number" name="id"
                                                                                value="{{ $item->id }}" hidden>
                                                                            <div class="modal-body">
                                                                                <label class="mb-2"
                                                                                    for="basicSelect">You want to change
                                                                                    the product to type</label>
                                                                                <select class="form-select"
                                                                                    name="category_id" id="basicSelect">
                                                                                    @foreach ($lsCategories as $cat)
                                                                                    <option value="{{ $cat->id }}">
                                                                                        {{ $cat->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a type="button"
                                                                                    class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Cancel</span>
                                                                                </a>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary ml-1">
                                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Change</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Category information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="d-flex flex-column align-items-center">
                                    <img width="150" height="150"
                                        src="{{ asset('img/categories') }}/{{ $category->image }}" alt="">
                                    <h6 class="mt-3">{{ $category->name }}</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<a href="{{ route('categories.index') }}" class="text-light">
    <div class="fab back">
        <i class="bi bi-arrow-bar-left"></i>
    </div>
</a>
@endsection

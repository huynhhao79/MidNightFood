@extends('layout.admin')

@section('title')
<x-AdminBreadcrumb page="Manages Product" path="" />
@endsection

@section('body')
<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-7 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Personal information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>SKU</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $product->sku }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $product->name }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Category</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $product->category->name }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Quantity</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $product->quantity }}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Price</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <label>{{ $product->price }} VND</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            <p>{{ $product->decription }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-9 form-group mb-3">
                                            @switch($product->status)
                                            @case(0)
                                            <span class="badge bg-danger">Inactive</span>
                                            {{-- <label class='font-weight-bold text-danger font-weight-bold'></label> --}}
                                            @break
                                            @case(1)
                                            <span class="badge bg-success">Active</span>
                                            {{-- <label class='font-weight-bold text-'></label> --}}
                                            @break
                                            @endswitch
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label>Image</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="col-md-2"><img width="100" height="100" src="{{ asset('img/product') }}/{{ $product->image->image1 }}" alt=""></div>
                                        <div class="col-md-2"><img width="100" height="100" src="{{ asset('img/product') }}/{{ $product->image->image2 }}" alt=""></div>
                                        <div class="col-md-2"><img width="100" height="100" src="{{ asset('img/product') }}/{{ $product->image->image3 }}" alt=""></div>
                                        <div class="col-md-2"><img width="100" height="100" src="{{ asset('img/product') }}/{{ $product->image->image4 }}" alt=""></div>
                                        <div class="col-md-2"><img width="100" height="100" src="{{ asset('img/product') }}/{{ $product->image->image5 }}" alt=""></div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Similar products</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>IMAGE</th>
                                                <th>SKU</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lsProducts as $item)
                                            <tr>
                                                <td style="width:30%" class="text-bold-500">
                                                    <img width="70px" height="70px" src="{{ asset('img/product') }}/{{ $item->image->image1 }}" alt="">
                                                </td>
                                                <td style="width:50%">{{ $item->sku }}</td>
                                                <td>
                                                    <a href="{{ route('products.detail', $item->id) }}" type="button" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                                                          </svg>
                                                    </a>
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

<a href="{{ route('products.index') }}" class="text-light">
    <div class="fab back">
        <i class="bi bi-arrow-bar-left"></i>
    </div>
</a>
@endsection

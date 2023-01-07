@extends('layout.admin')

@section('title')
   <x-AdminBreadcrumb page="Pack" path=""/>
@endsection

@section('body')
<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-7 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Invoice details list</h4>
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
                                            <th>QUANTITY</th>
                                            <th>PRICE</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice->lsDetail as $item )
                                        <tr>
                                            <td class="text-bold-500">
                                                <img width="70px" height="70px" src="{{ asset('img/product') }}/{{ $item->product->image->image1 }}" alt="">
                                            </td>
                                            <td style="width:10%">{{ $item->product->sku }}</td>
                                            <td style="width:30%">{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product->price }}</td>
                                            <td>{{ $item->product->price * $item->quantity}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">Invoice information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Code</label>
                                        </div>
                                        <div class="col-md-7 form-group mb-3">
                                            <label>{{ $invoice->code }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Customer</label>
                                        </div>
                                        <div class="col-md-7 form-group mb-3">
                                            <label>{{ $invoice->user->fullname }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Issued date</label>
                                        </div>
                                        <div class="col-md-7 form-group mb-3">
                                            <label>{{ $invoice->issued_date }}</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Shipping Phone</label>
                                        </div>
                                        <div class="col-md-7 form-group mb-3">
                                            <label>{{ $invoice->shipping_phone }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Shipping Adresss</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <p>{{ $invoice->shipping_address }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Total</label>
                                        </div>
                                        <div class="col-md-7 form-group mb-3">
                                            <label>{{ $invoice->total }}</label>
                                        </div>
                                    </div><br/>
                                    <div class="row d-flex justify-content-around">
                                        <div class="col-md-4">
                                            <a href="{{ route('pack.check', $invoice->id) }}" class="btn btn-primary">Censorship</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#animation-{{ $invoice->id }}">Cancel order</a>
                                            <div class="modal text-left" id="animation-{{ $invoice->id }}" tabindex="-1" aria-labelledby="myModalLabel6" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel6">Warning
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert bg-rgba-success" role="alert">
                                                                This invoice will be cancel. <span class="font-weight-bold">Are you sure?</span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancel</span>
                                                            </a>
                                                            <a href="{{ route('pack.cancel', $invoice->id) }}" type="button" class="btn btn-primary ml-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Accept</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<a href="{{ route('checkout.packlist') }}" class="text-light">
    <div class="fab back">
        <i class="bi bi-arrow-bar-left"></i>
    </div>
</a>
@endsection

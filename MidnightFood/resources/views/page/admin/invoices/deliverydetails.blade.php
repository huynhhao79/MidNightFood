@extends('layout.admin')

@section('title')
   <x-AdminBreadcrumb page="Delivery" path=""/>
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
                                        <div class="col-md-7 form-group">
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
                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-md-4">
                                            <a href="{{ route('delivery.check', $invoice->id) }}" class="btn btn-success">Completed</a>
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
<a href="{{ route('checkout.deliverylist') }}" class="text-light">
    <div class="fab back">
        <i class="bi bi-arrow-bar-left"></i>
    </div>
</a>
@endsection

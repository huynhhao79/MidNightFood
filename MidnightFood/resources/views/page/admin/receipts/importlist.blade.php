 @extends('layout.admin')

 @section('title')
 <x-AdminBreadcrumb page="Import" path="" />
 <p class="text-subtitle text-muted">Select imported products.</p>
 @endsection

 @section('body')
 <section id="multiple-column-form">
     <div class="row match-height">
         <div class="col-12">
             <div class="card">
                @if (count($lsImports) != 0)
                <div class="card-header pb-0">
                    <h4 class="card-title">The list of import products</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>PRODUCT ID</th>
                                        <th>PRODUCT SKU</th>
                                        <th>QUANTITY</th>
                                        <th>RECEIPT PRICE</th>
                                        <th>TOTAL</th>
                                        <th>UPDATE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lsImports as $item)
                                    <form action="{{ route('update-item') }}" method="POST">
                                        @csrf
                                        <tr>
                                            <td style="width:15%" class="text-bold-500">{{ $item['product']->id }}</td>
                                            <td style="width:20%">{{ $item['product']->sku }}</td>
                                            <td style="width:15%">
                                                <input value="{{ $item['quantity'] }}" required min="1" max="99"
                                                    step="1" type="number" id="last-name-column" class="form-control"
                                                    name="quantity">
                                            </td>
                                            <td style="width:20%">
                                                <input value="{{ $item['price'] }}" required min="10000" max="1000000"
                                                    step="1000" type="number" class="form-control" name="price">
                                            </td>
                                            <input type="number" name="id" value="{{ $item['product']->id }}" hidden>
                                            <td style="width:20%">{{ $item['quantity']*$item['price'] }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button href="" type="submit" class="btn btn-secondary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                            <path
                                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                        </svg>
                                                    </button>
                                                    <a href="{{ route('delete-item', $item['product']->id ) }}"
                                                        type="button" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr />
                        <table>
                            <tr>
                                <td style="width:15%" class="text-bold-500">
                                    <h5>TOTAL</h5>
                                </td>
                                <td style="width:30%"></td>
                                <td style="width:20%"></td>
                                <td style="width:10%"></td>
                                <td style="width:30%">
                                    <h5>{{ $total }}</h5>
                                </td>
                                <form action="{{ route('receipts.import.create') }}" method="POST">
                                   @csrf
                                    <td><button class="btn btn-success">Import
                                        </button></td>
                                </form>
                            </tr>
                        </table>
                    </div>
                </div>
                @else
                <div class="card-content">
                    <div class="card-body">
                    <h4>The list of products to enter is empty, please select a product</h4>
                    </div>
                </div>
                @endif

             </div>
         </div>
     </div>

 </section>

 <a href="{{ route('receipts.import') }}" class="text-light">
     <div class="fab back">
         <i class="bi bi-arrow-bar-left"></i>
     </div>
 </a>





 @endsection

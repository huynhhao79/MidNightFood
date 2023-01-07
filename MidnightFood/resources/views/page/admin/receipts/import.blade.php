 @extends('layout.admin')

 @section('title')
 <x-AdminBreadcrumb page="Import" path="" />
 <p class="text-subtitle text-muted">Select imported products.</p>
 @endsection

 @section('body')
 <section class="section">
     <div class="card">
         <div class="card-header">
             <h4 class="card-title">The list of products</h4>
         </div>
         <div class="card-body">
             <div class="row">
                 @foreach ($lsProducts as $product)
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card">
                         <div class="card-body">
                             <div class="card-img-actions">
                                 <img src="{{ asset('img/product') }}/{{ $product->image->image1 }}"
                                     class="card-img img-fluid" width="96" height="350" alt="">
                             </div>
                         </div>
                         <div class="card-body bg-light text-center">
                             <div class="mb-2">
                                 <h6 class="font-weight-semibold mb-2">
                                     <a class="text-default mb-2" data-abc="true">
                                         {{ $product->name }}</a>
                                 </h6>
                                 <a class="text-muted" data-abc="true"> {{ $product->category->name }}</a>
                             </div>
                             <h3 class="mb-0 font-weight-semibold">{{ $product->sku }}</h3>
                             <a class="btn btn-primary rounded-pill mt-2" data-bs-toggle="modal"
                                 data-bs-target="#primary-{{ $product->id }}">Add to list</a>

                             <div class="modal fade text-left" id="primary-{{ $product->id }}" tabindex="-1"
                                 aria-labelledby="myModalLabel160" style="display: none;" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                     role="document">
                                     <div class="modal-content">
                                         <div class="modal-header bg-primary">
                                             <h5 class="modal-title white" id="myModalLabel160">
                                                Please enter quantity and price
                                             </h5>
                                         </div>
                                         <form action="{{ route('add-to-list') }}" method="POST">
                                             @csrf
                                             <div class="modal-body">
                                                 <div class="row">
                                                     <div class="col-md-3">
                                                         <img width="100px" height="100px"
                                                             src="{{ asset('img/product') }}/{{ $product->image->image1 }}"
                                                             alt="">
                                                     </div>
                                                     <div class="col-md-9">
                                                         <div class="form-body">
                                                             <div class="row  align-items-start">
                                                                 <div class="col-md-4">
                                                                     <label>Name</label>
                                                                 </div>
                                                                 <div class="col-md-8 form-group mb-3">
                                                                     <label>{{ $product->name }}</label>
                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                 <div class="col-md-4">
                                                                     <label>SKU</label>
                                                                 </div>
                                                                 <div class="col-md-8 form-group mb-3">
                                                                     <label>{{ $product->sku }}</label>
                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                 <div class="col-md-4">
                                                                     <label>Receipt price </label>
                                                                 </div>
                                                                 <div class="col-md-8 form-group mb-3">
                                                                     <input value="{{ $product->price }}" required
                                                                         min="10000" max="1000000"
                                                                         step="1000" type="number" id="last-name-column"
                                                                         class="form-control" name="price">
                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Quantity </label>
                                                                </div>
                                                                <div class="col-md-8 form-group mb-3">
                                                                    <input value="1" required
                                                                        min="1" max="99"
                                                                        step="1" type="number" id="last-name-column"
                                                                        class="form-control" name="quantity">
                                                                </div>
                                                                <input type="number" name="id" value="{{ $product->id }}" hidden>
                                                            </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="modal-footer">
                                                 <a type="button" class="btn btn-light-secondary"
                                                     data-bs-dismiss="modal">
                                                     <i class="bx bx-x d-block d-sm-none"></i>
                                                     <span class="d-none d-sm-block">Close</span>
                                                 </a>
                                                 <button type="submit" class="btn btn-primary ml-1">
                                                     <i class="bx bx-check d-block d-sm-none"></i>
                                                     <span class="d-none d-sm-block">Add</span>
                                                 </button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
 <div class="d-flex flex-column-reverse">
     <div class="p-2 bd-highlight">
         <a href="{{ route('products.create.form') }}" class="text-light">
             <div class="fab list"> + </div>
         </a>
     </div>
     <div class="p-2 bd-highlight">
         <a href="{{ route('receipts.importlist') }}" class="text-light">
             <div class="fab add bg-primary">
                 <i class="bi bi-list-ul" style="font-size: 20px"></i>
             </div>
         </a>
     </div>

 </div>




 @endsection

 @extends('layout.customer')

 @section('title')
 <x-Breadcrumb page="My Profile" path="Home/My Profile" />
 @endsection

 @section('body')

 <section class="checkout spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-5 col-md-6">
                 <div class="checkout__order">
                     <h4 class="d-flex justify-content-between">My Profile
                         <a class="text-primary" data-toggle="modal" data-target="#changeModal">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                 <path
                                     d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                                 </path>
                                 <path fill-rule="evenodd"
                                     d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z">
                                 </path>
                             </svg>
                         </a>
                         <div class="modal fade" id="changeModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header border-bottom-0">
                                     </div>
                                     <div class="modal-body">
                                         <div class="form-title text-center">
                                             <h4>Change information</h4>
                                         </div>
                                         <div class="d-flex flex-column text-left ">
                                             <form action="{{ route('UpdateInfo') }}" method="POST">
                                                 @csrf
                                                 <div class="col-lg m-1">
                                                     <div class="checkout__input ">
                                                         <p class="m-0">Full Name<span>*</span></p>
                                                         <input name="fullname" value="{{ auth()->user()->fullname }}"
                                                             required type="text">
                                                     </div>
                                                 </div>
                                                 <div class="col-lg m-1">
                                                     <div class="checkout__input ">
                                                         <p class="m-0">Email<span>*</span></p>
                                                         <input name="email" required type="email"
                                                             value="{{ auth()->user()->email }}">
                                                     </div>
                                                 </div>
                                                 <div class="col-lg m-1">
                                                     <div class="checkout__input ">
                                                         <p class="m-0">Phone<span>*</span></p>
                                                         <input name="phone" required type="text"
                                                             value="{{ auth()->user()->phone }}">
                                                     </div>
                                                 </div>
                                                 <div class="col-lg m-1">
                                                     <div class="checkout__input ">
                                                         <p class="m-0">Address<span>*</span></p>
                                                         <input name="address" required type="text"
                                                             value="{{ auth()->user()->address }}">
                                                     </div>
                                                 </div>
                                                 <div class="col-lg m-1">
                                                    <button type="submit"
                                                     class="btn btn-dark btn-block btn-round">Update</button>
                                                </div>

                                             </form>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </h4>
                     <ul>
                         <li>Full name <span>{{ auth()->user()->fullname }}</span></li>
                         <li>Email <span>{{ auth()->user()->email }}</span></li>
                         <li>Phone <span>{{ auth()->user()->phone }}</span></li>
                         <li>Address <span>{{ explode(",", auth()->user()->address)[0] }}</span></li>
                         <li>&nbsp;
                             <span>{{ str_replace(explode(",", auth()->user()->address)[0].',', "",auth()->user()->address) }}</span>
                         </li>
                     </ul>
                     <hr />
                     <ul>
                         <li>Username <span>{{ auth()->user()->username }}</span></li>
                         <li>Password
                             <a class="text-primary font-italic" data-toggle="modal" data-target="#changePass"><span>Change password</span></a>
                             <div class="modal fade" id="changePass" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header border-bottom-0">
                                         </div>
                                         <div class="modal-body">
                                             <div class="form-title text-center">
                                                 <h4>Change password</h4>
                                             </div>
                                             <div class="d-flex flex-column text-left ">
                                                 <form action="{{ route('UpdatePass') }}" method="POST">
                                                     @csrf
                                                     <div class="col-lg m-1">
                                                         <div class="checkout__input ">
                                                             <p class="m-0">Old password</p>
                                                             <input name="oldpass"
                                                                 required
                                                                 type="password">
                                                         </div>
                                                     </div>
                                                     <div class="col-lg m-1">
                                                        <div class="checkout__input ">
                                                            <p class="m-0">New password</p>
                                                            <input name="newpass"
                                                                required
                                                                type="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg m-1">
                                                        <div class="checkout__input ">
                                                            <p class="m-0">Comfirm password</p>
                                                            <input name="confirmpass"
                                                                required
                                                                type="password">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg m-1">
                                                        <button type="submit"
                                                        class="btn btn-dark btn-block btn-round">Update</button>
                                                    </div>
                                                 </form>
                                             </div>
                                         </div>
                                         @if(Session::has('error'))
                                            <p>{{ Session::get('error') }}</p>
                                        @endif
                                     </div>
                                 </div>
                             </div>
                         </li>
                     </ul>

                 </div>
             </div>
             <div class="col-lg-7 col-md-6 checkout__form">
                 <h4>Favorite products</h4>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="shoping__cart__table">
                             <table>
                                 @foreach ($lsFavs as $item)
                                 <tr>
                                     <td class="shoping__cart__item">
                                         <a href="">
                                             <img width="100" height="100"
                                                 src="{{ asset('img/product') }}/{{ $item->image->image1}}" alt=""></a>
                                         <h5 class='font-weight-bold'>{{ $item->name  }}</h5>
                                     </td>
                                     <td class="shoping__cart__item">
                                         <h5>{{ $item->category->name }}</h5>
                                     </td>
                                     <td class="shoping__cart__item__close">
                                         <a href="{{ route('delete-favourite', [
                                            $item->id,
                                        ])  }}">
                                             <span class="icon_close"></span>
                                         </a>
                                     </td>
                                 </tr>
                                 @endforeach
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

         <div class="row mt-5">
             <div class="col-lg-12">
                 <h4 class="font-weight-bold pb-3">My orders</h4>
                 <div class="table-responsive">
                     <table class="table table-hover mb-0">
                         <thead>
                             <tr>
                                 <th>CODE</th>
                                 <th>ISSUED DATE</th>
                                 <th>SHIPPING ADĐRESS</th>
                                 <th>SHIPPING PHONE</th>
                                 {{-- <th>TOTAL</th> --}}
                                 <th>STATUS</th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($lsInvoices as $item)
                             <tr>
                                 <td class="text-bold-500 col-1">{{ $item->code }}</td>
                                 <td class="text-bold-500 col-2">{{ $item->issued_date }}</td>
                                 <td class="text-bold-500 col-3">{{ $item->shipping_address }}</td>
                                 <td>{{ $item->shipping_phone }}</td>

                                 @switch($item->status)
                                 @case(0)
                                 <td class='font-weight-bold text-warning'>Chờ duyệt</td>
                                 @break
                                 @case(1)
                                 <td class='font-weight-bold text-success'>Đang giao</td>
                                 @break
                                 @endswitch
                                 <td>
                                     <div class="row">
                                         <a href="#" class="btn btn-info mx-2">Details</a>
                                         @if ($item->status!=1)
                                         <a href="#" class="btn btn-danger">Cancel</a>
                                         @endif
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

 </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 {{-- <script type="text/javascript">
     $("#btnPlace").click(function (e) {
         e.preventDefault();

         var ship = $('#shipto').is(":checked");
         if (ship) {
             var shipping_phone = $('input[name=phone]').val();

             var citis = $('#city option:selected').text();
             var districts = $('#district option:selected').text();
             var wards = $('#ward option:selected').text();
             var street = $('input[name=street]').val();
             var shipping_address = citis + ", " + districts + ", " + wards + ", " + street;
         } else {
             var shipping_phone = $('input[name=myphone]').val();
             var shipping_address = $('input[name=myaddress]').val();
         }

         $('input[name=shipping_phone]').val(shipping_phone);
         $('input[name=shipping_address]').val(shipping_address);

         $('#checkout-sub').submit();
     });

 </script> --}}

 @endsection

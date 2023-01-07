@extends('layout.admin')

@section('title')
   <x-AdminBreadcrumb page="Dashboard" path=""/>
@endsection

@section('body')
<div class="page-content">
   <section class="row">
       <div class="col-12 col-lg-9">
           <div class="row">
               <div class="col-6 col-lg-3 col-md-6">
                   <div class="card">
                       <div class="card-body px-3 py-4-5">
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="stats-icon purple">
                                       <svg style="color:white; width:2rem; height:2rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                           <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                         </svg>
                                   </div>
                               </div>
                               <div class="col-md-8">
                                   <h6 class="text-muted font-semibold">Sales</h6>
                                   <h6 class="font-extrabold mb-0">{{ $countSale }}</h6>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-6 col-lg-3 col-md-6">
                   <div class="card">
                       <div class="card-body px-3 py-4-5">
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="stats-icon blue">
                                       <svg style="color:white; width:2rem; height:2rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                           <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                         </svg>
                                   </div>
                               </div>
                               <div class="col-md-8">
                                   <h6 class="text-muted font-semibold">Staffs</h6>
                                   <h6 class="font-extrabold mb-0">{{ $countStaff }}</h6>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-6 col-lg-3 col-md-6">
                   <div class="card">
                       <div class="card-body px-3 py-4-5">
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="stats-icon green">
                                       <svg style="color:white; width:2rem; height:2rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                           <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                                         </svg>
                                   </div>
                               </div>
                               <div class="col-md-8">
                                   <h6 class="text-muted font-semibold">Products</h6>
                                   <h6 class="font-extrabold mb-0">{{ $countProduct }}</h6>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-6 col-lg-3 col-md-6">
                   <div class="card">
                       <div class="card-body px-3 py-4-5">
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="stats-icon red">
                                       <svg style="color:white; width:2rem; height:2rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                           <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                         </svg>
                                   </div>
                               </div>
                               <div class="col-md-8">
                                   <h6 class="text-muted font-semibold">Profit</h6>
                                   <h6 class="font-extrabold mb-0">{{ $profit }}</h6>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           <h4>Revenue</h4>
                       </div>
                       <div class="card-body">
                           <div id="chart-profile-visit"></div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           <h4>Spending</h4>
                       </div>
                       <div class="card-body">
                           <div id="chart-profile-visit-2" class="spending"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-12 col-lg-3">
           <div class="card">
           <div class="card-header">
                           <h4>Best Sales Products</h4>
                       </div>
               <div class="card-body ">
                   @foreach($lsBestSales as $item)
                   <div class="d-flex align-items-center">
                       <img src="{{ asset('img/product') }}/{{ $item['product']->image->image1 }}" width=100 height=100 alt="">
                       <div class="ms-3 name">
                           <h7 class="font-bold">{{ $item['product']->name }}</h7>
                           <h6 class="text-muted mb-0" style="font-style: italic">{{ $item['quantity']  }}</h6>
                       </div>
                   </div><hr/>
                   @endforeach

               </div>
           </div>

       </div>
   </section>
</div>
@endsection

@section('script')
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endsection


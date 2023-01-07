 @extends('layout.admin')

 @section('title')
 <x-AdminBreadcrumb page="Manages Invoice" path="" />
 @endsection

 @section('body')
 <div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">The list of orders</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>CODE</th>
                                            <th>CUSTOMER</th>
                                            <th>ISSUED DATE</th>
                                            <th>TOTAL</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lsInvoices as $item)
                                        <tr>
                                            <td style="width:20%" class="text-bold-500">{{ $item->code }}</td>
                                            <td style="width:20%">{{ $item->user->fullname }}</td>
                                            <td style="width:20%">{{ $item->issued_date }}</td>
                                            <td>{{ $item->total }} VND</td>
                                                @switch($item->status)
                                                @case(0)
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                @break
                                                @case(1)
                                                <td><span class="badge bg-primary">Delivery</span></td>
                                                @break
                                                @case(2)
                                                <td><span class="badge bg-success">Completed</span></td>
                                                @break
                                                @endswitch
                                            <td>
                                                <a href="{{ route('invoices.detail', $item->id) }}" type="button" class="btn btn-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
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

 @endsection

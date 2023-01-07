<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Product;
use App\Models\InvoiceReceipt;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        // if(! Auth::check()){
        //     return redirect()->route('Login.form');
        // }
        $countSale = Invoice::where('status', 2)->count();
        $countStaff= User::where('is_admin', 1)->count();
        $countProduct = Product::where('status', 1)->count();

        $lsInvoice = Invoice::where('status', 2)->sum('total');
        $lsReiceipt = InvoiceReceipt::where('status', 1)->sum('total');
        $profit = $lsInvoice - $lsReiceipt;

        $lsBestSales = DB::table('invoice_details')->select(DB::raw('sum(quantity) as `sum`'), DB::raw('product_id'))
        ->groupby('product_id')
        ->orderByDesc('sum')
        ->get();


        $ls = [];
        foreach ($lsBestSales as $item) {
            $product = [
                'product' => Product::find($item->product_id),
                'quantity' => $item->sum
            ];
            $ls[]=$product;
        }

        return view('page.admin.index', [
            'countSale' => $countSale,
            'countStaff' => $countStaff,
            'countProduct' => $countProduct,
            'profit' => $profit,
            'lsBestSales' => $ls,
        ]);
    }
    public function chart()
    {
        // $lsInvoice = Invoice::where('status', 2)->groupBy('issued_date')->get();

        $chart = DB::table('invoices')->select(DB::raw('sum(total) as `sum`'), DB::raw('MONTH(issued_date) month'))
        ->groupby('month')
        ->orderby('month')
        ->get();

        $chart2 = DB::table('invoice_receipts')->select(DB::raw('sum(total) as `sum`'), DB::raw('MONTH(issued_date) month'))
        ->groupby('month')
        ->orderby('month')
        ->get();

        return response()->json([
            'data' => $chart,
            'data2' => $chart2

        ]);

    }

}

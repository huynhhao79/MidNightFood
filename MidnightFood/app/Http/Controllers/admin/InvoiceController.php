<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $lsInvoices = Invoice::orderByDesc('issued_date','status')->orderBy('status')->get();
        return view('page.admin.invoices.index',[
            'lsInvoices' => $lsInvoices
        ]);
    }

    public function packList()
    {
        $lsInvoices = Invoice::where('status', 0)->orderByDesc('issued_date','status')->get();
        return view('page.admin.invoices.pack',[
            'lsInvoices' => $lsInvoices
        ]);
    }

    public function showPack($id)
    {
        if($id){
            $invoice = Invoice::find($id);
            if($invoice){
                return view('page.admin.invoices.packdetails',[
                    'invoice'=>$invoice
                ]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function checkPack(Request $request, $id)
    {
        if($id){
            $invoice=Invoice::find($id);
            if($invoice){
                $invoice->status=1;
                $invoice->save();
            }
        }
        return redirect()->route('checkout.packlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        if($id){
            $invoice=Invoice::find($id);
            if($invoice){
                $invoice->delete();
            }
        }
        return redirect()->back();
    }

    public function deliveryList()
    {
        $lsInvoices = Invoice::where('status', 1)->orderByDesc('issued_date','status')->get();
        return view('page.admin.invoices.delivery',[
            'lsInvoices' => $lsInvoices
        ]);
    }

    public function showDelivery($id)
    {
        if($id){
            $invoice = Invoice::find($id);
            if($invoice){
                return view('page.admin.invoices.deliverydetails',[
                    'invoice'=>$invoice
                ]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function checkDelivery(Request $request, $id)
    {
        if($id){
            $invoice=Invoice::find($id);
            if($invoice){
                $invoice->status=2;
                $invoice->save();
            }
        }
        return redirect()->route('checkout.deliverylist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id){
            $invoice = Invoice::find($id);
            if($invoice){
                return view('page.admin.invoices.details',[
                    'invoice'=>$invoice
                ]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

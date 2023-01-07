<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\InvoiceReceipt;
use App\Models\InvoiceReceiptDetail;


class InvoiceReceiptController extends Controller
{
    public function takeList()
    {
        $lsReceipts = InvoiceReceipt::where('status', 0)->orderByDesc('issued_date','status')->get();
        return view('page.admin.receipts.stocktake',[
            'lsReceipts' => $lsReceipts
        ]);
    }

    public function showTake($id)
    {
        if($id){
            $receipt = InvoiceReceipt::find($id);
            if($receipt){
                return view('page.admin.receipts.stocktakedetails',[
                    'receipt'=>$receipt
                ]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function checkTake(Request $request, $id)
    {
        if($id){
            $receipt=InvoiceReceipt::find($id);
            if($receipt){
                $receipt->status=1;
                $receipt->save();
                foreach ($receipt->lsDetail as $item) {
                    $product=Product::find($item->product_id);
                    $product->quantity+=$item->quantity;
                    $product->save();
                }
            }
        }
        return redirect()->route('receipts.takelist');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $lsProducts = Product::all();
        return view('page.admin.receipts.import',[
            'lsProducts' => $lsProducts,
        ]);
    }

    public function importList(Request $request)
    {
        $lsImports = $request->session()->has('lsImports')?$request->session()->get('lsImports'):[];

        $lsItems = [];

        $total = 0;
        foreach ($lsImports as $key => $value) {
            $product = Product::findOrFail($value['product_id']);
            $lsItems[]=[
                'product' => $product,
                'quantity' => $value['quantity'],
                'price' => $value['price'],
            ];
            $total+=$value['quantity']*$product->price;
        }

        return view('page.admin.receipts.importlist', [
            'lsImports' => $lsItems,
            'total' => $total
        ]);

    }

    public function addToList(Request $request)
    {
        $item = $request->all();

        if(!$request->session()->exists('lsImports')) {
            $request->session()->put('lsImports', []);
            $request->session()->push('lsImports', [
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
        }
        else {
            $lsImports = $request->session()->get('lsImports');

            $search = Controller::searchList($lsImports, [
                'product_id' => $item['id'],
            ]);

            if(count($search) == 0){
                $request->session()->push('lsImports', [
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }
            else{
                $lsImports[ $search[0] ]['quantity'] += $item['quantity'];
                $lsImports[ $search[0] ]['price'] = $item['price'];
                $request->session()->put('lsImports', $lsImports);
            }
        }

        return redirect()->back();
    }

    public function updateItem(Request $request)
    {
        $lsImports = $request->session()->get('lsImports');

        $search = Controller::searchList($lsImports, [
            'product_id' => $request->get('id'),
        ]);
        $price = $request->get('price');

        if(count($search) != 0){
            $lsImports[$search[0]]['quantity']=$request->get('quantity');
            $lsImports[$search[0]]['price']= $price;
            $request->session()->put('lsImports',$lsImports);
        }
// return response()->json($request->get('price'));
        return redirect()->back();
    }

    public function deleteItem(Request $request, $product_id)
    {
        $lsImports = $request->session()->get('lsImports');

        $search = Controller::searchList($lsImports, [
            'product_id' => $product_id,
        ]);

        if(count($search) != 0){
            unset($lsImports[$search[0]]);
            count($lsImports)==0?
                $request->session()->put('lsImports', [])
                : $request->session()->put('lsImports', $lsImports);
        }

        return redirect()->back();
    }

    public function index()
    {
        $lsReceipts = InvoiceReceipt::orderByDesc('issued_date','status')->orderBy('status')->get();
        return view('page.admin.receipts.index',[
            'lsReceipts' => $lsReceipts
        ]);
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
        $details = $request->session()->get('lsImports');

        $total=0;
        foreach ($details as $item) {
            $total+=$item['price']*$item['quantity'];
        }

        $receipt = InvoiceReceipt::create([
            'code' => time(),
            'user_id' => auth()->user()->id,
            'issued_date' => now(),
            'total' => $total
        ]);

        // return response()->json([$request->session()->get('lsImports')]);

        foreach ($details as $item) {
            InvoiceReceiptDetail::create([
                'receipt_id' => $receipt->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'receipt_price' => $item['price'],
            ]);
        }

        $request->session()->put('lsImports', []);

        return redirect()->route('receipts.import');
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
            $receipt = InvoiceReceipt::find($id);
            if($receipt){
                return view('page.admin.receipts.details',[
                    'receipt'=>$receipt
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

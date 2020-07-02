<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use App\Type_Product;

class AdminController extends Controller
{
    public function getIndex(){
        return view('admin.admin');
    }

    public function getBook(){
        $product = Type_Product::join('products', 'type_products.id', '=', 'products.id_type')->get();
        return view('admin.book',compact('product'));
    }

    public function getType_of_book(Request $req){
        $product = Type_Product::join('products', 'type_products.id', '=', 'products.id_type')->where('id_type',$req->id)->get();
        return view('admin.type_of_book',compact('product'));
    }

    public function getCustomer(){
        $customer = Customer::all();
        return view('admin.customer',compact('customer'));
    }

    public function getBill(Request $req){
        $bill = Bill::where('id_customer',$req->id_cus)->get();
        return view('admin.bill',compact('bill'));
    }

    public function getBilldetail(Request $req){
        $billdetail = Bill_detail::where('id_bill',$req->id_bill)->get();
        return view('admin.billdetail',compact('billdetail'));
    }

    public function getAddbook(Request $req){
        $type=Type_Product::all();
        return view('admin.addbook',compact('type'));
    }
    public function postAddbook(Request $req){
        $pr = new Product;
        $pr->name = $req->name;
        $pr->author = $req->author;
        $pr->id_type = $req->id_type;
        $pr->description = $req->description;
        $pr->unit_price = $req->unit_price;
        $pr->promotion_price = $req->promotion_price;
        $pr->quantity = $req->quantity;
        $pr->new = 1;
        $pr->save();
        $this->validate($req,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],
        [
            'image.required'=>''
        ]);
        $imageName = $req->name.".jpg";
        $req->image->move(public_path('source/image/product'), $imageName);
        return back() ->with('thanhcong','Đã thêm thành công.');
    }

    public function getEditbook($id){
        $product=Product::where('id',$id)->get();
        $type=Type_Product::all();
        return view('admin.editbook',compact('product','type'));
    }

    public function postEditbook(Request $req){
        $pr = new Product;
        $pr->name = $req->name;
        $pr->author = $req->author;
        $pr->id_type = $req->id_type;
        $pr->description = $req->description;
        $pr->unit_price = $req->unit_price;
        $pr->promotion_price = $req->promotion_price;
        $pr->quantity = $req->quantity;
        $pr->new = 1;
        $this->validate($req,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],
        [
            'image.required'=>'Vui long chon anh   '
        ]);
        $imageName = $req->name.".jpg";
        $req->image->move(public_path('source/image/product'), $imageName);
        if ( $pr->where('id',$req->id)->update(['name'=>$req->name,
                    'author'=>$req->author,
                    'id_type'=>$req->id_type,
                    'description'=>$req->description,
                    'unit_price'=>$req->unit_price,
                    'promotion_price'=>$req->promotion_price,
                    'quantity'=>$req->quantity,
                    'new'=> 1
        ])
        ) {
            return redirect()->back()->with(['flag'=>'success','message'=>'Sửa thành công']);
        }
        else {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Sửa thất bại']);
        }
    }

    public function getDelbook(Request $req){
        $pr = new Product;
        $pr->where('id',$req->id)->delete();
        return redirect()->back();
    }

    public function getTurnover(Request $req){
        return view('admin.turnover');
    }

    public function postTurnover(Request $req){
        $bill = Bill::whereBetween('date_order',[$req->date_strt,$req->date_end])->get();
        return view('admin.turnover',compact('bill'));
    }

    public function getTurnover_week(Request $req){
        return view('admin.turnover',);
    }

    public function getTurnover_month(Request $req){
        $bill = Bill::whereMonth('date_order',$req->month)->get();
        return view('admin.turnover',compact('bill'));
        
    }

    public function getEditstatus(Request $req){
        $bill = Bill::where('id',$req->id)->get();
        return view('admin.editstatus',compact('bill'));
    }

    public function postEditstatus(Request $req)
    {
        $bill = new Bill;
        if ($bill->where('id',$req->id)->update(['status'=>$req->status])) {
            return redirect()->back()->with(['flag'=>'success','message'=>'Sửa thành công']);
        }
        else {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Sửa thất bại']);
        }
    }



}

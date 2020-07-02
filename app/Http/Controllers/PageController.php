<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Type_product;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use App\User;
use App\Comment;
use Hash;
use Auth;
use Mail;
Use App\Mail\Comfim_email;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{   
    public function get_home(Request $request){
        if($request->ajax() || 'NULL'){
          $products = Product::where('new',1)->paginate(4);
          return view('page.test',compact('products'));
        }
    }

    public function getIndex(){
        $slide = Slide::all();
        $product = Product::where('new',1)->paginate(4);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('page.trangchu',compact('slide','product','sale_product'));
    } 

    public function getLoaisp($type){
        if ($type==0) {
            $productByType = Product::where('new',1)->paginate(4);
        }
        else {
            $productByType = Product::where('id_type',$type)->paginate(4);
            $nameType = Type_Product::where('id',$type)->first();
        }
        $type_product = Type_product::all();
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('page.loai_sanpham',compact('productByType','type_product','sale_product'));
    } 

    public function getChitietSanpham(Request $req){
        $product = Product::where('id',$req->id)->first();
        $sale_product = Product::where('promotion_price','<>',0)->paginate(3);
        $comment = Comment::where('id_post',$req->id)->get();
        return view('page.chitiet_sanpham',compact('product','sale_product','comment'));
    } 

    public function getGioithieu(){
    	return view('page.gioithieu');
    }

    public function getLienhe(){
    	return view('page.lienhe');
    }

    public function getAddcart(Request $req,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function  getDelcart(Request $req){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($req->id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(Request $req){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $item[] = $cart->items;
        return view('page.checkout');
    }

    public function postUpdateCart(Request $req)
    {   
        $oldCart = Session('cart')?Session::get('cart'):null;
            foreach ($req->qty as $key => $value) {
                if (($value == 0) and (is_numeric($value))) {
                    return redirect()->route('delcart',$key);
                }
                elseif (($value > 0) and (is_numeric($value))){
                    $oldCart->totalQty -= ($oldCart->items[$key]['qty'] -$value);
                    $oldCart->totalPrice = $oldCart->totalPrice - $oldCart->items[$key]['qty']*$oldCart->items[$key]['price'] +  $oldCart->items[$key]['price']*$value;
                    $oldCart->items[$key]['qty'] = $value;
                }
            }
            Session::put('cart',$oldCart);
        return redirect()->back();
    }

    public function postCheckout(Request $req){
            $cart = Session::get('cart');

            $cus = new Customer;
            $cus->name = $req->name;
            $cus->gender = $req->gender;
            $cus->id_user = Auth::user()->id;
            $cus->email = $req->email;
            $cus->address = $req->address;
            $cus->phone_number = $req->phone_number;
            $cus->note = $req->note;
            $cus->save();

            $bill = new Bill;
            $bill->id_customer = $cus->id;
            $bill->status = "Chờ lấy hàng";
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $req->payment_method;
            $bill->note = $req->note;
            $bill->save();

            foreach ($cart->items as $key => $value) {
                $bill_detail = new Bill_detail;
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = $value['price']/$value['qty'] ;
                $billdetail [$key] =  $bill_detail->save();
                $prold = Product::where('id',$key)->first();
                $pr = new Product();
                $pr->where('id',$key)->update(['quantity'=>$prold->quantity-$value['qty']]);
                
            }
            Session::forget('cart');
            return redirect()->route('trangchu');

    }

    public function getLogin(){
        return view('page.login');
    }

    public function postLogin(Request $req){
            $this->validate($req,
            [
                'email' => 'required|email',
                'password'=>'required'
            ],
            [
                'email.required' =>'Vui lòng nhập email.',
                'email.email' => 'Vui lòng nhập đúng định dạng email.',
                'password.required' =>'Vui lòng nhập mật khẩu.'
            ]
        );
        $check = array('email' => $req->email ,'password' => $req->password);
        if (Auth::attempt($check)) {
            if (Auth::user()->email =="admin@gmail.com") {
                return redirect()->route('admin');
            }
            else {
                return redirect()->route('trangchu');
            }
        }
    }

    public function getRegister(){
        return view('page.register');
    }

    public function postRegister(Request $req){
        $this->validate($req,
            [
                'email' => 'required|email|unique:user,email',
                'password'=>'required',
                'name'=>'required',
                'address' =>'required'
            ],
            [
                'email.required' =>'Vui lòng nhập email.',
                'email.email' => 'Vui lòng nhập đúng định dạng email.',
                'email.unique' => 'Email đã được sử dụng.',
                'password.required' =>'Vui lòng nhập password.',
                'name.required' =>'Vui lòng nhập họ tên của bạn.',
                'address.required'=>'Vui lòng nhập địa chỉ của bạn.'
            ]);
            $user = new User();
            $user->fullname =$req->name;
            $user->email =$req->email;
            $user->password =Hash::make($req->password);
            $user->phone =$req->phone;
            $user->address =$req->address;

            $user->save();
            return redirect()->back()->with('thanhcong','Đã tạo tài khoản thành công');
    }

    public function getLogout(){
        Auth::logout();
        Session::forget('cart');
        return redirect()->route('trangchu');
    }

    public function getSearch(Request $req){
        $type = Type_product::Where('type_name','like','%'.$req->search.'%')->first();
        $product = Product::Where('name','like','%'.$req->search.'%')
                            ->orWhere('unit_price','like',$req->search)
                            ->orWhere('id_type','like',$type->id)
                            ->get();
        $sale_product = Product::where('promotion_price','<>',0)->get();
        return view('page.search',compact('product','sale_product'));
    }

    public function postAddcomment(Request $request){
        if(!$request->ajax()){
            return response()->json([
                "code" => 208,
                "message" => "You have not permision!"
            ]);
        }

        $data = $request->all();

        $cmt = $data['cmt'];
        $id_post = $data['id_post'];
        $name = $data['name'];
        
        $arr_insert = [
            'id_post' => $id_post,
            'username' => $name,
            'comment' => $cmt
        ];

        $db = DB::table('comment');
        
        if(!$db->insert($arr_insert)){
            return response()->json([
                "code" => 204,
                "message" => "Insert comment Error!"
            ]);
        }

        return response()->json([
            "code" => 200,
            "message" => "Success!"
        ]);
    }

    public function getProfile(){
        return view('page.profile');
    }
    public function postProfile(Request $req){
        $user = new User;
        if ($user->where('id',Auth::user()->id)->update([
                    'fullname'=>$req->name,
                    'email'=>Auth::user()->email,
                    'birthday'=>$req->birthday,
                    'phone'=>Auth::user()->phone,
                    'address'=>$req->address
                ])
            )
        {
            return redirect()->back()->with(['flag'=>'success','message'=>'Cập nhật thành công']);
        }
        else {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Cập nhật không thành công']);
        }
    }

    public function getUserbill(){
        $id_cus = Customer::leftJoin('user', 'customer.id_user', '=', 'user.id')->select('id_customer')->where('id_user',Auth::user()->id)->first();
        $bill = Bill::where('id_customer',$id_cus['id_customer'])->get();
        return view('page.order_management',compact('bill'));
    }

    public function getUserbilldetail(Request $req){
        $billdetail = Bill_detail::where('id_bill',$req->id)->get();
        return view('page.user_billdetail',compact('billdetail'));
    }
}

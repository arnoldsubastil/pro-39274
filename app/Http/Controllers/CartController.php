<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Cart;
use \App\Models\Orders;
use \App\Models\CartOrder;
use \App\Models\Reviews;
use Auth;
use DB;
use Mail;

class CartController extends Controller
{
    //

    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index(Request $request) {
        $userId = $this->getID(Auth::user());
        $carttocheckout = DB::table('cart')
            ->select('cart.user_id', 'cart.product_id', 'products.productIdlong', 'cart.product_note', 'products.name', 'products.thumbnailUrl', 'products.productStatusId', 'products.foreignName', 'products.thumbnailUrl', 'products.sellingPrice', DB::raw('COUNT(1) as numberoforder'))
            ->join('products', 'products.productIdlong', '=', 'cart.product_id')
            ->where('cart.user_id', $userId)
            ->where('cart.status', 'added')
            ->groupBy('cart.product_id')
            ->groupBy('cart.user_id')
            ->groupBy('products.productIdlong')
            ->groupBy('products.name')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.productStatusId')
            ->groupBy('cart.product_note')
            ->groupBy('products.foreignName')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.sellingPrice')
            ->get();

        $countitem = DB::table('cart')
                 ->select(DB::raw('count(*) as count'))
                 ->where('user_id', $userId)
                 ->where('status', 'added')
                 ->first()
                 ->count;
 
         return view('cart.index', [
             'uniqueProductIds'=>$carttocheckout,
             'countUnique'=>$countitem
         ]);

    }

    public function create(){

        //GET DATA FROM STORAGE 
        $path = storage_path() . "/app/json/Products.json"; 
        $json = json_decode(file_get_contents($path), true);
        //$product=collect($json)->where('productId', $productId);
        

        return view('orders.create',[
            //'products'=>$product,
            //'productId'=>$productId
        ]);

    }

    public function addToCart(Request $request) {
        
        $userId = $this->getID($request->myid);
        return Cart::create([
            'user_id' => $userId,
            'status' => 'added',
            'product_id' => $request->id,
            'product_note' => $request->note,
            'qty' => 1,
        ]);
    }

    public function updateQtyCart(Request $request) {
        $userId = $this->getID($request->myid);
        DB::table('cart')
            ->where('user_id', $userId)
            ->where('product_id', $request->productid)
            ->where('status', 'added')
            ->delete();
        for ($ctr = 0; $ctr != intval($request->qty); $ctr++){
            Cart::create([
                'user_id' => $userId,
                'status' => 'added',
                'product_id' => $request->productid,
                'product_note' => $request->note,
                'qty' => 1,
            ]);
        }
    }

    public function countItemCart(Request $request){
        $userId = $this->getID($request->myid);
        $countofcart = DB::table('cart')
            ->select('user_id','product_id')
            ->where('user_id', $userId)
            ->where('status', 'added')
            ->groupBy('product_id')
            ->groupBy('user_id')
            ->get();

        return count($countofcart);
    }

    public function getItemCart(Request $request) {
        $userId = $this->getID($request->myid);

        return DB::table('cart')
            ->select('user_id', 'product_id')
            ->where('user_id', $userId)
            ->where('status', 'added')
            ->groupBy('product_id')
            ->groupBy('user_id')
            ->get();
    }

    public function getAllCheckout() {
        $userId = $this->getID(Auth::user());
        $checkouted = DB::table('orders')
            ->select('orders.user_id',
                'orders.order_id',
                'orders.full_name',
                'orders.status',
                'orders.mailing_address',
                'orders.delivery_address',
                'orders.contact_number',
                'orders.mode_of_payment',
                'orders.reference_no',
                'orders.voucher_id',
                'voucher.voucher_code',
                'orders.voucher_proof',
                'orders.notes',
                DB::raw('GROUP_CONCAT(products.name) as productslist'))
            ->leftJoin('voucher', 'voucher.voucher_id', '=', 'orders.voucher_id')
            ->join('cartorder', 'cartorder.order_id', '=', 'orders.order_id')
            ->join('cart', 'cartorder.cart_id', '=', 'cart.cart_id')
            ->join('products', 'cart.product_id', '=', 'products.productIdlong')
            ->where('orders.user_id', $userId)
            ->groupBy('orders.order_id')
            ->groupBy('orders.user_id')
            ->groupBy('orders.full_name')
            ->groupBy('orders.status')
            ->groupBy('orders.mailing_address')
            ->groupBy('orders.delivery_address')
            ->groupBy('orders.contact_number')
            ->groupBy('orders.mode_of_payment')
            ->groupBy('orders.reference_no')
            ->groupBy('orders.voucher_id')
            ->groupBy('voucher.voucher_code')
            ->groupBy('orders.voucher_proof')
            ->groupBy('orders.notes')
            ->get();

        return view('orders.list', [
            'products'=>$checkouted
        ]);
    }

    public function getcheckoutItem(Request $request) {
        $userId = $this->getID($request->myid);
        
        $checkouted = DB::table('orders')
            ->select('orders.order_id',
                'orders.user_id',
                'orders.full_name',
                'orders.status',
                'orders.mailing_address',
                'orders.delivery_address',
                'orders.contact_number',
                'orders.mode_of_payment',
                'orders.reference_no',
                'orders.voucher_id',
                'voucher.voucher_code',
                'orders.voucher_proof',
                'orders.notes',
                'products.name',
                'products.productIdlong',
                'cart.product_note',
                'cartorder.cartorderId',
                'cartorder.review',
                DB::raw('COUNT(1) as qty'))
            ->leftJoin('voucher', 'voucher.voucher_id', '=', 'orders.voucher_id')
            ->join('cartorder', 'cartorder.order_id', '=', 'orders.order_id')
            ->join('cart', 'cartorder.cart_id', '=', 'cart.cart_id')
            ->join('products', 'cart.product_id', '=', 'products.productIdlong')
            ->where('orders.user_id', $userId)
            ->where('orders.order_id', $request->orderId)
            ->groupBy('orders.user_id')
            ->groupBy('voucher.voucher_code')
            ->groupBy('orders.full_name')
            ->groupBy('orders.status')
            ->groupBy('orders.mailing_address')
            ->groupBy('orders.delivery_address')
            ->groupBy('orders.contact_number')
            ->groupBy('orders.mode_of_payment')
            ->groupBy('orders.reference_no')
            ->groupBy('orders.voucher_id')
            ->groupBy('orders.voucher_proof')
            ->groupBy('orders.notes')
            ->groupBy('products.name')
            ->groupBy('products.productIdlong')
            ->groupBy('cart.product_note')
            ->groupBy('orders.order_id')
            ->groupBy('cartorder.cartorderId')
            ->groupBy('cartorder.review')
            ->get();

            return $checkouted;
    }

    public function checkoutorder(Request $request) {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'contact' => 'required|min:10|max:16',
            'maddress' => 'required',
            'daddress' => 'required',
            'mode_of_payment' => 'required'
        ]);

        $userId = $this->getID(Auth::user());
        $productslist = explode(',', $request->productlist);
        $carttocheckout = DB::table('cart')
            ->select('user_id', 'product_id', 'cart_id')
            ->where('user_id', $userId)
            ->where('status', 'added')
            ->whereIn('product_id', $productslist)
            ->get();

            if (isset($request->image)){
                if($request->image->extension() == 'png' || $request->image->extension() == 'jpg' || $request->image->extension() == 'jpeg'){
                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('images/voucherproof'), $imageName);
                } else {
                    $imageName = '';
                }
            } else {
                $imageName = '';
            }
            $orderId = Orders::create([
                'user_id' => $userId,
                'full_name' => $request->name,
                'status' => 'Paid',
                'contact_number' => $request->contact,
                'email' => $request->email,
                'mailing_address' => $request->maddress,
                'delivery_address' => $request->daddress,
                'mode_of_payment' => $request->mode_of_payment,
                'reference_no' => $request->reference_no,
                'amount' => $request->totalcomputedamount_submt,
                'voucher_id' => $request->voucher_id,
                'voucher_proof' => $imageName,
                'notes' => $request->message
            ]);
            $productnote = json_decode($request->allproductcomments, true);
            
            foreach ($carttocheckout as $tocheckout){
                $productId = $tocheckout->product_id;
                CartOrder::create([
                    'order_id' => $orderId->order_id,
                    'cart_id' => $tocheckout->cart_id,
                    'review' => '',
                    'productnote' => $productnote[$productId]
                ]);
            }

            Cart::where('user_id', (string) $userId)
                  ->where('status', 'added')
                  ->whereIn('product_id', $productslist)
                    ->update(['status' => 'ordered']);

            $bodydata = $this->orderOrganizer($orderId);
            $this->mailersender($request->name, $request->email, $bodydata);

        return view('orders.notification');
    }

    public function postreview(Request $request) {
        CartOrder::where('cartorderId', $request->productIdlong)
        ->update([
            'review' => $request->myreview
        ]);
                    
        return view('orders.reviewupdated');
    }
    public function postcontact(Request $request) {

        $this->getID(Auth::user());
            Reviews::create([
                'email' => $request->productIdlong,
                'message' => $request->message,
                'read_done' => 0
            ]);
                    
        return view('cart.contactussuccess');
    }


    private function mailersender($toName, $toEmail, $body) {
        
        $data = array('info' => $body);
        Mail::send('emails.mail', $data, function ($message) use ($toName, $toEmail) {
        $message->to($toEmail, $toName)
        ->subject('Laravel Test Mail');
        $message->from('tech.sender2023@gmail.com', 'SoyStory Online Ordering');
        });
    }

    private function orderOrganizer($orderId) {
        return DB::table('orders')
            ->select('orders.order_id',
                'orders.user_id',
                'orders.full_name',
                'orders.status',
                'orders.mailing_address',
                'orders.delivery_address',
                'orders.contact_number',
                'orders.mode_of_payment',
                'orders.reference_no',
                'orders.amount',
                'orders.voucher_id',
                'voucher.voucher_code',
                'orders.voucher_proof',
                'orders.notes',
                'products.name',
                'products.productIdlong',
                'cart.product_note',
                'cartorder.cartorderId',
                'cartorder.review',
                DB::raw('COUNT(1) as qty'))
            ->leftJoin('voucher', 'voucher.voucher_id', '=', 'orders.voucher_id')
            ->join('cartorder', 'cartorder.order_id', '=', 'orders.order_id')
            ->join('cart', 'cartorder.cart_id', '=', 'cart.cart_id')
            ->join('products', 'cart.product_id', '=', 'products.productIdlong')
            ->where('orders.order_id', $orderId->order_id)
            ->groupBy('orders.user_id')
            ->groupBy('voucher.voucher_code')
            ->groupBy('orders.full_name')
            ->groupBy('orders.status')
            ->groupBy('orders.mailing_address')
            ->groupBy('orders.delivery_address')
            ->groupBy('orders.contact_number')
            ->groupBy('orders.mode_of_payment')
            ->groupBy('orders.reference_no')
            ->groupBy('orders.amount')
            ->groupBy('orders.voucher_id')
            ->groupBy('orders.voucher_proof')
            ->groupBy('orders.notes')
            ->groupBy('products.name')
            ->groupBy('products.productIdlong')
            ->groupBy('cart.product_note')
            ->groupBy('orders.order_id')
            ->groupBy('cartorder.cartorderId')
            ->groupBy('cartorder.review')
            ->get();
    }

    private function getID($id) {
        if (is_string($id)) {
            $userId = $id;
        } elseif ($id == null) {
            $userId = hash('ripemd160', shell_exec('getmac'));
        }  elseif ($id->id == null) {
            $userId = hash('ripemd160', shell_exec('getmac'));
        } else {
            $userId = $id->id;
        }
        return $userId;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //GET DATA FROM WEB
use Illuminate\Support\Facades\Storage; //GET DATA FROM STORAGE
use \App\Models\User;
use \App\Models\Cart;
use \App\Models\Orders;
use \App\Models\CartOrder;
use Auth;
use DB;

class BillsController extends Controller
{
    //

    public function create(Request $request){

        $userId = $this->getID(Auth::user());
        $productslist = explode(',', $request->productlist);
        $carttocheckout = DB::table('cart')
            ->select('cart.user_id', 'cart.product_id', 'cart.product_note', 'products.productIdlong', 'products.name', 'products.thumbnailUrl', 'products.foreignName', 'products.thumbnailUrl', 'products.url', 'products.sellingPrice', 'products.productSize', DB::raw('COUNT(1) as numberoforder'), DB::raw('(COUNT(1) * products.sellingPrice) as totalamount'))
            ->join('products', 'products.productIdlong', '=', 'cart.product_id')
            ->where('cart.user_id', $userId)
            ->where('cart.status', 'added')
            ->whereIn('cart.product_id', $productslist)
            ->groupBy('cart.product_id')
            ->groupBy('cart.user_id')
            ->groupBy('cart.product_note')
            ->groupBy('products.productIdlong')
            ->groupBy('products.name')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.foreignName')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.url')
            ->groupBy('products.sellingPrice')
            ->groupBy('products.productSize')
            ->get();

        $countitem = DB::table('cart')
                 ->select(DB::raw('count(*) as count'))
                 ->where('user_id', $userId)
                 ->where('status', 'added')
                 ->whereIn('product_id', $productslist)
                 ->first()
                 ->count;

        $checkallvouchersonorderuser = DB::table('orders')
        ->select(DB::raw('GROUP_CONCAT(voucher_id) as vouchers'))
        ->where('user_id', $userId)
        ->get();
        
        $listofvoucher = $checkallvouchersonorderuser[0]->vouchers;
        $listofvoucherarr = explode(',', $listofvoucher);
        $datetoday = date("Y-m-d");
        if ($this->islogin(Auth::user())) {
        $checkvoucher3 = DB::table('voucher')
            ->select('voucher_id', 'specific_user', 'voucher_code', 'required_items', 'discount_type', 'discount', 'proof_needed', 'valid_date_end', 'valid_date_start','all_users')
            ->where('valid_date_start', '<=', $datetoday)
            ->where('valid_date_end', '>=', $datetoday)
            ->where('required_items', '<=', intval($countitem))
            ->where('specific_user', '=', null)
            ->where('all_users', '=', 1)
            ->whereNotIn('voucher_id', $listofvoucherarr)
            ->get();
        } 
            $checkvoucher = DB::table('voucher')
                ->select('voucher_id', 'specific_user', 'voucher_code', 'required_items', 'discount_type', 'discount', 'proof_needed', 'valid_date_end', 'valid_date_start')
                ->where('valid_date_start', '<=', $datetoday)
                ->where('valid_date_end', '>=', $datetoday)
                ->where('required_items', '<=', intval($countitem))
                ->where('specific_user', '=', null)
                ->where('all_users', '=', 0)
                ->whereNotIn('voucher_id', $listofvoucherarr)
                ->get();
            $checkvoucher2 = DB::table('voucher')
                ->select('voucher_id', 'specific_user', 'voucher_code', 'required_items', 'discount_type', 'discount', 'proof_needed', 'valid_date_end', 'valid_date_start')
                ->where('valid_date_start', '<=', $datetoday)
                ->where('valid_date_end', '>=', $datetoday)
                ->where('required_items', '<=', intval($countitem))
                ->where('specific_user', '=', $userId)
                ->where('all_users', '=', 0)
                ->whereNotIn('voucher_id', $listofvoucherarr)
                ->get();
        


            $ctr = 0;
            $arr1 = array();
            foreach ($checkvoucher as $voucheradd){
                $arr1[$ctr]['voucher_id'] = $voucheradd->voucher_id;
                $arr1[$ctr]['specific_user'] = $voucheradd->specific_user;
                $arr1[$ctr]['voucher_code'] = $voucheradd->voucher_code;
                $arr1[$ctr]['required_items'] = $voucheradd->required_items;
                $arr1[$ctr]['discount_type'] = $voucheradd->discount_type;
                $arr1[$ctr]['discount'] = $voucheradd->discount;
                $arr1[$ctr]['proof_needed'] = $voucheradd->proof_needed;
                $arr1[$ctr]['valid_date_start'] = $voucheradd->valid_date_start;
                $arr1[$ctr]['valid_date_end'] = $voucheradd->valid_date_end;
                $ctr++;
            }
            foreach ($checkvoucher2 as $voucheradd){
                $arr1[$ctr]['voucher_id'] = $voucheradd->voucher_id;
                $arr1[$ctr]['specific_user'] = $voucheradd->specific_user;
                $arr1[$ctr]['voucher_code'] = $voucheradd->voucher_code;
                $arr1[$ctr]['required_items'] = $voucheradd->required_items;
                $arr1[$ctr]['discount_type'] = $voucheradd->discount_type;
                $arr1[$ctr]['discount'] = $voucheradd->discount;
                $arr1[$ctr]['proof_needed'] = $voucheradd->proof_needed;
                $arr1[$ctr]['valid_date_start'] = $voucheradd->valid_date_start;
                $arr1[$ctr]['valid_date_end'] = $voucheradd->valid_date_end;
                $ctr++;
            }
            foreach ($checkvoucher3 as $voucheradd){
                $arr1[$ctr]['voucher_id'] = $voucheradd->voucher_id;
                $arr1[$ctr]['specific_user'] = $voucheradd->specific_user;
                $arr1[$ctr]['voucher_code'] = $voucheradd->voucher_code;
                $arr1[$ctr]['required_items'] = $voucheradd->required_items;
                $arr1[$ctr]['discount_type'] = $voucheradd->discount_type;
                $arr1[$ctr]['discount'] = $voucheradd->discount;
                $arr1[$ctr]['proof_needed'] = $voucheradd->proof_needed;
                $arr1[$ctr]['valid_date_start'] = $voucheradd->valid_date_start;
                $arr1[$ctr]['valid_date_end'] = $voucheradd->valid_date_end;
                $ctr++;
            }
        
        $users = DB::table('users')
        ->select('name', 'firstName', 'lastName', 'deliveryAddress', 'email', 'contact_no')
        ->where('id', $userId)
        ->get();
        
        $shipping = DB::table('shipping')
        ->select('shippindId', 'shippingcondition', 'price')
        ->get();
            if (count($users) == 0) {
                $users = array();
                $newusers = array('name' => '', 'firstName' => '', 'lastName' => '', 'deliveryAddress' => '', 'email' => '', 'contact_no' => '');
                $users[0] = (object)$newusers;
            }


        return view('bills.create', [
            'carttocheckout'=>$carttocheckout,
            'voucher' => $arr1,
            'user' => $users[0],
            'shipping' => $shipping
        ]);

    }

    private function getID($id) {
        if (is_string($id)) {
            $userId = $id;
        } elseif ($id == null) {
            $userId = hash('ripemd160', shell_exec('getmac'));
        } elseif ($id->id == null) {
            $userId = hash('ripemd160', shell_exec('getmac'));
        } else {
            $userId = $id->id;
        }
        return $userId;
    }

    private function islogin($id){
        if (is_string($id)) {
            return false;
        } elseif ($id == null) {
            return false;
        } elseif ($id->id == null) {
            return false;
        } else {
            return true;
        }
    }

}

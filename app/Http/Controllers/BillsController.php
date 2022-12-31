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
            ->select('cart.user_id', 'cart.product_id', 'cart.product_note', 'products.productIdlong', 'products.name', 'products.thumbnailUrl', 'products.productStatusId', 'products.foreignName', 'products.thumbnailUrl', 'products.url', 'products.sellingPrice', 'products.productSize', DB::raw('COUNT(1) as numberoforder'), DB::raw('(COUNT(1) * products.sellingPrice) as totalamount'))
            ->join('products', 'products.productIdlong', '=', 'cart.product_id')
            ->where('cart.user_id', $userId)
            ->where('cart.status', 'added')
            ->groupBy('cart.product_id')
            ->groupBy('cart.user_id')
            ->groupBy('cart.product_note')
            ->groupBy('products.productIdlong')
            ->groupBy('products.name')
            ->groupBy('products.thumbnailUrl')
            ->groupBy('products.productStatusId')
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
        $checkvoucher = DB::table('voucher')
            ->select('voucher_id', 'specific_user', 'voucher_code', 'required_items', 'discount_type', 'discount', 'proof_needed')
            ->where('valid_date_start', '<=', $datetoday)
            ->where('valid_date_end', '>=', $datetoday)
            ->where('required_items', '<=', intval($countitem))
            ->where('specific_user', '=', '')
            ->whereNotIn('voucher_id', $listofvoucherarr)
            ->get();
        $checkvoucher2 = DB::table('voucher')
            ->select('voucher_id', 'specific_user', 'voucher_code', 'required_items', 'discount_type', 'discount', 'proof_needed')
            ->where('valid_date_start', '<=', $datetoday)
            ->where('valid_date_end', '>=', $datetoday)
            ->where('required_items', '<=', intval($countitem))
            ->where('specific_user', '=', $userId)
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
                $ctr++;
            }
        
        $users = DB::table('users')
        ->select('name', 'firstName', 'lastName', 'deliveryAddress', 'email', 'contact_no')
        ->where('id', $userId)
        ->get();
            if (count($users) == 0) {
                $users = array();
                $newusers = array('name' => '', 'firstName' => '', 'lastName' => '', 'deliveryAddress' => '', 'email' => '', 'contact_no' => '');
                $users[0] = (object)$newusers;
            }
        return view('bills.create', [
            'carttocheckout'=>$carttocheckout,
            'voucher' => $arr1,
            'user' => $users[0]
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

}

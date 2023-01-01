Hello <strong>{{ $info[0]->full_name }}</strong>,
<p>Delivery Address:{{$info[0]->delivery_address}}</p> <br>
<p>Delivery Address:{{$info[0]->status}}</p> <br>
<p>Delivery Address:{{$info[0]->contact_number}}</p> <br>
<p>Delivery Address:{{$info[0]->mode_of_payment}}</p> <br>
<p>Delivery Address:{{$info[0]->voucher_code}}</p> <br>
<p>Delivery Address:{{$info[0]->delivery_address}}</p> <br>
<p>Amount:{{$info[0]->amount}}</p> <br><br><br>

@foreach($info as $prodinfo)

<p>Product ID:{{$prodinfo->productIdlong}}</p> <br>
<p>Product :{{$prodinfo->name}}</p> <br><br>

@endforeach
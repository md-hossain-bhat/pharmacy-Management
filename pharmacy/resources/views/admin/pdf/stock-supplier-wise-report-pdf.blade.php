<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
            <table width="100%">
              
                    <tbody>
                        <tr>
                            <td width="25%"></td>
                            <td width="70%"><span style="font-size:30px;">Hena Ahmed Hospital</span><br><small style="margin-left='40px'">Address : Samoly,Dhaka</small></td>
                            <td width="15%"><small>Phone :+88638793008</small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="35%"></td>
                        <td width="35%"><small style ="font-size:14px;"><strong><u>Supplier wise Stock Report</u></strong></small></td>
                        <td width="30%"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <strong>Supplier Name : </strong> {{$products['0']['supplier']['name']}}
        <table width="100%" border="1px;">
                  <thead>
                  <tr>
                    <th width="10%">Id</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Genaric</th>
                    <th>Medicine</th>
                    <th>In.Qty</th>
                    <th>Out.Qty</th>
                    <th>Stock</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $key => $product)
                    @php 
                      $buying_total = App\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status',1)->sum('buying_qty');
                      $selling_total = App\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status',1)->sum('selling_qty');

                    @endphp
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$product['company']['name']}}</td>
                    <td>{{$product['category']['name']}}</td>
                    <td>{{$product['brand']['brand_name']}}</td>
                    <td>{{$product['product_name']}}</td>
                    <td>{{$buying_total}}</td>
                    <td>{{$selling_total}}</td>
                    <td>{{$product['quantity']}}-{{$product['unit']['name']}}</td>
                  </tr>
                   @endforeach
                  </tbody>
                </table>
       </div>
    </div>

     <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom:0px;">
                        <table border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%">
                                        <p style="text-align:center; margin-left:20px;"></p>
                                    </td>
                                    <td width="20%"></td>
                                    <td width="40%">
                                        <p style="text-align:center;"><u>Signature</u></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @php 
                    $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                @endphp
                <small><i>Printing Time : {{$date->format('F j, Y, g:i a')}}</i></small>
    </div>

</body>
</html>
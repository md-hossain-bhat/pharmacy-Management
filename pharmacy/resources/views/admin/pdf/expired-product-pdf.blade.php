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
                        <td width="50%"><small style ="font-size:14px;"><strong><u>Expired Medicine</u></strong></small></td>
                        <td width="15%"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
     
        
        <table width="100%" border="1px">
                  <thead>
                  <tr>
                  <th width="5%">Id</th>
                    <th>Supplier</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Genaric</th>
                    <th>Medicine</th>
                    <th>Expire Date</th>
                    <th>Stock</th>
                    <th>Strength</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($purchases as $key => $purchase)
                   <tr>
                   <td>{{$key+1}}</td>
                    <td>{{$purchase['supplier']['name']}}</td>
                    <td>{{$purchase['company']['name']}}</td>
                    <td>{{$purchase['category']['name']}}</td>
                    <td>{{$purchase['brand']['brand_name']}}</td>
                    <td>{{$purchase['product']['product_name']}}</td>
                    <td>{{date('d-M-Y',strtotime($purchase['ex_date']))}}</td>
                    <td>{{$purchase['buying_qty']}}</td>
                    <td>{{$purchase['product']['unit']['name']}}</td>
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
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
                        <td width="20%"></td>
                        <td width="60%"><small style ="font-size:14px;"><strong><u>Daly Invoice Report({{date('d-M-Y',strtotime($fast_date))}}-{{date('d-M-Y',strtotime($last_date))}})</u></strong></small></td>
                        <td width="20%"></td>
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
                    <th width="10%">Purchase No</th>
                    <th width="17%">Date</th>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Buying Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php 
                    $total_sum = '0';
                  @endphp
                    @foreach($purchases as $key => $purchase)
                  <tr>
                    <td>{{$purchase['purchase_no']}}</td>
                    <td>{{date('d-M-Y',strtotime($purchase['date']))}}</td>
                    <td>{{$purchase['product']['product_name']}}</td>
                    <td>{{$purchase['buying_qty']}}-{{$purchase['product']['unit']['name']}}</td>
                    <td>{{$purchase['unit_price']}}</td>
                    <td>{{$purchase['buying_price']}}</td>
                  </tr>
                  @php 
                        $total_sum += $purchase['buying_price'];
                    @endphp
                   @endforeach
                   <tr>
                    <td style="text-align:right;" colspan="5"><strong>Grand Total</strong></td>
                    <td>{{$total_sum}}</td>
                   </tr>
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
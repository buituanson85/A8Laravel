<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Success</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content-cash">
                <h1 class="heading">{{ $details['title'] }}</h1>
                <h2 class="title">{{ $details['body'] }}</h2>
                <h3>{{ $details['date'] }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h3>Information line</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_sale = 0;
                            $total_regular = 0;
                            $count = 0;
                        @endphp
                        @if(Session::get('cart') == true)

                            @foreach(Session::get('cart') as $cart)
                                @php
                                    $subtotal_sale = $cart['product_sale_price']*$cart['product_qty'];
                                    $subtotal_regular = $cart['product_regular_price']*$cart['product_qty'];
                                    $total_sale += $subtotal_sale;
                                    $total_regular += $subtotal_regular;
                                    $count++;
                                @endphp
                                <tr>
                                    <td>
                                        <figure><img width="113" height="113" src="https://i.imgur.com/HqgDYmC.png" alt="shipping cart"></figure>
                                    </td>
                                    <td>
                                        <div class="price price-contain">
                                            <ins><span>{{ $cart['product_sale_price'] }}</span></ins>
                                            <del><span>{{ $cart['product_regular_price'] }}</span></del>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="quantity-box type1">
                                            <div class="qty-input">
                                                <span>{{ $cart['product_qty'] }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price price-contain">
                                            <ins><span id="sale_price_{{ $cart['session_id'] }}" class="price-amount"><span class="currencySymbol">£</span>{{ $subtotal_sale }}</span></ins>
                                            <del><span id="regular_price_{{ $cart['session_id'] }}" class="price-amount"><span class="currencySymbol">£</span>{{ $subtotal_regular }}</span></del>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="cart_item">
                                <td><span style="font-size: 18px;color: red;">Please add product to cart</span></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <h3>See you again!</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

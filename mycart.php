<?php
session_start();

?>
<html>
        <head>
            <title>cart</title>
            
        </head>
        <style>
            a{
            text-decoration-line: none;
            font-size: 21px;
            margin: 8px;
            text-decoration-color: darkblue;
            }
            h1{
                text-align: center;
                background-color: darkgoldenrod;
                padding: 5px;
                border-radius: 18px;
            }
            hr{
                outline-style:groove;
            }
            h2{
                text-align:center;
            }
            .total{
                text-align:center;
                border:1px solid;
                display:inline-block;
                float:right;
                padding:2px;
                margin:5px;
            }
            .table{
                text-align:center;
                border:1px solid;
                display:inline-block;
                position:absolute;
                margin:5px;
                padding:2px;
            }
            
        </style>
        <body>
            <h1>SECOND HAND BOOK SELLER</h1>

            <a href="cart.html">Book Store</a>
            <a href="contactus.html">Contact Us</a>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center border rounded bg-light my-5">
                        <h2>MY CART</h2>
                    </div>
                    <div class="col-lg-9">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Serial No.</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $total=0;
                                    if(isset($_SESSION['cart']))
                                    {
                                        foreach($_SESSION['cart'] as $key => $value)
                                        {
                                            $sr=$key+1;
                                            $total=$total+$value['price'];
                                            echo"
                                            <tr>
                                                <td>$sr</td>
                                                <td>$value[item_name]</td>
                                                <td>$value[price] <input type='hidden' class='iprice' value='$value[price]'></td>
                                                <td>
                                                
                                                <input class='text-center iquantity'  onchange='subtotal()' type='number' value='$value[quantity]' min='1' max='4'>
                                                
                                                </td>
                                                <td class='itotal'></td>
                                                <td>
                                                <form action='addtocart.php' method='post'>
                                                <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                                <input type='hidden' name='item_name' value='$value[item_name]'>
                                                </form>
                                                </td>
                                            </tr>
                                            ";
                                        }
                                    }
                                ?>
                                
                            </tbody>
                        </table> 
                    </div>
                    <div class="total col-lg-3">
                        <div class="border rounded bg-light p-4">
                            <h4>Grand Total:</h4>
                            <h5 class="text-right" id="gtotal"></h5><br>
                            
                            <form>
                                <input type="radio" name="radiobtn" id="radiobtn" value="cod">Cash On Delivery
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div> 
            <script>
                var gt=0;
                var iprice=document.getElementsByClassName('iprice');
                var iquantity=document.getElementsByClassName('iquantity');
                var itotal=document.getElementsByClassName('itotal');
                var gtotal=document.getElementById('gtotal');

                function subtotal()
                {
                    gt=0;
                    for(i=0;i<iprice.length;i++)
                    {
                        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                        gt=gt+(iprice[i].value)*(iquantity[i].value);
                    }
                    gtotal.innerText=gt;
                }

                subtotal();
            </script> 
        </body>
</html>




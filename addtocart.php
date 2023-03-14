<?php
    session_start();
    // session_destroy();

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_to_cart']))
        {
            if(isset($_SESSION['cart']))
            {
                $myitems=array_column($_SESSION['cart'],'item_name');
                if(in_array($_POST['item_name'],$myitems))
                {
                    echo "<script>
                            alert('Item Already Added');
                            window.location.href='cart.html';
                            </script>";
                }
                else
                {   $count=count($_SESSION['cart']);    
                    $_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'quantity'=>1);
                    echo "<script>
                        alert('Item Added');
                        window.location.href='cart.html';
                        </script>";
                }
            }
            else
            {
                $_SESSION['cart'][0]=array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'quantity'=>1);
                echo "<script>
                alert('Item Added');
                window.location.href='cart.html';
                </script>";
            }
        }
        if(isset($_POST['Remove_Item']))
        {
            foreach($_SESSION['cart'] as $key =>$value)
            {
                if($value['item_name']==$_POST['item_name'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo"<script>
                        alert('Item Removed')
                        window.location.href='mycart.php';
                        </script>";
                }
                
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Basket</title>
        <link rel="stylesheet" href="Stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body style="font-family: Poppins;">

    <?php 
        require "Item.php";

        $shoppingCart = array();

        $restoreCart = file_get_contents("shoppingCart.txt");
        $shoppingCart = unserialize($restoreCart);
        
        if($_POST){
            if(isset($_POST["add".$Craghopper->itemId])){
                $shoppingCart[] = $Craghopper;
            }
            if(isset($_POST["add".$Volcom->itemId])){
                $shoppingCart[] = $Volcom;
            }
        }

        $totalCost = 0.0;
        
        if(!empty($shoppingCart)){
            for($X=0;$X<count($shoppingCart);$X++) {
                $shoppingCart[$X]->itemQty = isset($_POST["quantity".$X]) && $_POST["quantity".$X] > 0 ? $_POST["quantity".$X] : 1;
            }
        
            if($_POST){
                for($X=0;$X<count($shoppingCart);$X++) {
                    if(isset($_POST["dec".$X]) && $shoppingCart[$X]->itemQty > 1){
                        $shoppingCart[$X]->itemQty--;
                    } 
                    if(isset($_POST["inc".$X])){
                        $shoppingCart[$X]->itemQty++;
                    }
                    if(isset($_POST["remove".$X])){
                        \array_splice($shoppingCart, $X, 1);
                    }
                }

                for($X=0;$X<count($shoppingCart);$X++) {               
                    $totalCost += $shoppingCart[$X]->itemPrice * $shoppingCart[$X]->itemQty;
                }

                $totalCost = number_format($totalCost,2);
            }
        }else{
            $shoppingCart = array();
        }

        $savedCart = serialize($shoppingCart);
        file_put_contents("shoppingCart.txt", $savedCart);

        $cartCount = count($shoppingCart);
    ?>

    <div class="title"><h1>YOUR BASKET (<?php echo $cartCount; ?>)</h1></div>

    <form class="basket" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div class="items">
            <button class="hidden"></button>
            <div class="additems" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
                <button name="<?php echo "add".$Craghopper->itemId; ?>">Craghopper</button>
                <button name="<?php echo "add".$Volcom->itemId; ?>">Volcom</button>
            </div>
            <?php  
            if(!empty($shoppingCart)){  
                for($X=0;$X<count($shoppingCart);$X++) { ?>
                <div class="item">
                    <img src=<?php echo $shoppingCart[$X]->itemImg; ?> height="100px" width="100px"><div class="itemdes">
                    <div class="itemName"><?php echo $shoppingCart[$X]->itemName; ?> <span style="font-size: 12px; color:gray; line-height: 15px"><?php echo $shoppingCart[$X]->itemColor; ?><br><?php echo $shoppingCart[$X]->itemSize; ?></span></div>
                    <div class="quantity"><button name="<?php echo "dec".$X; ?>">-</button> <input type="number" name="<?php echo "quantity".$X; ?>" style="width: 30px; height: 28px; border: 0px;" value="<?php echo $shoppingCart[$X]->itemQty; ?>"> <button name="<?php echo "inc".$X; ?>">+</button></div>
                    <div class="price"><?php echo "£".number_format($shoppingCart[$X]->itemPrice * $shoppingCart[$X]->itemQty,2); ?><button style="width: fit-content; background-color: #ffffff00;" name="<?php echo "remove".$X; ?>">Remove</button></div></div>
                </div><hr>
            <?php } 
            } else {?>
                <div>Your basket is currently empty.</div>
            <?php } ?>
        </div>
        <div class="checkout">
            <div class="cost"> <span class="subtotal">Sub-total <span><?php echo "£".$totalCost ?></span></span> <br><br> <span class="total" >TOTAL COST <span><?php echo "£".$totalCost ?></span></span> </div>
            <div class="promo"><span style="font-weight: bold;">Add Promotional Code</span> <span style="font-size: small;">One code per order</span> <span style="display:flex; margin-top: 5px;"><input class="promobox" type="text" name="promo" placeholder="Promo code"><button class="promobtn">></button></span> </div>
            <div><button class="proceedbtn">PROCEED TO CHECKOUT</button></div>
        </div>
    </form>
        
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Basket</title>
        <link rel="stylesheet" href="Stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body style="font-family: Poppins;">

    <?php 
        $quantity1 = isset($_POST["quantity1"]) && $_POST["quantity1"] > 0 ? $_POST["quantity1"] : 1;
        $quantity2 = isset($_POST["quantity2"]) && $_POST["quantity2"] > 0 ? $_POST["quantity2"] : 1;
        if($_POST){
            
            if(isset($_POST["dec1"]) && $quantity1 > 1){
                $quantity1--;
            } 
            if(isset($_POST["inc1"])){
                $quantity1++;
            }

            if(isset($_POST["dec2"]) && $quantity2 > 1){
                $quantity2--;
            } 
            if(isset($_POST["inc2"])){
                $quantity2++;
            }
            
        }
    ?>
    <div class="title"><h1>YOUR BASKET</h1></div>

    <div class="basket">
        <form class="items" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
            <button class="hidden"></button>
            <div class="item">
                <img src="Craghopper.png" alt="Craghopper" height="100px" width="100px"><div class="itemdes">
                <div class="itemName">Craghoppers Creevey Jacket Waterproof Jacket <span style="font-size: 12px; color:gray; line-height: 15px">Posidon Blue<br> Medium / 40 inch</span></div>
                <div class="quantity"><button name="dec1">-</button> <input type="number" name="quantity1" style="width: 30px; height: 28px; border: 0px;" value="<?php echo $quantity1; ?>"> <button name="inc1">+</button></div>
                <div class="price">£59.95</div></div>
            </div>
            <hr>
            <div class="item">
                <img src="Volcom.png" alt="Volcom" height="100px" width="100px"><div class="itemdes">
                <div class="itemName">Volcom Scortch Insulated Snow Jacket <span style="font-size: 12px; color:gray; line-height: 15px">Acid Black<br>Large / 42 - 44inch</span></div>
                <div class="quantity"><button name="dec2">-</button> <input type="number" name="quantity2" style="width: 30px; height: 28px; border: 0px;" value="<?php echo $quantity2; ?>"> <button name="inc2">+</button></div>
                <div class="price">£105.95</div></div>
            </div>
            <hr>
        </form>
        <div class="checkout">
            <div class="cost"> <span class="subtotal">Sub-total <span>£165.90</span></span> <br><br> <span class="total" >TOTAL COST <span>£165.90</span></span> </div>
            <div class="promo"><span style="font-weight: bold;">Add Promotional Code</span> <span style="font-size: small;">One code per order</span> <span style="display:flex; margin-top: 5px;"><input class="promobox" type="text" name="promo" placeholder="Promo code"><button class="promobtn">></button></span> </div>
            <div><button class="proceedbtn">PROCEED TO CHECKOUT</button></div>
        </div>
    </div>
        
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Basket</title>
        <link rel="stylesheet" href="Stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body style="font-family: Poppins;">

    <?php 
        $quantity = 0;

        if($_POST){
            
            $quantity = isset($_POST["quantity"])? $_POST["quantity"] : 1;
            
            if(isset($_POST["dec"])){
                echo "dec";
                $quantity--;
                echo $quantity;
            } 
            if(isset($_POST["inc"])){
                echo "inc";
                $quantity++;
                echo $quantity;
            }
            
        }
    ?>

    <div class="basket">
        <div style="font-size: 14px;"><h1>YOUR BASKET</h1></div>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="items">
                <div class="item">
                    <img src="Craghopper.png" alt="Craghopper" height="100px" width="100px">
                    <div class="itemName">Craghoppers Creevey Jacket Waterproof Jacket <span style="font-size: 12px; color:gray; line-height: 15px">Posidon Blue<br> Medium / 40 inch</span></div>
                    <div class="quantity"><button name="dec">-</button> <input type="number" name="quantity" style="width: 30px; height: 28px; border: 0px;" value="<?php echo $quantity; ?>" readonly> <button name="inc">+</button></div>
                </div>
                <hr>
                <div class="item">
                    <img src="Volcom.png" alt="Volcom" height="100px" width="100px">
                    <div class="itemName">Volcom Scortch Insulated Snow Jacket <span style="font-size: 12px; color:gray; line-height: 15px">Acid Black<br>Large / 42 - 44inch</span></div>
                </div>
                <hr>
            </div>
        </form>
    </div>
        
    </body>
</html>
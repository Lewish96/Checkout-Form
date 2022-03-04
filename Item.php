<?php

    class Item{
        public $itemId = 0;
        public $itemImg = "";
        public $itemName = "";
        public $itemColor = "";
        public $itemSize = "";
        public $itemQty = "";
        public $itemPrice = "";
    }


    $Craghopper = new Item();
    $Craghopper->itemId = 1;
    $Craghopper->itemImg = '"Craghopper.png" alt="Craghopper"';
    $Craghopper->itemName = "Craghoppers Creevey Jacket Waterproof Jacket";
    $Craghopper->itemColor = "Posidon Blue";
    $Craghopper->itemSize = "Medium / 40 inch";
    $Craghopper->itemQty = "1";
    $Craghopper->itemPrice = 59.95;

    $Volcom = new Item();
    $Volcom->itemId = 2;
    $Volcom->itemImg = '"Volcom.png" alt="Volcom"';
    $Volcom->itemName = "Volcom Scortch Insulated Snow Jacket";
    $Volcom->itemColor = "Acid Black";
    $Volcom->itemSize = "Large / 42 - 44inch";
    $Volcom->itemQty = "1";
    $Volcom->itemPrice = 105.95;
?>
<?php
function check_txnid($tnxid){

    global $link;

    return true;

    $valid_txnid = true;

    //get result set

    $sql = mysql_query("SELECT * FROM `payments` WHERE txnid = '$tnxid'", $link);

    if ($row = mysql_fetch_array($sql)) {

        $valid_txnid = false;

    }

    return $valid_txnid;

}

function check_price($price, $id){

    $valid_price = false;

    //you could use the below to check whether the correct price has been paid for the product

    /*
19
    $sql = mysql_query("SELECT amount FROM `products` WHERE id = '$id'");
20
    if (mysql_num_rows($sql) != 0) {
21
        while ($row = mysql_fetch_array($sql)) {
22
            $num = (float)$row['amount'];
23
            if($num == $price){
24
                $valid_price = true;
25
            }
26
        }
27
    }
28
    return $valid_price;
29
    */

    return true;

}

function updatePayments($data){

    global $link;

    if (is_array($data)) {

        $sql = mysql_query("INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES (

                '".$data['txn_id']."' ,

                '".$data['payment_amount']."' ,

                '".$data['payment_status']."' ,

                '".$data['item_number']."' ,

                '".date("Y-m-d H:i:s")."'

                )", $link);

        return mysql_insert_id($link);

    }

}
?>

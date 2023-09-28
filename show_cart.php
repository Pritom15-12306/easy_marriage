<?php
// include("inc/topBarNav.php");
include("connection.php");



$query = "SELECT * FROM items";
$res = mysqli_query($connect, $query);

$output = " ";


if (mysqli_num_rows($res) < 1) {
  $output .= "No Item";
}


while ($row = mysqli_fetch_array($res)) {

  $output .= "<div class='col-md-3 shadow-sm'>
        <img src='images/product/" . $row['image'] . "' style='height:250px;width:100%;'>
        <h5 class='text-center'>" . $row['name'] . "</h5>
        <h5 class='text-center'>BDT " . $row['price'] . "</h5>
        <input type='hidden' name='price' id='price" . $row['id'] . "' value='" . $row['price'] . "'>
        <input type='hidden' name='name' id='name" . $row['id'] . "' value='" . $row['name'] . "'>
        <input inputmode=”numeric” name='quantity' id='quantity" . $row['id'] . "' class='form-control' value='1'>

        <input type='submit' name='add_to_cart' class='btn read_more my-4 add' value='Add To cart' id='" . $row['id'] . "' style='margin-left:55px;'>


  	 </div>";
}


echo $output;

?>

<style>
  .read_more {
    font-size: 17px;
    background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
    color: #000;
    padding: 6px 0px;
    width: 100%;
    max-width: 157px;
    text-align: center;
    display: inline-block;
    transition: ease-in all 0.5s;
    font-weight: 500;
    border-radius: 5px;
    height: 43px;

  }

  .read_more:hover {
    background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
    color: #fff;
    transition: ease-in-out all 0.5s;
  }
</style>
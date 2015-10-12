<!DOCTYPE html>
<html lang="en">
    <head>  
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/core.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/css/main.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <H4>Orders List</h4>
    <table id='Table' width="500" border="0" align="center">
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>First Name</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Purchased Price</th>
                <th>Profit</th>
                <th>Quantity</th>
                <th>Price Without VAT</th>
                <th>Total</th>


            </tr>
        </thead>
        <tbody>

            <?php foreach ($orders as $order) {
                ?>
                <tr>
                    <td><input type="checkbox" name="checkbox" data-order-id="<?php echo $order['id']; ?>" ></td>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['first_name']; ?></td>
                    <td><?php echo "<a href=" . base_url() . "index.php/catalogue/single_product/" . $order['product_id'] . ">" . $order['name'] . "</a>"; ?></td>
                    <td><?php echo $order['product_price']; ?>&euro;</td>
                    <td><?php echo $order['purchased_price']; ?>&euro;</td>
                    <td class="profit"><?php echo $profit; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['price_without_vat']; ?>&euro;</td>
                    <td><?php echo $order['total']; ?>&euro;</td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
    <button id="calculate_profit">Calculate Profit</button>

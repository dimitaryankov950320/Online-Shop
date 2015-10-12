<?php if (!$orders) { ?>
    <p><strong><?php echo 'You don\'t order any items yet.'; ?></strong></p>
<?php } 
    else{:
?>
<H4>Orders List</h4>
<table width="500" border="0" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Price Without VAT</th>
            <th>Total</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
<?php foreach ($orders as $order) { ?>
            <tr>
                <td><?php echo $i;
    $i++;
    ?></td>
                <td><?php echo $order['first_name']; ?></td>
                <td><?php echo "<a href=" . base_url() . "index.php/catalogue/single_product/" . $order['product_id'] . ">" . $order['name'] . "</a>"; ?></td>
                <td><?php echo $order['product_price']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['price_without_vat']; ?>&euro;</td>
                <td><?php echo $order['total']; ?>&euro;</td>
            </tr> 
<?php } ?>
    </tbody>
</table>
<?php }
?>
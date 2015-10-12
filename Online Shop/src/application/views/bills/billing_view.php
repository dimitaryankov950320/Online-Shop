<?php
$total = 0;
if ($cart = $this->cart->contents()):
    foreach ($cart as $item):
        $total = $total + $item['subtotal'];
    endforeach;
endif;
$vat_value = $total * (20 / 100);
$grand_total = $total + $vat_value;
?>
<body>
    <div id="bill_info">
        <form name="billing" method="post" action="<?php echo base_url() . 'index.php/orders/save_order' ?>" >
            <input type="hidden" name="command" />
            <div align="center">
                <h4 align="center">Billing Info</h4>
                <table border="0" cellpadding="2px">
                    <tr><th>Order Total:</th><td><strong>&euro;<?php echo number_format($grand_total, 2); ?></strong></td></tr>
                    <tr><th>First Name:</th><td><input type="text" name="first_name" required=""/></td></tr>
                    <tr><th>Last Name:</th><td><input type="text" name="last_name" required=""/></td></tr>
                    <tr><th>Address:</th><td><input type="text" name="address" required="" /></td></tr>
                    <tr><th>Email:</th><td><input type="text" name="email" required="" /></td></tr>
                    <tr><th>Phone:</th><td><input type="text" name="phone" required="" /></td></tr>
                    <?php echo form_hidden('total', $grand_total); ?>
                </table>
                <?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "index.php/catalogue>Back</a>"; ?> 
                <input class ='fg-button teal' type="submit" value="Place Order" />
            </div>
        </form>
    </div>
</body>



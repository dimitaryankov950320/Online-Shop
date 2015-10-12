<?php $i = 0; ?>
<?php $count = 0; ?>
<?php
foreach ($this->cart->contents() as $items):
    $i = $i + 1;
    $count = $count + $items['price'];
endforeach;
?>
<div class="right">
    <a href="<?php echo base_url();?>index.php/user/logout">Log out,<?php echo $username; ?></a> |
	<a href="<?php echo base_url();?>index.php/cart/view_orders/<?php echo $id; ?>">My Orders</a> |
	<a href="<?php echo base_url();?>index.php/cart">
        <img  src="<?php echo base_url(); ?>/assets/images/head_cart.jpg"/>Cart</a> 
		
</div>

<p><small>Number orders:<?php echo $i; ?></small></p>
<p><small>Total sum in card:<?php echo $count; ?>&euro;</small></p>

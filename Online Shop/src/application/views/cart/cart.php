<link href="<?php echo base_url(); ?>assets/css/core.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
<?php
if (!$this->cart->contents()){ ?>
    <p><strong><?php echo 'You don\'t have any items yet.';?></strong></p>
<?php }else{
    ?>
    <?php echo form_open('cart/update_cart'); ?>
    <table width="30%" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Qty</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>Sub-Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($this->cart->contents() as $items): ?>
                 <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                <tr <?php if ($i & 1) {
                         echo 'class="alt"';
                  } ?>>
                    <td>
                        <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                    </td>
                    <td><?php echo $items['name']; ?></td>
                    <td>&euro;<?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>&euro;<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

            <tr>
			    <td><strong>Total</strong></td>
                <td>&euro;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                <td><strong>VAT value:</strong></td>
                <td>&euro;<?php echo ($this->cart->format_number($this->cart->total()) * (20 / 100)); ?></td>
            </tr>
			<tr>
			    <td></td>
				<td></td>
			    <td><strong>Grand Total:</strong></td>
				<td>&euro;<?php echo (($this->cart->format_number($this->cart->total()) * (20 / 100)) + $this->cart->format_number($this->cart->total()));?></td>
			</tr>
                <th><p><?php echo form_submit('', 'Update your Cart');?></th>
	            <th><?php echo anchor('orders/place_orders', 'Place Orders','class="orders"');?></th>
                <th><?php echo anchor('cart/empty_cart', 'Empty Cart', 'class="empty"'); ?></p></th>    
                <th><a href="<?php echo base_url();?>index.php/catalogue">Go Back To Catalogue</a></th>			
		</tbody>
	</table>
	
    <p><small>If the quantity is set to zero, the item will be removed from the cart.</small></p>
    <?php
    echo form_close();
}
?>
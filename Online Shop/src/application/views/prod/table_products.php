<head>
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core.js"></script>
</head>
</br>
</br>
<table  align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Price</th>
		    <th>Quantity</th>
            <th>Add</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($products as $data): ?>
        <tr>   
			<td><?php echo $i; $i++;?></td>
			<td><?php echo "<a href=".base_url()."index.php/catalogue/single_product/$data->id>$data->name</a>"; ?></td>
			<td><?php echo $data->price; ?>&euro;</td>
			<?php echo form_open('cart/add_cart_item'); ?>
			<td><center><?php echo form_input('quantity', '1','size="2"', 'maxlength="2"'); ?></td>
			<?php echo form_hidden('product_id', $data->id); ?>
			<td><center><?php echo form_submit('add', 'Add'); ?></td>
			<?php echo form_close(); ?>
        </tr> 
        <?php endforeach; ?>
    </tbody>
</table>
<center><p><small><?php echo $links; ?></small></p>

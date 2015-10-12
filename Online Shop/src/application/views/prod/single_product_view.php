<head>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core.js"></script>

</head>
<center><fieldset>
        <?php foreach ($product as $data): 
             echo form_open('cart/add_cart_item'); ?>
            <legend><h4><?php echo $data['name']; ?></h4></legend>
            <p>Price:<?php echo $data['price']; ?>&euro;</p>
            <p>Description:<?php echo $data['description']; ?></p>
            <p>Quantity:<input size="2px" type="text" name="qty" value=""/></p>
            <input type="hidden" value='<?php echo $data['id']; ?>' id="product_id" name="product_id">
            <?php echo form_submit('add', 'Add');?>
             <?php echo form_close();?> 
        <?php endforeach; ?>
<?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "index.php/catalogue>Back</a>"; ?>
        <p><small>All prices don't include VAT value!</small></p>
    </fieldset>

<ul class="products">
    <?php foreach ($products as $p): ?>
        <li>
            <h3><?php echo $p['name']; ?></h3>
            <small>&euro;<?php echo $p['price']; ?></small>
            <?php echo form_open('cart/add_cart_item'); ?>
            <fieldset>
                <label>Quantity</label>
                <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                <?php echo form_hidden('product_id', $p['id']); ?>
                <?php echo form_submit('add', 'Add'); ?>
            </fieldset>
            <?php echo form_close(); ?>
        </li>
    <?php endforeach; ?>
</ul>
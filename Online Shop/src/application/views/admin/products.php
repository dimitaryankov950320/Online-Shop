<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Products</title>
        <style type="text/css">
            #infoMessage p{
                padding: .8em;
                margin-bottom: 1em;
                border: 2px solid #ddd;
                background: #FFF6BF;
                color: #817134;
                border-color: #FFD324;
            }
        </style>
    </head>
    <body>

        <div align="center">
            <h1 align="center">Products (<a href="<?php echo base_url() . 'manage' ?>">Manage</a>)</h1>
            <div id="infoMessage"><?php echo $message; ?></div>
            <table border="0" cellpadding="2px" width="600px">
                <?php
                foreach ($products as $product) {
                    $id = $product['id'];
                    $name = $product['name'];
                    $description = $product['description'];
                    $price = $product['price'];
                    ?>
                    <tr>
                        <td><img src="<?php echo $product['picture'] ?>" /></td>
                        <td><b><?php echo $name; ?></b><br />
                            <?php echo $description; ?><br />
                            Price:<big style="color:green">
                                $<?php echo $price; ?></big><br /><br />
                            <?php
                            echo form_open('cart/add');
                            echo form_hidden('id', $id);
                            echo form_hidden('name', $name);
                            echo form_hidden('price', $price);

                            echo form_close();
                            ?>
                        </td>
                    </tr>
                    <tr><td colspan="2"><hr size="1" /></td>
                    <?php } ?>
            </table>
        </div>
    </body>
</html>

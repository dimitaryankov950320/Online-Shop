<fieldset style="width:250px">
    <legend>Product:</legend>
    <?php foreach ($query as $row): ?>
        <p>Id:<?php echo $row['id']; ?></p>
        <p>Name:<?php echo $row['name']; ?></p>
        <p>Description:<?php echo $row['description']; ?></p>
        <p>Price:<?php echo $row['price']; ?></p>

    <?php endforeach; ?>
</fieldset>
<a href=" http://localhost:8000/index.php/admin">Go Back to Catalogue</a>
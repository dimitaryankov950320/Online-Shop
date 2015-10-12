<h1>Manage Product list</h1> 
</br>
<?php $string = "<a href=http://localhost:8000/index.php/admin/single_prod"; ?>
<table id="daily" class="ui-widget ui-widget-content" width="700px">  
    <tr class="ui-widget-header ">  
        <th>No</th>  
        <th>Product Name</th>  
        <th>Description</th>  
        <th>Price</th>  
        <th>Edit</th>  
        <th>Delete</th>  
    </tr>  
    <?php
    $i = 0;
    foreach ($product as $item) {
        $i++;
        echo "<tr class=\"record\">";
        echo "<td>$i</td>";
        echo "<td>$string/$item->id>$item->name</a></td>";
        echo "<td>$item->description</td>";
        echo "<td>$item->price</td>";
        echo "<td><a href=\"#\" class=\"edit\" id=\"$item->id\" name=\"$item->name\" description=\"$item->description\" price=\"$item->price\">Edit</a></td>";
        echo "<td><a class=\"delbutton\" id=\"$item->id\" href=\"#\" >Delete</a></td>";
        echo "</tr>";
    }
    ?>  
</table>  
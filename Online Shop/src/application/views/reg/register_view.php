<body>
    <div  align="center" class="container">
        <table border="0" cellpadding="2px">
            <?php echo form_open("user/do_register"); ?>
            <tr><th><label for="username">Username:</label></th>
                <td><input type="text" name="username"/></td></tr>
            <tr><th><label for="email">Email:</label></th>
                <td><input type="text" name="email"/></td></tr>
            <tr><th><label for="password">Password:</label></th>
                <td><input type="password" name="password"/></td></tr>
            <tr><th><label for="password">Retype Password:</label></th>
                <td><input type="password" name="password"/></td></tr>
            <tr><th><label for="username">Secure question:</label></th>
                <td><input type="text" name="question"/></td></tr>
            <tr><th><label for="gender">Gender</label></th>
                <td><input type="radio" name="gender" value="male"/>male
                    <input type="radio" name="gender" value="female"/>female</td></tr>
            <tr><td><strong><?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "index.php/main>Back</a>"; ?></strong></td>
                <th><input type="submit" value="Sign up" name="register"/></th></tr>    
            <?php echo form_close(); ?>
        </table>
    </div>
</body>
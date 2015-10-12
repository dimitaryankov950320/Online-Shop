<?php echo validation_errors(); ?>
<?php echo form_open('/user/verifylogin'); ?>
</br>
<center><div id="login_view">
    <table>
		<tr><th><label for="username">Username:</label></th>
		<td><input type="text" size="20" id="username" name="username"/></td></tr>
		<tr><th><label for="password">Password:</label></th>
		<td><input type="password" size="20" id="passowrd" name="password"/></td><tr>
		<tr><td></td><th><input type="submit" value="Login"/></th></tr>
    </table>
</div>    
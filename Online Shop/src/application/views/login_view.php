<?php echo validation_errors(); ?>
<?php echo form_open('user/verifylogin'); ?>
<center><label for="username">Username:</label>
    <center><input type="text" size="20" id="username" name="username"/>
        <center><label for="password">Password:</label>
            <center><input type="password" size="20" id="passowrd" name="password"/>
                <br/>
                <center><input type="submit" value="Login"/>
                    </form>
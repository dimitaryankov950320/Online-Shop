<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
        <script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/add_user.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/main.css" media="screen" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
        <H4>Users List</h4>

        <table id="users" width="500" border="0" align="center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($users as $user) {
                    ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['gender']; ?></td>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>

    <center><button id="add_user">Add User</button></center>
    <div id="form-add-user">  
        <table>  
            <?php echo form_open('admin/Add User'); ?>  
            <input type="hidden" value='' id="id" name="id">  
            <tr>  
                <td> <?php echo form_label('UserName : '); ?> </td>  
                <td> <?php echo form_input('username', '', 'id="username"'); ?></td>  
            </tr>  
            <tr>  
                <td> <?php echo form_label('Email : '); ?> </td>  
                <td> <?php echo form_input('email', '', 'id="email"'); ?></td>  
            </tr>  
            <tr>  
                <td> <?php echo form_label('Gender : '); ?> </td>  
                <td> <?php echo form_input('gender', '', 'id="gender"'); ?></td>  
            </tr>  
        </table>  
    </div>  
</body>
</html>  
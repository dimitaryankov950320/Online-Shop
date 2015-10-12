<html lang="en-US">  
    <head>  
        <title>Product List</title>  
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
        <script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js" ></script>
        <meta charset="UTF-8">  
        <link href="<?php echo base_url(); ?>assets/css/main.css" media="screen" rel="stylesheet" type="text/css" /> 
    </head>  

    <body>  
        <div id="show">  
            <?php $this->load->view('/admin/show'); ?>  
        </div>  
        <p>  
    <center><button id="create-product">Input New</button>  
    </p>  

    <div id="form_input">  
        <table>  
            <?php echo form_open('admin/submit'); ?>  
            <input type="hidden" value='' id="id" name="id">  

            <tr>  
                <td> <?php echo form_label('Name : '); ?> </td>  
                <td> <?php echo form_input('name', '', 'id="name"'); ?></td>  
            </tr>  
            <tr>  
                <td> <?php echo form_label('Description : '); ?> </td>  
                <td> <?php echo form_input('description', '', 'id="description"'); ?></td>  
            </tr>  
            <tr>  
                <td> <?php echo form_label('Price : '); ?> </td>  
                <td> <?php echo form_input('price', '', 'id="price"'); ?></td>  
            </tr>  
        </table>  
    </div>  

    <div id="dialog-confirm" title="Delete Item ?">  
        <p>  
            <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>  
            <input type="hidden" value='' id="del_id" name="del_id">  
            Are you sure?</p>  
    </div>  

</body>  
</html>  
<!DOCTYPE html>
<html lang="en">
    <?php
    foreach ($results as $row) {
        $title = $row->title;
        $header = $row->header;
    }
    ?>
    <head>
     <link href="<?php echo base_url(); ?>assets/css/main.css" media="screen" rel="stylesheet" type="text/css" /> 
     <meta charset="utf-8">
     <title><?php echo $title; ?></title>
    </head>
    <h1><CENTER><?php echo $header; ?></h1>

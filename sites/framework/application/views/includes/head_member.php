<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Vitor Jorge</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css.css" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen" charset="utf-8">
    </head>
    <body>
        <div id="wrap_content">
            <div id="header">
                <img id="logo" src="<?php echo base_url(); ?>img/logo.png">
                <ul id="menu">
                    <li><?php echo anchor('site/criar', 'Registo'); ?></li>
                    <li><?php echo anchor('site/pedidos', 'Histórico'); ?></li>
                    <li><?php echo anchor('site/logout', 'Sair'); ?></li>
                </ul>
            </div>
            <div class="box">

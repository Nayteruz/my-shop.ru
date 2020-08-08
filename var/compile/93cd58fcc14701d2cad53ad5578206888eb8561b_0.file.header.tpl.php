<?php
/* Smarty version 3.1.36, created on 2020-08-02 17:24:58
  from 'D:\OpenServer\domains\my-shop.ru\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26ccbad13ae6_08758079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93cd58fcc14701d2cad53ad5578206888eb8561b' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\header.tpl',
      1 => 1596364203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f26ccbad13ae6_08758079 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/assets/styles.css" rel="stylesheet" type="text/css">
    <title><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</title>
</head>
<body>
<div class="container site-wrap">
    <div class="header ">
        <div class="row bd-navbar">
            <ul class="navbar-nav bd-navbar-nav flex-row top-menu">
                <li class="nav-item"><a class="nav-link <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'list') {?>active<?php }?>" href="/products/list">Список товаров</a></li>
                <li class="nav-item"><a class="nav-link <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'folder') {?>active<?php }?>" href="/categories/list">Список категорий</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <aside class="col-3 left-column ">
            <nav class="nav flex-column nav-pills left-folders">
                <div class="folders-name">Категории</div>
                <ul class="navbar-nav list-group">
                    <?php echo $_smarty_tpl->tpl_vars['category']->value;?>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories_shared']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                        <li class="nav-item "><a class="list-group-item list-group-item-action <?php if ($_smarty_tpl->tpl_vars['current_category']->value['id'] == $_smarty_tpl->tpl_vars['category']->value['id']) {?>active<?php }?>" href="/categories/view?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </nav>
        </aside>
        <main class="col-9 text-side">
            <div class="content">
            <?php if ($_smarty_tpl->tpl_vars['h1']->value) {?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1><?php }
}
}

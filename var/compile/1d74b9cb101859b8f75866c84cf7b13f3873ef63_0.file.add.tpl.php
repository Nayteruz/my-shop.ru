<?php
/* Smarty version 3.1.36, created on 2020-08-05 19:00:52
  from 'D:\OpenServer\domains\my-shop.ru\templates\products\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2ad7b4dcbc55_85951150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d74b9cb101859b8f75866c84cf7b13f3873ef63' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\products\\add.tpl',
      1 => 1595772674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:products/form.tpl' => 1,
    'file:bottom.tpl' => 1,
  ),
),false)) {
function content_5f2ad7b4dcbc55_85951150 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>"Добавление товара"), 0, false);
?>
<p><a href="/products/list">Список товаров</a></p>
<p>
    <?php $_smarty_tpl->_subTemplateRender("file:products/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sub_name'=>"Добавить"), 0, false);
?>
</p>

<?php $_smarty_tpl->_subTemplateRender('file:bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

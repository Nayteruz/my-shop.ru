<?php
/* Smarty version 3.1.36, created on 2020-08-02 20:10:04
  from 'D:\OpenServer\domains\my-shop.ru\templates\products\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26f36c37de80_10008342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '658aeca84f4b3eaeafd8acb173958e16817c5e1a' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\products\\edit.tpl',
      1 => 1595772682,
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
function content_5f26f36c37de80_10008342 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>"Редактирование товара"), 0, false);
?>
<p><a href="/products/list">Список товаров</a></p>
<p>
    <?php $_smarty_tpl->_subTemplateRender("file:products/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sub_name'=>"Сохранить"), 0, false);
?>
</p>

<?php $_smarty_tpl->_subTemplateRender('file:bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

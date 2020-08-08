<?php
/* Smarty version 3.1.36, created on 2020-08-02 20:09:45
  from 'D:\OpenServer\domains\my-shop.ru\templates\categories\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26f359a1b817_79381218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33a18007e6c5c5289ae488784bd3366cf29b1c23' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\categories\\add.tpl',
      1 => 1595778010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:categories/form.tpl' => 1,
    'file:bottom.tpl' => 1,
  ),
),false)) {
function content_5f26f359a1b817_79381218 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>"Добавление категории"), 0, false);
?>
<p><a href="/categories/list">Список категорий</a></p>
<p>
    <?php $_smarty_tpl->_subTemplateRender("file:categories/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sub_name'=>"Добавить"), 0, false);
?>
</p>

<?php $_smarty_tpl->_subTemplateRender('file:bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

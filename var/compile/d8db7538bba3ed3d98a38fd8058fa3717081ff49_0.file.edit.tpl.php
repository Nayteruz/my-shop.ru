<?php
/* Smarty version 3.1.36, created on 2020-08-02 20:10:43
  from 'D:\OpenServer\domains\my-shop.ru\templates\categories\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26f393249900_47467692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8db7538bba3ed3d98a38fd8058fa3717081ff49' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\categories\\edit.tpl',
      1 => 1595778204,
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
function content_5f26f393249900_47467692 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>"Редактирование категории"), 0, false);
?>
<p><a href="/categories/list">Список категорий</a></p>
<p>
    <?php $_smarty_tpl->_subTemplateRender("file:categories/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sub_name'=>"Сохранить"), 0, false);
?>
</p>

<?php $_smarty_tpl->_subTemplateRender('file:bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

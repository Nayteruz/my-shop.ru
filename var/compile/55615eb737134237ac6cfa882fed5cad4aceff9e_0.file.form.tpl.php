<?php
/* Smarty version 3.1.36, created on 2020-08-06 18:55:09
  from 'D:\OpenServer\domains\my-shop.ru\templates\categories\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2c27dd2c95b5_52252767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55615eb737134237ac6cfa882fed5cad4aceff9e' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\categories\\form.tpl',
      1 => 1596645274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2c27dd2c95b5_52252767 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" class="form f400p">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
    <div class="form-group">
        <label class="col-form-label">Название:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" required>
    </div>
    <div class="form-group">
        <input class="form-control btn btn-primary" type="submit" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['sub_name']->value)===null||$tmp==='' ? "Cохранить" : $tmp);?>
">
    </div>
</form><?php }
}

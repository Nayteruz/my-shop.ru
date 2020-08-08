<?php
/* Smarty version 3.1.36, created on 2020-08-05 19:34:38
  from 'D:\OpenServer\domains\my-shop.ru\templates\products\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f2adf9ea48ff6_67746902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3b24fbcea394750a7806d8bb411b977bf7c15bb' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\products\\form.tpl',
      1 => 1596645263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2adf9ea48ff6_67746902 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" class="form f400p">
    <input class="form-control" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
    <div class="form-group">
        <label class="col-form-label">Название:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" required>

    </div>
    <div class="form-group">
        <label class="col-form-label">Категория:</label>
        <select class="form-control" name="category_id">
            <option value="0">Не выбрано</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <option <?php if ($_smarty_tpl->tpl_vars['product']->value['category_id'] == $_smarty_tpl->tpl_vars['category']->value['id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>

    </div>
    <div class="form-group">
        <label class="col-form-label">Артикул:</label>
        <input class="form-control" type="text" name="article" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['article'];?>
" required>
    </div>
    <div class="form-group">
        <label class="col-form-label">Описание:</label>
        <textarea class="form-control" name="anonce" cols="50" rows="5" required><?php echo $_smarty_tpl->tpl_vars['product']->value['anonce'];?>
</textarea>
    </div>
    <div class="form-group">
        <label class="col-form-label">Цена:</label>
        <input class="form-control" type="text" name="price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
" required>
    </div>
    <div class="form-group">
        <label class="col-form-label">Количество:</label>
        <input class="form-control" type="text" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
" required>
    </div>
    <div class="form-group">
        <input class="form-control btn btn-primary" type="submit" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['sub_name']->value)===null||$tmp==='' ? "Cохранить" : $tmp);?>
">
    </div>
</form><?php }
}

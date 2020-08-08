<?php
/* Smarty version 3.1.36, created on 2020-08-02 19:50:41
  from 'D:\OpenServer\domains\my-shop.ru\templates\categories\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26eee1a224d2_46619865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30e17d644df08fa68d9e546b57192262f90ab8e6' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\categories\\view.tpl',
      1 => 1596366481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:bottom.tpl' => 1,
  ),
),false)) {
function content_5f26eee1a224d2_46619865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>$_smarty_tpl->tpl_vars['current_category']->value['name'],'mode'=>"list"), 0, false);
?>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Артикул</th>
        <th>Цена</th>
        <th>Количество на складе</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['category_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['article'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
</td>
                        <td width="140">
                <a class="btn btn-primary" href='/products/edit?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
'>Ред.</a>
                <form style='display:inline;' method='post' action='/products/delete'><input type='hidden' name='id'
                                                                                             value='<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
'><input
                            class="btn btn-secondary" type='submit' value='Уд.'></form>
            </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php $_smarty_tpl->_subTemplateRender('file:bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

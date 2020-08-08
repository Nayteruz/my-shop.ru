<?php
/* Smarty version 3.1.36, created on 2020-08-02 17:41:21
  from 'D:\OpenServer\domains\my-shop.ru\templates\products\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26d09103f635_56390560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b095f7150333352b7e93dddc0744052344f0ca6' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\products\\index.tpl',
      1 => 1596375541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:bottom.tpl' => 1,
  ),
),false)) {
function content_5f26d09103f635_56390560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>"Список товаров",'mode'=>"list"), 0, false);
?>
<p>
    <a class="btn btn-info" href="/products/add">Добавить</a>
</p>
<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>

<nav class="pag-wr">
    <ul class="pagination">
                <?php
$__section_pagination_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['pages_count']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pagination_0_total = $__section_pagination_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_pagination'] = new Smarty_Variable(array());
if ($__section_pagination_0_total !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration'] <= $__section_pagination_0_total; $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['index']++){
?>
            <li class="page-item <?php if ($_GET['p'] == (isset($_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration'] : null)) {?>active<?php }?>">
                <a class="page-link"
                   href="?p=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_pagination']->value['iteration'] : null);?>
</a>
            </li>
        <?php
}
}
?>
            </ul>
</nav>
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

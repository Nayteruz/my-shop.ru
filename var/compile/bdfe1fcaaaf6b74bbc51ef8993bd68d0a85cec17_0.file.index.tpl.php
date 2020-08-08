<?php
/* Smarty version 3.1.36, created on 2020-08-02 17:24:58
  from 'D:\OpenServer\domains\my-shop.ru\templates\categories\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f26ccbacc7828_38412963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdfe1fcaaaf6b74bbc51ef8993bd68d0a85cec17' => 
    array (
      0 => 'D:\\OpenServer\\domains\\my-shop.ru\\templates\\categories\\index.tpl',
      1 => 1596361086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:bottom.tpl' => 1,
  ),
),false)) {
function content_5f26ccbacc7828_38412963 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('h1'=>"Список категорий",'mode'=>"folder"), 0, false);
?>
<p>
    <a class="btn btn-info" href="/categories/add">Добавить</a>
</p>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название категории</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
            <td width="140">
                <a class="btn btn-primary" href='/categories/edit?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
'>Ред.</a>
                <form style='display:inline;' method='post' action='/categories/delete'><input type='hidden' name='id'
                                                                                               value='<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
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

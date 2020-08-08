{include file='header.tpl' h1=$current_category.name  mode="list"}
{*<p>
    <a class="btn btn-info" href="/products/add">Добавить</a>
</p>*}
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Артикул</th>
        <th>Цена</th>
        <th>Количество на складе</th>
{*        <th>Описание</th>*}
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$products item=product}
        <tr>
            <td>{$product.id}</td>
            <td>{$product.name}</td>
            <td>{$product.category_name}</td>
            <td>{$product.article}</td>
            <td>{$product.price}</td>
            <td>{$product.amount}</td>
            {*<td width="200px">{$product.anonce}</td>*}
            <td width="140">
                <a class="btn btn-primary" href='/products/edit?id={$product.id}'>Ред.</a>
                <form style='display:inline;' method='post' action='/products/delete'><input type='hidden' name='id'
                                                                                             value='{$product.id}'><input
                            class="btn btn-secondary" type='submit' value='Уд.'></form>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>
{include file='bottom.tpl'}


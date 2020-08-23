{include file='header.tpl' h1="Список товаров" mode="list"}
<p>
    <a class="btn btn-info" href="/products/add">Добавить</a>
</p>
{$offset}
<nav class="pag-wr">
    <ul class="pagination">
        {*        <li class="page-item"><a class="page-link" href="#">Previous</a></li>*}
        {section name=pagination loop=$pages_count}
            <li class="page-item {if $smarty.get.p == $smarty.section.pagination.iteration}active{/if}">
                <a class="page-link"
                   href="?p={$smarty.section.pagination.iteration}">{$smarty.section.pagination.iteration}</a>
            </li>
        {/section}
        {*        <li class="page-item"><a class="page-link" href="#">Next</a></li>*}
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
        {*<th>Описание</th>*}
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$products item=product}
        <tr>
            <td>{$product.id}</td>
            <td>{$product.name}
            {if $product.images}<br/>
                {foreach from=$product.images item=image}
                    <img width="30" src="{$image.path}" alt="{$image.name}">
                {/foreach}
            {/if}
            </td>
            <td>{$product.category_name}</td>
            <td>{$product.article}</td>
            <td>{$product.price}</td>
            <td>{$product.amount}</td>
            {*<td width="200px">{$product.description}</td>*}
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


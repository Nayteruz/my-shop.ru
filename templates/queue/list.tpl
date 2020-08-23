{include file='header.tpl' h1="Список задач"}

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Статус</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$tasks item=task}
        <tr>
            <td>{$task.id}</td>
            <td>{$task.name}</td>
            <td>{$task.status}</td>
            <td width="140">
                <a class="btn btn-primary" href='/queue/run?id={$task.id}'>Зап.</a>
                <form style='display:inline;' method='post' action='/queue/delete'><input type='hidden' name='id'
                                                                                          value='{$task.id}'><input
                            class="btn btn-secondary" type='submit' value='Уд.'></form>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>

{include file='bottom.tpl'}
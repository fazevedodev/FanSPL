<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    {include file="header.tpl"}
    <body>
        <div class="container_24" id="box-shadow">
            {include file="menu.tpl"
                menu_item_list=$menu_item_list
                title=$title}
            <div class="clear"></div>
            <div class="content">
                <div class="container_24">
                    <div class="grid_24">
                        <h1>Ranking</h1>
                    </div>
                    <div class="grid_24"> 
                        <table class="ranking">
                            <tr class="header">
                                <th>Rank</th>
                                <th>Team</th>
                                <th>Wins</th>
                                <th>Losses</th>
                                <th>Map Wins</th>
                                <th>Map Losses</th>
                                <th>Penalties</th>
                            </tr>
                        {foreach from=$ranking key=i item=row}
                            <tr {if $i%2 == 0}
                                class="even"
                                {else}
                                class="odd"
                                {/if}
                            >
                                <td>{$row['rank']}</td>
                                <td>{$row['team']}</td>
                                <td>{$row['wins']}</td>
                                <td>{$row['losses']}</td>
                                <td>{$row['map_wins']}</td>
                                <td>{$row['map_losses']}</td>
                                <td>{$row['penalties']}</td>
                            </tr>
                        {/foreach}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_24">
            {include file="footer.tpl"}
        </div>
    </body>
</html>
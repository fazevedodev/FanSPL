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
                        <div align="center">
                            <table>
                                <th colspan="2">
                                    <img class="image-medium" src="images/logo/{$team['logo']}" />
                                </th>
                                <tr>
                                    <td style="background: #000; color: #fff">
                                        <b>Name</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {$team['name']}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #000; color: #fff">
                                        <b>Tag</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {$team['tag']}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background: #000; color: #fff">
                                        <b>Current Roster</b>
                                    </td>
                                </tr>
                                {$i=0}
                                {foreach from=$roster item=player}
                                {$i++}
                                <tr>
                                    <td {if $i%2 == 0}
                                            style="background: #BBB; color: #000"
                                        {else}
                                            style="background: #DDD; color: #000"
                                        {/if}
                                    >
                                        <img src="images/{$player['race']['icon']}"/> {$player['name']}
                                    </td>
                                </tr>
                                {/foreach}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_24">
            {include file="footer.tpl"}
        </div>
    </body>
</html>
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
                        <h1>{$team['name']}</h1>
                    </div>
                    <div class="grid_24">
                    </div>
                </div>
            </div>
        </div>
        <div class="container_24">
            {include file="footer.tpl"}
        </div>
    </body>
</html>
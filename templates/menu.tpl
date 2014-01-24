<div class="menu-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="login">
                <div class="login">
                    <form method="POST" action="index.php">
                        Name: <input type="text" name="name"/> Password: <input type="password" name="password"/> <input type="submit" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid_24">
            <div class="title">
                <a href="index.php"><img src="{$title}" /></a>
            </div>
        </div>
        <div class="grid_24">
            <div class="menu">
                <ul>
                {foreach from=$menu_item_list item=menu}
                    <li><a href="{$menu['link']}">{$menu['name']}</a></li>
                {/foreach}
                </ul>
            </div>
        </div>
    </div>
</div>
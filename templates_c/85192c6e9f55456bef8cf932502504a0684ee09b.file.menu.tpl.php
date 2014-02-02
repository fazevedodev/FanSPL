<?php /* Smarty version Smarty-3.1.16, created on 2014-02-02 17:44:31
         compiled from ".\templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2901952e16d5915c251-74489619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85192c6e9f55456bef8cf932502504a0684ee09b' => 
    array (
      0 => '.\\templates\\menu.tpl',
      1 => 1391359467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2901952e16d5915c251-74489619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e16d591c9805_58868119',
  'variables' => 
  array (
    'user_username' => 0,
    'title' => 0,
    'menu_item_list' => 0,
    'menu' => 0,
    'submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e16d591c9805_58868119')) {function content_52e16d591c9805_58868119($_smarty_tpl) {?><div class="menu-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="login">
                <div class="login">
                    <?php if (isset($_smarty_tpl->tpl_vars['user_username']->value)) {?>
                        You are logged in as <?php echo $_smarty_tpl->tpl_vars['user_username']->value;?>
.
                        <a href="logout.php">Logout</a>.
                    <?php } else { ?>
                    <form method="POST" action="index.php">
                        Name: <input type="text" name="name"/> Password: <input type="password" name="password"/> <input type="submit" value="Login"/>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="grid_24">
            <div class="title">
                <a href="index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" /></a>
            </div>
        </div>
        <div class="clear"></div>
        <div class="grid_24">
            <div class="menu">
                <ul>
                <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</a>
                    <?php if (count($_smarty_tpl->tpl_vars['menu']->value['itens'])>0) {?>
                        <ul class="submenu">
                        <?php  $_smarty_tpl->tpl_vars['submenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['submenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value['itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['submenu']->key => $_smarty_tpl->tpl_vars['submenu']->value) {
$_smarty_tpl->tpl_vars['submenu']->_loop = true;
?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['submenu']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['submenu']->value['name'];?>
</a></li>
                        <?php } ?>
                        </ul>
                    <?php }?>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div><?php }} ?>

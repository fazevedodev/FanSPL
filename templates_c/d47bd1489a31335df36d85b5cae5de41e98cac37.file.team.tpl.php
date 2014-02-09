<?php /* Smarty version Smarty-3.1.16, created on 2014-02-09 21:46:06
         compiled from ".\templates\team.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3004352f7d6ac03ee69-56022484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd47bd1489a31335df36d85b5cae5de41e98cac37' => 
    array (
      0 => '.\\templates\\team.tpl',
      1 => 1391978763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3004352f7d6ac03ee69-56022484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52f7d6ac0bbe87_99640994',
  'variables' => 
  array (
    'menu_item_list' => 0,
    'title' => 0,
    'team' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f7d6ac0bbe87_99640994')) {function content_52f7d6ac0bbe87_99640994($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body>
        <div class="container_24" id="box-shadow">
            <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_item_list'=>$_smarty_tpl->tpl_vars['menu_item_list']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

            <div class="clear"></div>
            <div class="content">
                <div class="container_24">
                    <div class="grid_24">
                        <h1><?php echo $_smarty_tpl->tpl_vars['team']->value['name'];?>
</h1>
                    </div>
                    <div class="grid_24">
                    </div>
                </div>
            </div>
        </div>
        <div class="container_24">
            <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </body>
</html><?php }} ?>

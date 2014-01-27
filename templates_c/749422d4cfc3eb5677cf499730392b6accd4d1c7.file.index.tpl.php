<?php /* Smarty version Smarty-3.1.16, created on 2014-01-27 21:01:15
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:765152d7fa0517d673-50060967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1390852866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '765152d7fa0517d673-50060967',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d7fa051e2f72_45501825',
  'variables' => 
  array (
    'menu_item_list' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d7fa051e2f72_45501825')) {function content_52d7fa051e2f72_45501825($_smarty_tpl) {?><html>
    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_item_list'=>$_smarty_tpl->tpl_vars['menu_item_list']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

        <div class="clear"></div>
        <div class="container_24">
            <div class="grid_24">
                <div class="content">
                    Body
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </body>
</html><?php }} ?>

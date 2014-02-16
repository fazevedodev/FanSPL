<?php /* Smarty version Smarty-3.1.16, created on 2014-02-16 22:16:45
         compiled from ".\templates\ranking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1957153011dee1ba3c6-48858124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '445ca4d91c953860504c779fd74040baa0d9d94f' => 
    array (
      0 => '.\\templates\\ranking.tpl',
      1 => 1392585402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1957153011dee1ba3c6-48858124',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53011dee2b8288_08927948',
  'variables' => 
  array (
    'menu_item_list' => 0,
    'title' => 0,
    'ranking' => 0,
    'i' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53011dee2b8288_08927948')) {function content_53011dee2b8288_08927948($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body>
        <div class="container_24" id="box-shadow">
            <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_item_list'=>$_smarty_tpl->tpl_vars['menu_item_list']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

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
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ranking']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
                            <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0) {?>
                                class="even"
                                <?php } else { ?>
                                class="odd"
                                <?php }?>
                            >
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['rank'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['team'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['wins'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['losses'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['map_wins'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['map_losses'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['penalties'];?>
</td>
                            </tr>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_24">
            <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </body>
</html><?php }} ?>

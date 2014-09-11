<?php /* Smarty version Smarty-3.1.13, created on 2013-05-27 12:57:23
         compiled from "views\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11261519f7319db4097-57737587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20520d574d838c8d3439e5f30844e78aae7426c6' => 
    array (
      0 => 'views\\main.tpl',
      1 => 1369659185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11261519f7319db4097-57737587',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_519f7319e64184_63977343',
  'variables' => 
  array (
    'template' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f7319e64184_63977343')) {function content_519f7319e64184_63977343($_smarty_tpl) {?><!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Reseau social moustachu">
		<meta name="keywords" content="Social, Network, Moustache">
		<meta name="author" content="Dardart Flambard Larmagna Courcoux">
		<title>Social Moustache Club</title>
		<script src="./js/jquery-1.7.2.min.js"></script>
		<script src="./js/lightbox.js"></script>
		<link href="./css/lightbox.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
		<script type="text/javascript">
			$(function() {
				$('a.lightbox').lightBox(); // Select all links with lightbox class
			});
			function AfficheInfoBulle(Case) 
			{
				document.getElementById(Case).style.display='block';
			}
			function MasqueInfoBulle(Case) 
			{
				document.getElementById(Case).style.display='none';
			}
		</script>
	</head>
	<body>
		<div id ="header">
			<div class="entete">
				<span class="Titre"> Social </span><a href="index.php?action=home"><img id="logo" src="images/logo.png" /></a><span class="Titre">Club</span>
			</div>
			<div id="icones_header">
				<input type="text" id="statut_input"/>
					<img id="icone_plume" src="images/plume.png" width="20px">
				<a href="index.php?action=utilisateurs"><img id="icone_1" src="images/utilisateurs.png"></a>
				<a href="index.php?action=messagerie"><img id="icone_2" src="images/messagerie.png"></a>
				<a href="profil.php"><img id="icone_3" src="images/miniature_profil.jpg"></a>
				<img id="icone_4" src="images/fleche_profil.jpg">
				<a href="index.php?action=deconnexion"><img id="icone_5" src="images/deconnexion.png"></a>
			</div>
		</div>
		<div class="clear"></div>
		<div class="wrapper">
			<?php if ($_smarty_tpl->tpl_vars['template']->value['exists']){?>
				<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['template']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php }else{ ?>
				<br> Page introuvable
			<?php }?>
		</div> 
		<div id="footer"></div>
	</body>
</html><?php }} ?>
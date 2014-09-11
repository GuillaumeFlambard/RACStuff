<?php /* Smarty version Smarty-3.1.13, created on 2013-05-30 20:17:46
         compiled from ".\views\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:406051a728db6c5126-02369310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27fefb46790a818554fa24fc88f8cc40ebb877e7' => 
    array (
      0 => '.\\views\\main.tpl',
      1 => 1369937863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '406051a728db6c5126-02369310',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a728db824360_14121405',
  'variables' => 
  array (
    'header' => 0,
    'pseudo' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a728db824360_14121405')) {function content_51a728db824360_14121405($_smarty_tpl) {?><!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Reseau social moustachu">
		<meta name="keywords" content="Social, Network, Moustache">
		<meta name="author" content="Dardart Flambard Larmagna Courcoux">
		<title>Social Moustache Club</title>
		<script src="./js/jquery-1.7.2.min.js"></script>
		<script src="./js/lightbox.js"></script>
		<link href="./css/lightbox.css" rel="stylesheet">
		<link id="link_css" rel="stylesheet" type="text/css" href="css/styles1.css">
		<script type="text/javascript" language="javascript" src="js/jquery.cookie.js"></script>
		<script type="text/javascript">
			$(function() {
				$('a.lightbox').lightBox(); // Select all links with lightbox class
			});
		</script>
		<script language="javascript" type="text/javascript">
			function GetId(id)
			{
				return document.getElementById(id);
			}
			var visibilite=false; // La variable visibilite nous dit si la bulle est visible ou non
			 
			function move(e) 
			{
				if(visibilite) 
				{  // Si la bulle est visible, on calcul en temps reel sa position ideale
			    	if (navigator.appName!="Microsoft Internet Explorer") 
			    	{ // Si on est pas sous IE
			    	GetId("curseur").style.left=e.pageX + 5+"px";
			   		GetId("curseur").style.top=e.pageY + 10+"px";
			    	}
			   		else 
			    	{ 
			   			if(document.documentElement.clientWidth>0) 
			   			{
							GetId("curseur").style.left=20+event.x+document.documentElement.scrollLeft+"px";
							GetId("curseur").style.top=10+event.y+document.documentElement.scrollTop+"px";
			    		} 
			   			else 
			   			{
							GetId("curseur").style.left=20+event.x+document.body.scrollLeft+"px";
							GetId("curseur").style.top=10+event.y+document.body.scrollTop+"px";
			       		}
			   		}
				}
			}
			 
			function montre(text) 
			{
				if(visibilite==false) 
				{
			  		GetId("curseur").style.visibility="visible"; // Si il est cacher (la verif n'est qu'une securité) on le rend visible.
			  		GetId("curseur").innerHTML = text; // on copie notre texte dans l'élément html
			 		visibilite=true;
				}
			}

			function cache() 
			{
				if(visibilite==true)
				{
					GetId("curseur").style.visibility="hidden"; // Si la bulle est visible on la cache
					visibilite=false;
				}
			}
			document.onmousemove=move; // dès que la souris bouge, on appelle la fonction move pour mettre à jour la position de la bulle.
			//-->
		</script>
	</head>
	<body>
		<div id ="header">
			<div class="entete">
				<span class="Titre">Social </span><a href="index.php?action=home"><div id="div_logo"><img id="logo" src="./images/logo.png"alt="logo moustache"></div></a><span class="Titre">Club</span>
				<img id="icone_theme1" class="switch_style" src="./images/switchblue.jpg" alt="icone switch to blue theme">
				<img id="icone_theme2" class="switch_style" src="./images/switchgrey.jpg" alt="icone switch to grey theme">
			</div>
			<?php if (!empty($_smarty_tpl->tpl_vars['header']->value)){?>
			<div id="icones_header">
				<form action="index.php?action=CreationStatut" method="post" id="statut_input">
					<input type="text" name="ContenuStatut" id="champ_statut" placeholder="Exprimez vous en 300 caract&egrave;res...">
					<input type="image" src="./images/plume.png"  align="right" width="35" >
				</form>
				<a href="index.php?action=invitation"><img id="icone_0" src="./images/invite.png" alt="lien vers la page invitation"></a>
				<a href="index.php?action=utilisateurs"><img id="icone_1" src="./images/utilisateurs.png" alt="lien vers page utilisateur"></a>
				<a href="index.php?action=messagerie"><img id="icone_2" src="./images/messagerie.png" alt="lien vers messagerie"></a>
				<a href="index.php?action=profil"><img id="icone_3" src="./users/<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
/photo_profil/<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
.jpg" alt="lien vers profil" width="35" height="35"></a>
				<a href="index.php?action=deconnexion"><img id="icone_4" src="./images/deconnexion.png" alt="icone deconnexion"></a>
			</div>
			<?php }?>
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
		<script>
			if($.cookie("css") && $.cookie("logo")) {
				console.log($.cookie("css"));
				$("#link_css").attr("href", $.cookie("css"));
				$('#div_logo').empty();
				$("#div_logo").append($.cookie("logo"));
			}
			$("#icone_theme1").click(function(){
				$('#div_logo').empty();
				$("#link_css").attr("href", "css/styles2.css");
				$('#div_logo').append('<img id="logo" src="./images/logo_plage.png"alt="logo moustache plage" width="40">');
				$.cookie("css", "css/styles2.css", { expires: 365, path: '/' });
				$.cookie("logo", '<img id="logo" src="./images/logo_plage.png"alt="logo moustache plage" width="40">', { expires: 365, path: '/' });
				return false;
			});
		   
			$("#icone_theme2").click(function(){
				$('#div_logo').empty();
				$("#link_css").attr("href", "css/styles1.css");
				$('#div_logo').append('<img id="logo" src="./images/logo.png"alt="logo moustache">');
				$.cookie("css","css/styles1.css", { expires: 365, path: '/' });
				$.cookie("logo", '<img id="logo" src="./images/logo.png"alt="logo moustache" width="40">', { expires: 365, path: '/' });
				return false;
			});
		</script>
	</body>
</html><?php }} ?>
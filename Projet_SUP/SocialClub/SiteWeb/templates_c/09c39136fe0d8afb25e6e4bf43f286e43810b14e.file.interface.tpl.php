<?php /* Smarty version Smarty-3.1.13, created on 2013-05-30 17:05:23
         compiled from "C:\wamp\www\SocialMoustacheClub\SiteWeb\templates\interface.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3174451a3f8cf411f55-05488211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09c39136fe0d8afb25e6e4bf43f286e43810b14e' => 
    array (
      0 => 'C:\\wamp\\www\\SocialMoustacheClub\\SiteWeb\\templates\\interface.tpl',
      1 => 1369926316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3174451a3f8cf411f55-05488211',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a3f8cf517045_65074128',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a3f8cf517045_65074128')) {function content_51a3f8cf517045_65074128($_smarty_tpl) {?>	<div id="statuts_content">
	</div>	

	<div id="messagerie_content">
		<div id="messagerie_header">
			<div class="connexion_titre">Messagerie</div>
			<img class="trait_connexion" src="images/trait_connexion.png" >
		</div>
		<div id="messages">
		</div>
	</div>


	
	<div id="amis_content">
		<div id="amis_header">
			<div class="connexion_titre">Amis</div>
			<img class="trait_connexion" src="images/trait_connexion.png" >
		</div>
			<button name="previous_page" id="previous_button">&lt;</button>
		<div id="amis">
			<div id="amis_colonne_1">
			</div>
			<div id="amis_colonne_2">
			</div>
		</div>
			<button name="next_page" id="next_button">&gt;</button>
	</div>

	<div class="clear"></div>

</div>
	<div id="photos_header">
		<span class="entete">Photos </span>
	</div>
<div class="wrapper">
	<div id="photos_content">
		<div id="photos">
			<div id="legende_part_1">
				<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
				<div class="statut_pseudo_legende">Faustine</div>
			</div>
			<div class="clear"></div>
			<div id="curseur" class="infobulle"></div>
			<img onmouseover="montre('TROP COOL CTE TOF');" onmouseout="cache();" id="1" class="photo_secondaire" src="images/1.jpg" alt="image_galerie"  >
			<img id="2" class="photo_secondaire" src="images/2.jpg">
			<img  onmouseover="montre('TROP COOL CTE TOF');" onmouseout="cache();" id="3" class="photo_secondaire" src="images/3.jpg">
			<img  onmouseover="montre('TROP COOL CTE TOF');" onmouseout="cache();" id="4" class="photo_principale" src="images/4.jpg">
			<img  onmouseover="montre('TROP COOL CTE TOF');" onmouseout="cache();" id="5" class="photo_secondaire" src="images/5.jpg">
			<img  onmouseover="montre('TROP COOL CTE TOF');" onmouseout="cache();" id="6" class="photo_secondaire" src="images/6.jpg">
			<div class="clear"></div>
			<div id="legende_part_2"><div id="legende">Alexandre Astier</div></div>
		</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">

	/*function listLastPictures(){
		$.getJSON('index.php?action=getLastImages&ajax', function(images) {					
			var length = images.length,			//longueur du tableau retourné par la requete getAllFriends()
			image = null;
			for (var i = 0; i < length; i++) 
			{
				$('#'+i).empty(); //vide la div avant d'y insérer les amis
				image = images[i] //on retrouve la key de l'ami dans le tableau retourné par la requete en fonction du numero de la page
				$('#'+i).append('<img onmouseover="montre('+image['legend']+');" id="1" class="photo_secondaire" src='+image['path']+' alt="image_galerie"  >');
				//on insère un nouvelle ligne pour chaque ami dans la div colonne correspondante
			}
		}
	}*/

$(document).ready(function(){
   	var $carrousel = $('#carrousel'); 
    $img = $('#carrousel img'); 
    indexImg = $img.length - 1; // on définit l'index du dernier élément
    i = 0; 
    $currentImg = $img.eq(i); //  cible l'image courante, qui possède l'index i (0 pour l'instant)
 
	$img.css('display', 'none'); 
	$currentImg.css('display', 'block'); 
 
	$carrousel.append('<div class="controls"> <span class="prev">Precedent</span> <span class="next">Suivant</span> </div>');
	//$carrousel.append(' <img class="prev" /> <img class="current" src="" /> <img src="" class="next" /> ');
 
	$('.next').click(function(){ 
	    i++; 
	    if( i <= indexImg ){
	        $img.css('display', 'none'); 
	        $currentImg = $img.eq(i); // on définit la nouvelle image
	        $currentImg.css('display', 'block'); 
	    }
	    else{
	        i = indexImg;
	    }
	});
 
$('.prev').click(function(){ 
	    i--; 
	    if( i >= 0 ){
	        $img.css('display', 'none');
	        $currentImg = $img.eq(i);
	        $currentImg.css('display', 'block');
	    }
	    else{
	        i = 0;
	    }
	});
 
	function slideImg(){
	    setTimeout(function(){ // on utilise une fonction anonyme
	                         
	        if(i < indexImg){ // si le compteur est inférieur au dernier index
	        i++; // on l'incrémente
	    }
	    else{ // sinon, on le remet à 0 (première image)
	        i = 0;
	    }
	 
	    $img.css('display', 'none');
	 
	    $currentImg = $img.eq(i);
	    $currentImg.css('display', 'block');
	 
	    slideImg(); // on oublie pas de relancer la fonction à la fin
	 
	    }, 7000); // on définit l'intervalle à 7000 millisecondes (7s)
	}
	 
	slideImg(); // enfin, on lance la fonction une première fois
	 
});




	/* Module Tous les Amis */
	var page = 0;
	$('#next_button').click(function() {
		page++;			//on incrémente le numéro de la page
		listFriends();		//on appelle la fonction qui liste les amis pour ne pas attendre les 4 secondes de l'interval
	});
	$('#previous_button').click(function() {
		page--;
		listFriends();
	});
	function listFriends(){			//fonction qui va lister tous les amis dans la div correspondante
		$.getJSON('index.php?action=getAllFriends&ajax', function(friends) {					
			var length = friends.length,			//longueur du tableau retourné par la requete getAllFriends()
			friend = null;
			
			var i = 0;
			for (var j = 1; j <= 2; j++) {
				$('#amis_colonne_'+j).empty();			//vide la div avant d'y insérer les amis
			
				for (; i < 13*j && (i + 26 * page)< length; i++) {
					friend = friends[i + 26 * page];			//on retrouve la key de l'ami dans le tableau retourné par la requete en fonction du numero de la page
					$('#amis_colonne_'+j).append('<img src="./users/'+friend+'/photo_profil/'+friend+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo_amis"><a href="index.php?action=friend&pseudo='+friend+'">'+friend+'</a></span><div class="clear"></div>');
					//on insère un nouvelle ligne pour chaque ami dans la div colonne correspondante
				}
			}
			
			if (page <= 0)			//le bouton "précédent" ne s'affiche pas à la première page
				$('#previous_button').css('display', 'none');
			else
				$('#previous_button').css('display', 'block');
				
			if (page >= Math.floor(length/26))			//le bouton "suivant" ne s'affiche pas à la dernière page
				$('#next_button').css('display', 'none');
			else
				$('#next_button').css('display', 'block');
		})
	}
	listFriends();
	setInterval (listFriends,4000);			//la div va refresh toutes les 4 secondes

	/* Module all Statuts interface */
	function listAllStatutsInterface() {
		$.getJSON('index.php?action=ListStatutsInterface&ajax', function(tableau)
		{				
			var length = tableau[0].length;
			statut = null;
			date = null;
			login = null;
			$('#statuts_content').empty();
			for (var i = 0; i < length; i++)
			{
				statut = tableau[0][i];
				date = tableau[1][i];
				login = tableau[2][i];
				$('#statuts_content').append('<img src="users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo">'+login+'</span><div class="statut">'+statut+'</div><div class="clear"></div>'+date+'<div class="trait_label"></div>');
			}
		})
	}
	listAllStatutsInterface();
	setInterval(listAllStatutsInterface,4000);

	/* Module 5 derniers Messages */
	function listCinqDerniersMessages()
	{
		$.getJSON('index.php?action=getMessagesList&ajax', function(tableau)
		{
			var length = tableau[0].length;
			content = null;
			date = null;
			login = null;
			$('#messages').empty();
				for (var i = 0; i < length; i++)
				{
					content = tableau[0][i];
					date = tableau[1][i];
					login = tableau[2][i];
					$('#messages').append('<div class="message_expediteur"><img src="./users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30" height="30"><span class="statut_pseudo"><a href="index.php?action=friend&pseudo='+login+'">'+login+'</a></span></div><div class="clear"></div><div class="message">'+content+'</div><div class="date">'+date+'</div><div class="clear"></div>');
				}
			})
	}
	listCinqDerniersMessages();
	setInterval(listCinqDerniersMessages,4000);
</script>
	<?php }} ?>
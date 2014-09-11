window.onload = function()
{
    var canvas = document.getElementById('mon_canvas');
        if(!canvas)
        {
            alert("Impossible de récupérer le canvas");
            return;
        }
 
    var context = canvas.getContext('2d');
        if(!context)
        {
            alert("Impossible de récupérer le context du canvas");
            return;
        }
 
context.beginPath();//On démarre un nouveau tracé
context.moveTo(0, 300);//On se déplace au coin inférieur gauche
context.lineTo(150, 0);
context.lineTo(300, 300);
context.lineTo(0, 300);
context.lineWidth=18;
context.fillStyle = "#ff0000"; //Toutes les prochaines formes pleines seront rouges.
context.strokeStyle = "rgba(0, 0, 255, 0.5)"; //Toutes les prochaines formes "stroke" seront bleues et semi-transparentes.
context.fill();//On trace seulement les lignes.
context.closePath();
    //C'est ici que l'on placera tout le code servant à nos dessins.

//On n'oublie pas de récupérer l'objet canvas et son context.
 
context.beginPath(); //On démarre un nouveau tracé.
context.arc(150, 80, 32, 0, Math.PI*1.30); //On trace la courbe délimitant notre forme
context.stroke(); //On utilise la méthode fill(); si l'on veut une forme pleine
context.closePath();

//On n'oublie pas de récupérer l'objet canvas et son context.
 
var mon_image = new Image();
mon_image.src = "Troll.JPG";
context.drawImage(mon_image, 120, 90, 250, 300, 100, 160, 100, 100);

//On n'oublie pas de récupérer l'objet canvas et son context.
 
context.font = "18px Helvetica";//On passe à l'attribut "font" de l'objet context une simple chaîne de caractères composé de la taille de la police, puis de son nom.
context.fillText("Hello World", 0, 30);//strokeText(); fonctionne aussi, vous vous en doutez.

}
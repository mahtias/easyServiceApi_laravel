<!DOCTYPE html>
<html lang="en">
<head>
	<title>EASY-SERVICE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="comingsoon/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="comingsoon/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="comingsoon/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="comingsoon/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="comingsoon/css/util.css">
	<link rel="stylesheet" type="text/css" href="comingsoon/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<!--  -->
	

	<div class="size1 overlay1">
		

			<div class="flex-w flex-c-m cd100 p-b-33" style="padding-top:20%;">
				<div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20 text-right">
					<span class="l2-txt1 p-b-9 days" id="compte_a_rebours"></span>
					<span class="l2-txt1" style="font-size: 30px;">Jours</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
					<span class="l2-txt1 p-b-9 hours" id="heure"></span>
					<span class="l2-txt1" style="font-size: 30px;">Heures</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
					<span class="l2-txt1 p-b-9 minutes" id="min">50</span>
					<span class="l2-txt1" style="font-size: 30px;">Minutes</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
					<span class="l2-txt1 p-b-9 seconds" id="sec"></span>
					<span class="l2-txt1" style="font-size: 30px;">Secondes</span>
				</div>
			</div>
		</div>


<script type="text/javascript">
function compte_a_rebours()
{
    var compte_a_rebours = document.getElementById("compte_a_rebours");
    var min = document.getElementById("min");
    var heure = document.getElementById("heure");
    var sec = document.getElementById("sec");

    var date_actuelle = new Date();
    var date_evenement = new Date("may 17 15:00:00 2021");
    var total_secondes = (date_evenement - date_actuelle) / 1000;

    var prefixe = "Compte à rebours terminé dans ";
    if (total_secondes < 0)
    {
        prefixe = "Compte à rebours terminé il y a "; // On modifie le préfixe si la différence est négatif
        total_secondes = Math.abs(total_secondes); // On ne garde que la valeur absolue
    }

    if (total_secondes > 0)
    {
        var jours = Math.floor(total_secondes / (60 * 60 * 24));
        var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));
        minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
        secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));

        var et = "et";
        var mot_jour = "jours,";
        var mot_heure = "heures,";
        var mot_minute = "minutes,";
        var mot_seconde = "secondes";

        if (jours == 0)
        {
            jours = '';
            mot_jour = '';
        }
        else if (jours == 1)
        {
            mot_jour = "jour,";
        }

        if (heures == 0)
        {
            heures = '';
            mot_heure = '';
        }
        else if (heures == 1)
        {
            mot_heure = "heure,";
        }

        if (minutes == 0)
        {
            minutes = '';
            mot_minute = '';
        }
        else if (minutes == 1)
        {
            mot_minute = "minute,";
        }

        if (secondes == 0)
        {
            secondes = '';
            mot_seconde = '';
            et = '';
        }
        else if (secondes == 1)
        {
            mot_seconde = "seconde";
        }

        if (minutes == 0 && heures == 0 && jours == 0)
        {
            et = "";
        }

        compte_a_rebours.innerHTML = jours;
        min.innerHTML = minutes;
        heure.innerHTML = heures;
        sec.innerHTML = secondes;
    }
    else
    {
        compte_a_rebours.innerHTML = 'Compte à rebours terminé.';
    }

    var actualisation = setTimeout("compte_a_rebours();", 1000);
}
compte_a_rebours();
min();
heure();
sec();
</script>
	

<!--===============================================================================================-->	
	<script src="comingsoon/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="comingsoon/vendor/bootstrap/js/popper.js"></script>
	<script src="comingsoon/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="comingsoon/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="comingsoon/vendor/countdowntime/moment.min.js"></script>
	<script src="comingsoon/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="comingsoon/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="comingsoon/vendor/countdowntime/countdowntime.js"></script>

<!--===============================================================================================-->
	<script src="comingsoon/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="comingsoon/js/main.js"></script>

</body>
</html>
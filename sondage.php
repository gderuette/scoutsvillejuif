<?php include("contour.php"); ?>

<html>
<body><div class="corps">

	<p>Vous êtes sur le point de répondre à un questionnaire, très court, qui nous permettra d'améliorer le site</p>
	<p>Pour des raisons évidentes nous vous prions de répondre une seule fois à ce sondage</p> 

	<form action="enregistrementSondage.php" method="post">
	</br><strong>Vous êtes :</strong><br/>
	<input type="radio" name="typeVisiteur" value="louveteau/jeannette" checked="checked" /> louveteau/jeannette<br/>
	<input type="radio" name="typeVisiteur" value="scout/guide" /> scout/guide<br/>
	<input type="radio" name="typeVisiteur" value="pionnier/caravelle"  /> pionnier/caravelle<br/>
	<input type="radio" name="typeVisiteur" value="compagnon" /> compagnon<br/>
	<input type="radio" name="typeVisiteur" value="parent"  /> parent de scout<br/>
	<input type="radio" name="typeVisiteur" value="chef"  /> chef/cheftaine ou responsable scout<br/>
	<input type="radio" name="typeVisiteur" value="autregroupe" /> Un membre d'un autre groupe scout<br/>
	<input type="radio" name="typeVisiteur" value="autre" /> autre<br/><br/>

	</br><strong>Vous visitez le site environ :</strong><br/>
	<input type="radio" name="frequence" value="1_fois_par_semaine" checked="checked"/>une fois par semaine ou plus<br/>
	<input type="radio" name="frequence" value="1_fois_par_mois" />une fois par mois<br/>
	<input type="radio" name="frequence" value="rarement" />plus rarement<br/><br/>

	</br><strong>Pour quelles rubriques consultez-vous le site?</strong><br/>
	<input type="radio" name="objet" value="photos" checked="checked"/>les photos<br/>
	<input type="radio" name="objet" value="plannings"/>les plannings<br/>
	<input type="radio" name="objet" value="documents"/>les documents<br/>
	<input type="radio" name="objet" value="nouvelles"/>les nouvelles<br/>
	<input type="radio" name="objet" value="autre"/>autre<br/><br/>

	</br><strong>Pensez-vous qu'un livre d'or serait un plus pour le site?</strong><br/>
	<input type="radio" name="livreDOr" value="oui" checked="checked"/>oui
	<input type="radio" name="livreDOr" value="non" />non<br/><br/>

	</br><strong>Avez-vous des suggestions / des remarques / des idées ?</strong><br/>
	<textarea name="remarques" rows="8" cols="45">
	</textarea>
	
	<p>
	<input type="submit" value="Valider" />
	</p>
	</form>

	</div>
</html>

<?php include("pied_de_page.php"); ?>

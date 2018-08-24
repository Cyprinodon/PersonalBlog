<?php ob_start(); ?>
<article>
  <h2>Page de Contact</h2>
  <h3>Mais... Qui suis-je ?</h3>
  <p>En cliquant sur le fabuleux lien menant à la page que vous lisez actuellement, vous vous êtes probablement demandé :"Mais qui est ce type qui publie des articles sans intérêt et des commentaires bidons à seul but de tester le modèle MVC d'un site tout pourri ambiance 1985 ?!". Bien entendu, face à ce type de question tout à fait pertinente, je me dois de répondre sans fard et avec toute l'éloquence dont je suis capable. Voyez-vous, je su<strong>&lt;!&gt;Erreur 802 : Texte trop intéressant&lt;/!&gt;</strong></p>
  <h3>Une suggestion à me faire ?</h3>
  <p>Contactez-moi grâce au formulaire ci-dessous, spécialement mis en place pour votre plus grand plaisir. <em>Get wild !</em> (Mais pas trop, quand même.)
  <form class="container" action="contactController.php" method="post">
    <fieldset class=" one-half column ">
      <legend>Formulaire de contact</legend>
      <div class="row">
        <div class="six columns">
          <label for="contact-mail">E-mail :</label>
          <input type="email" class="u-full-width" name="contact-mail" placeholder="jean.charle@laplage.fr">
        </div>
        <div class="six columns">
          <label for="contact-topic">Sujet :</label>
          <input type="text" class="u-full-width" name="contact-topic" placeholder="Votre sujet...">
        </div>
      </div>
      <div class="row">
        <label for="contact-message">Message :</label>
        <textarea class="u-full-width" name="contact-message" cols="50" rows="10" placeholder="Votre message..."></textarea>
      </div>
      <div class="row">
        <input type="submit" class="button-primary u-full-width" name="contact-submit" value="Envoyer">
        <a href="index?page=home">Nan ! J'préfère retourner à l'accueil.</a>
      </div>
    </fieldset>
  </form>
</article>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>

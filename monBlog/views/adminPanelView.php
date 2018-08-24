<?php ob_start(); ?>
<h2>Administration du site</h2>
<section class="large-margin-top">
    <h3 class="twelve columns">Liste des articles</h3>
    <table class="u-full-width twelve columns">
      <thead>
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th>Chapô</th>
          <th>Auteur</th>
          <th>Dernière modification</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $articles AS $article ): ?>
        <tr>
          <td><a href="index.php?page=article&id=<?php echo $article['ID'] ?>"><?php echo $article["ID"] ?></a></td>
          <td><?php echo $article["title"] ?></td>
          <td><?php echo $article["excerpt"] ?></td>
          <td><?php echo $article["author"] ?></td>
          <td><?php echo $article["timestamp_fr"] ?></td>
          <td><a class="button" href="index.php?page=admin-panel&action=edit-article&id=<?php echo $article['ID'] ?>">Modifier l'article</a></td>
          <td><a class="button red-button" href="index.php?page=admin-panel&action=delete-article&id=<?php echo $article['ID']?>" title="Supprimer l'article">&cross;</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table class="u-full-width">
    <a class="button button-primary" href="index.php?page=admin-panel&action=publish-article">Écrire un nouvel article</a>
</section >
<section class="large-margin-top">
  <h3>Liste des commentaires</h3>
  <table class="u-full-width">
    <thead>
      <tr>
        <th>#</th>
        <th>Contenu</th>
        <th>Auteur</th>
        <th>date de création</th>
        <th colspan="4">Statut</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $comments AS $comment ): ?>
      <tr>
        <td><a href="index.php?page=article&id=<?php echo $article['ID'] ?>"><?php echo $comment["ID"] ?></a></td>
        <td><?php echo $comment["content"] ?></td>
        <td><?php echo $comment["author"] ?></td>
        <td><?php echo $comment["timestamp_fr"] ?></td>
        <td><?php echo $comment["status"] ?></td>
        <td>
          <?php if($comment['status'] != "Validé"): ?>
            <a class="button" href="index.php?page=admin-panel&action=accept-comment&id=<?php echo $comment['ID'] ?>" title="Accepter la publication du commentaire">&check;</a>
          <?php endif; ?>
        </td>
        <td>
          <?php if($comment['status'] != "Refusé"): ?>
            <a class="button" href="index.php?page=admin-panel&action=refuse-comment&id=<?php echo $comment['ID'] ?>" title="Refuser la publication du commentaire">&cross;</a>
          <?php endif; ?>
        </td>
        <td><a class="button red-button" href="index.php?page=admin-panel&action=delete-comment&id=<?php echo $comment['ID'] ?>" title="Supprimer le commentaire">&cross;</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>
<section class="large-margin-top">
  <h3>Liste des utilisateurs enregistrés</h3>
  <table class="u-full-width">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>date de création</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $moderators AS $moderator ): ?>
      <tr>
        <td><?php echo $moderator["ID"] ?></td>
        <td><?php echo $moderator["first_name"] ?></td>
        <td><?php echo $moderator["last_name"] ?></td>
        <td><?php echo $moderator["timestamp_fr"] ?></td>
        <td>
          <?php if($_SESSION['ID'] == $moderator['ID'] OR $_SESSION['ID'] == 1): ?>
            <a class="button" href="index.php?page=admin-panel&action=edit-moderator&id=<?php echo $moderator['ID'] ?>">Modifier le profil</a>
          <?php endif ?>
        </td>
        
        <td>
          <?php if($_SESSION['ID'] == 1): ?>
            <a class="button red-button" href="index.php?page=admin-panel&action=delete-moderator&id=<?php echo $moderator['ID'] ?>" title="Supprimer l'utilisateur">&cross;</a>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php if($_SESSION['ID'] == 1 AND $_SESSION['user_name'] == "Dimitri Grabette"): ?> 
    <a class="button button-primary" href="index.php?page=admin-panel&action=add-moderator">Ajouter un nouveau membre</a>
  <?php endif ?>
</section>
<?php $content = ob_get_clean(); ?>
<?php require( \VIEW_PATH."baseTemplateView.php" ); ?>

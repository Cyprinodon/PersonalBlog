<?php ob_start(); ?>
<h2>Administration du site</h2>
<section class="row large-margin-top">
  <h3>Liste des articles</h3>
  <table>
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
        <td><?php echo $article["ID"] ?></td>
        <td><?php echo $article["title"] ?></td>
        <td><?php echo $article["excerpt"] ?></td>
        <td><?php echo $article["author"] ?></td>
        <td><?php echo $article["timestamp_fr"] ?></td>
        <td><a class="button" href="index.php?page=admin-panel&action=edit-article&id=<?php echo $article['ID'] ?>">Modifier l'article</a></td>
        <td><a class="button red-button" href="index.php?page=admin-panel&action=delete-article&id=<?php echo $article['ID']?>" title="Supprimer l'article">X</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <a class="button button-primary" href="index.php?page=admin-panel&action=publish-article">Écrire un nouvel article</a>
</section >
<section class="row large-margin-top">
  <h3>Liste des commentaires</h3>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Contenu</th>
        <th>Auteur</th>
        <th>date de création</th>
        <th>Statut</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $comments AS $comment ): ?>
      <tr>
        <td><?php echo $comment["ID"] ?></td>
        <td><?php echo $comment["content"] ?></td>
        <td><?php echo $comment["author"] ?></td>
        <td><?php echo $comment["timestamp_fr"] ?></td>
        <td><?php echo $comment["status"] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>
<section class="row large-margin-top">
  <h3>Liste des utilisateurs enregistrés</h3>
  <table>
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
        <?php if($_SESSION['ID'] == $moderator['ID'] OR $_SESSION['ID'] == 1): ?>
          <td><a class="button" href="index.php?page=admin-panel&action=edit-moderator&id=<?php echo $moderator['ID'] ?>">Modifier le profil</a></td>
        <?php endif ?>
        <?php if($_SESSION['ID'] == 1 AND $_SESSION['user_name'] == "Dimitri Grabette"): ?>
          <td><a class="button red-button" href="index.php?page=admin-panel&action=delete-moderator&id=<?php echo $moderator['ID'] ?>" title="Supprimer l'utilisateur">X</a></td>
        <?php endif ?>
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

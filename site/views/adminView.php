<?php ob_start(); ?>
<h2>Administration du site</h2>
<h3>Liste des articles</h3>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Titre</th>
      <th>Chapô</th>
      <th>Auteur</th>
      <th>Dernière modification</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach( $articles AS $article ) ?>
    <tr>
      <td><?php echo $article["ID"] ?></td>
      <td><?php echo $article["title"] ?></td>
      <td><?php echo $article["excerpt"] ?></td>
      <td><?php echo $article["moderator"] ?></td>
      <td><?php echo $article["timestamp_fr"] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
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
    <?php foreach( $comments AS $comment ) ?>
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
<h3>Liste des utilisateurs enregistrés</h3>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>date de création</th>
      <th>Statut</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach( $comments AS $comment ) ?>
    <tr>
      <td><?php echo $administrator["ID"] ?></td>
      <td><?php echo $administrator["firstName"] ?></td>
      <td><?php echo $administrator["lastName"] ?></td>
      <td><?php echo $administrator["timestamp_fr"] ?></td>
      <td><?php echo $administrator["status"] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

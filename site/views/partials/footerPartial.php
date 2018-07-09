<footer>
  <hr>
    <h4>Espace <em>Administration</em></h4>
    <?php if ( isset( $_SESSION[ 'ID' ] ) AND isset( $_SESSION[ 'login' ] ) ): ?>
      <p>Bienvenue <em><?php echo $_SESSION['user_name'] ?></em> ! Vous êtes actuellement connecté.</p>
      <form action="http://monblog.local/index.php?<?php echo $_SERVER['QUERY_STRING'] ?>&logoutattempt=true" method="post">
        <fieldset>
          <legend>Formulaire de déconnexion</legend>
          <div class="input-group">
            <input type="submit" name="logout-submit" value="Se déconnecter">
          </div>
        </fieldset>
      </form>
    <?php else: ?>
      <form class="inline" action="http://monblog.local/index.php?<?php echo $_SERVER['QUERY_STRING'] ?>&loginattempt=true" method="post">
        <fieldset>
          <legend>Formulaire de connexion</legend>
          <div class="input-group">
            <label for="login-name">Pseudonyme :</label>
            <input type="text" name="login-name" placeholder="Pseudonyme...">
          </div>
          <div class="input-group">
            <label for="login-password">Mot de passe :</label>
            <input type="password" name="login-password">
          </div>
          <div class="input-group">
            <input type="submit" name="login-submit" value="Se connecter" title="Seuls les modérateurs sont habilités à se connecter à l'espace Administration du site !">
            <?php if( isset( $_POST['alert'] ) ) : ?>
              <span class="alert"><?php echo $_POST['alert'] ?></span>
            <?php endif; ?>
          </div>
        </fieldset>
      </form>
    <?php endif; ?>
  <p><small>&copy; 2018 - Dimitri Grabette</small></p>
</footer>

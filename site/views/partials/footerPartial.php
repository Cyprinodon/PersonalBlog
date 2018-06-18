<footer>
  <hr>
    <h4>Espace <em>Administration</em></h4>
    <form class="inline" action="loginController.php" method="post">
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
        </div>
      </fieldset>
    </form>
  <p><small>&copy; 2018 - Dimitri Grabette</small></p>
</footer>

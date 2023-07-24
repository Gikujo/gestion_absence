<form class="mb-3 col-4 offset-4" style="margin-top:200px;" method="POST" action="post-connexion.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Exemple : xyz@exemple.com">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<a href="inscription.php" class="col-4 offset-4"><button href="inscription.php" class="btn btn-primary btn-xl my-5" id="submitButton" type="submit">Inscription</button></a>
<a class="mx-5" href="mdp_oublie.php"><button type="button" class="btn btn-primary">Mot de passe oublié</button></a>

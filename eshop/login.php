<?php
include_once "index_top.php";
?>

<h1>Prihlásenie</h1>

<form action="index.php" method="post" class="form-horizontal">
  <div class="mb-3 mt-3">
    <label for="login" class="form-label">Užívateľské meno</label>
    <input type="text" class="form-control" id="login" placeholder="Zadajte login" name="login">
  </div>
  <div class="mb-3">
    <label for="heslo" class="form-label">Heslo</label>
    <input type="password" class="form-control" id="heslo" placeholder="Zadajte heslo" name="heslo">
  </div>
<p>Admin: Login = 9 Heslo = 9</p>
<p>User: Login = 1, Heslo = 1</p>

  <button type="submit" class="btn btn-primary">Odoslať</button>
  <a href="register.php" class="btn btn-primary">Registrácia</a>
</form>

<hr>




<?php
include_once "index_bottom.php";
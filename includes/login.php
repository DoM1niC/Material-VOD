<!DOCTYPE html>
      <?php include("head.php"); ?>
<body class="indigo darken-2">

<form action="index.php" class="form" method="post">
<input type="hidden" name="auth_act" value="login">	
  <div class="section"></div>
  <main>	
    <center>
      <h5 class="white-text">VOD Portal</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' required type='text' name='username' id='username' />
                <label for='username'>Dein Benutzername</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Dein Passwort</label>
              </div>
              <label style='float: right;'>
								<a class='hide pink-text' href='#!'><b>Forgot Password?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' value="Einloggen" name='btn_login' class='col s12 btn btn-large waves-effect indigo darken-2'>Anmleden</button>
              </div>
            </center>	
<?php if (isset($_POST["auth_act"])) { ?>
<button style="margin-bottom:10px" class='col s12 btn waves-effect red'>Logindaten falsch</button>

<?php } ?>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>			
	
						</form>
</body>
</html>
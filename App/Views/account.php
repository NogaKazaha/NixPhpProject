<div class="nav">
  <nav>
    <span id="span"><a href="./">Home</a> /</span>
    <span id="span"><a href="./account">Account</a></span>
  </nav>
</div>
<div class="account-container">
  <h1>Hello <?php echo $_SESSION['email'] ?></h1>
  <form method="POST">
    <input class="logout-btn" type="submit" value="Logout" name="logout" />
  </form>
</div>
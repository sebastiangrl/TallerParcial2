<?php $this->loadFragment("head"); ?>
<body class="text-center">
    <form class="form-signin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">The best Rol game eva </br> Please sign in</h1>

        <label for="inputUSer" class="sr-only">Email address</label>
        <input id="inputUSer" name="user" class="form-control" placeholder="User" requiered autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" requiered>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <a href="login">LogIn</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>
    </form>
    <script>

<?php
if (isset($_POST['submit'])) {
    
    \UserFactory::createUser();
    $value = \UserFactory::searchUser($_POST['user'], $_POST['password']);

    if ($value == true) {
        ?>
                document.location.assign('characters');
        <?php
    }
}
?>
    </script>
</body>
</html>
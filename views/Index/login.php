
<?php $this->loadFragment("head"); ?>
<body class="text-center">
    <form class="form-signin" action="login.php" method="post">
        <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">The best Rol game eva </br> Please sign in</h1>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>
    </form>
</body>
</html>
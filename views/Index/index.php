<?php 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    \UserFactory::createUser();
}

?>
<?php $this->loadFragment("head"); ?>
<body class="text-center">
    <form class="form-signin">
        <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">The best Rol game eva </br> Please sign in</h1>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <button onclick="goLogin()">Log In</button></a>
        
        
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>
    </form>
</body>

<script>
    
function goLogin(){
    
    <?php print_r("Eppa");
    \Index_controller::login();?>
}


</script>
</html>
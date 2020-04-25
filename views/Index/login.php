<?php $this->loadFragment("head");?>
<body class="text-center">
    <form class="form-signin" method="post">
        <!--<img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
        <h1 class="h3 mb-3 font-weight-normal">The best Rol game </br> Please Log In</h1>

        <label for="inputUSer" class="sr-only">User</label>
        <input id="inputUSer" name="user" class="form-control" placeholder="User" requiered autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" requiered>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>  
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>
    </form>
    
    <script>
        
        <?php
        if (isset($_POST['submit'])) {

            $value = \UserFactory::searchUser($_POST['user'], $_POST['password']);

            if ($value == true) {?>
                   document.location.assign('characters');<?php
            }
        }
    ?>
    </script>
</body>
</html>
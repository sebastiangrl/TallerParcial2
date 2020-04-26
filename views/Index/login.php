<?php $this->loadFragment("head"); ?>
<body class="text-center">
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">The best Rol game </br> Please Log In</h1>

        <label for="inputUSer" class="sr-only">User</label>
        <input id="inputUSer" name="user" class="form-control" placeholder="User" requiered autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" requiered>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>  
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>
    </form>

    <script>
        function go() {
            document.location.assign('characters');
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['user'] && !empty($_POST['password']))) {

            $value = \UserFactory::searchUser($_POST['user'], $_POST['password']);

            if ($value->getName() == $_POST['user']) {
                $_SESSION['user'] = $value;
                ?> 
                <script language="javascript">
                    go();
                </script> 
                <?php
            }
        }
    }
    ?>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    \CharacterFactory::createCharacter();
}
//$character = CharacterFactory::getCharacter(2);
//$character->delete();
?>


<?php $this->loadFragment("head"); ?>
<body class="text-center">
    <form class="form-signin" method="POST">
        <h1>Characters</h1>

        <fieldset>
            <label>Name: </label><input name="name" type="text" value=""></br>
            <label>Class: </label><select name="selectClass">
                <option value="" disabled selected>-- Select --</option>
                <option value="Mage">Mage</option> 
                <option value="Rogue">Rogue</option>
                <option value="Warrior">Warrior</option>
            </select>
        </fieldset>

        <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Create</button>
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="goArena">Go Arena</button>
    </form>

    <table class="table table-striped" id="characterTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Level</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $data = BlArena::searchMyFighters();
            foreach ($data as $character) :
                $character = CharacterFactory::getCharacter(null, $character);
                ?>
            <form>
                <tr>             
                    <td value="<?php echo $character->getId() ?>">
                    <td><?php echo $character->getName() ?></td>
                    <td><?php echo Character::getClassName($character->getId()) ?></td>
                    <td><?php echo $character->getLevel() ?></td>      
                </tr>
            </form>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
<?php if (isset($_POST['goArena'])) { ?>
        document.location.assign('arena');
    <?php
}?>
</script>

</body>
</html>



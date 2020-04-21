<?php $this->loadFragment("head"); ?>
<body class="text-center">
    <form class="form-signin" method="POST">
        <h1>Characters</h1>

        <fieldset>
            <label>Name: </label><input id="name" name="name" type="text" value="" required></br>
            <label>Class: </label><select name="selectClass" required>
                <option value="" disabled selected>-- Select --</option>
                <option value="Mage">Mage</option> 
                <option value="Rogue">Rogue</option>
                <option value="Warrior">Warrior</option>
            </select>
        </fieldset>

        <button id="createBtn" class="btn btn-lg btn-primary btn-block" type="submit" onclick="createCharacter()">Create</button>

    </form>

    <?php echo \CharacterFactory::createCharacter(); ?>

    <table class="table table-striped" id="characterTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Level</th>
            </tr>
        </thead>

        <tbody id="characters">
        </tbody>
    </table>


    <script>

        const createBtn = document.querySelector('#createBtn'),
        table = document.querySelector('#characters');
        let id = 0;

        if (id < 10) {

            createBtn.onclick = () => {

                const newCharacter = document.createElement('tr');
                
                newCharacter.innerHTML = `
                <th scope="row">${id = id + 1}</th>
                <td><?php echo $_POST['name']; ?> </td> <td><?php echo $_POST['selectClass']; ?> </td>
            `;
                    
                table.appendChild(newCharacter);
            }
        } else {
            //<h2>No puedes crear mas de 10 personajes</h2>
        }

    </script>


</body>
</html>



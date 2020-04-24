<?php $this->loadFragment("head"); ?>

<body>
  <div class="centerDiv">
    <form>
        <div class="form-group">
        <label for="exampleInputEmail1">Personaje</label>
          <select class="form-control">
            <option>Personajes</option>
            <?php $data = BlArena::searchMyFighters();
            foreach ($data as $challenger) : ?>
              <option><?php echo $challenger['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="centerDiv2">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width: 100px;">Personaje</th>
          <th style="width: 100px;">Nivel</th>
          <th style="width: 100px;">Clase</th>
          <th style="width: 100px;">Jugador</th>
          <th style="width: 100px;">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php $data = BlArena::searchFighters();
        foreach ($data as $defenders) : 
            $defenders = CharacterFactory::getCharacter(null,$defenders);?>
          <form>
            <tr>             
                <td value="<?php echo $defenders->getId() ?>"><?php echo $defenders->getName() ?></td>
                <td><?php echo $defenders->getLevel() ?></td>
                <td><?php echo Character::getClassName($defenders->getId()) ?></td>
                <td>xXxPlayerDestroyerxXx</td>
                <td><button type="submit" class="btn btn-primary">Desafiar</button></td>             
            </tr>
          </form>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>



</body>

</html>
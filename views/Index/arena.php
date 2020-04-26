<?php $this->loadFragment("head"); ?>

<body>
  <div class="centerDiv">
    <form>
        <div class="form-group">
        <label for="exampleInputEmail1">Personaje</label>
          <select class="form-control">
            <option>Personajes</option>
            <?php $data = BlArena::searchMyFighters();
            foreach ($data as $challenger) : 
                $challenger = CharacterFactory::getCharacter(null,$challenger);?>
              <option><?php echo $challenger->getName() ?></option>
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
            <tr>             
                <td value="<?php echo $defenders->getId() ?>"><?php echo $defenders->getName() ?></td>
                <td><?php echo $defenders->getLevel() ?></td>
                <td><?php echo get_class($defenders); ?></td>
                <td><?php echo $defenders->getUserName();?></td>
                <td><button type="submit" class="btn btn-primary">Desafiar</button></td>             
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
      <?php // para que funcione se deben recuperar los datos y agregarlos en la funcion de abajo createArena se debe ingresar un objeto  
            //  CharacterFactory::getCharacter($id) pide un id y te regresa el objeto que se debe agregar en ArenaFactory::createArena()
        $datos = ArenaFactory::createArena(CharacterFactory::getCharacter(1)->getName(), CharacterFactory::getCharacter(11)->getName());
        $pj = $datos->fight(CharacterFactory::getCharacter(1), CharacterFactory::getCharacter(11));
        User::deleteUserChar($pj->getId());
        $pj->delete();
                ?>
      <label for="exampleInputEmail1">Batalla</label>
      <div class="batalla">
      <?php foreach ($datos->getModeloHistoria() as $value) {
        echo $value['Action'];
      }
       ?>
    </div>
  </div>

</body>

</html>
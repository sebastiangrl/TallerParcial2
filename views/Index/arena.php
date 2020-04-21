<?php $this->loadFragment("head"); ?>
<body>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <select class="form-control">
    <option>Large select</option>
    </select>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

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
    <tr>
      <td>Foo</td>
      <td>4	</td>
      <td>Mage</td>
      <td>xXxPlayerDestroyerxXx</td>
      <td>Desafiar</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

</body>
</html>
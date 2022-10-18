{include file="header.tpl"}
<form method="POST" action="insert/stickers" enctype='multipart/form-data'>
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="ingrese nombre del jugador">
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="ingrese apellido del jugador">
  </div>
  <div class="mb-3">
    <label for="numero" class="form-label">Numero de figurita</label>
    <input type="number" class="form-control" name="numero" placeholder="ingrese numero de la figurita">
  </div>
  <div class="mb-3">
    <label class="form-label" for="seleccion">Seleccion</label>
    <select name="seleccion" class="form-control" placeholder="Elija seleccion del jugador">
        <option value=-1></option>
        {foreach from=$teams item=$team }
            <option value={$team->id_pais}>{$team->pais}</option> {*preguntar si esto es necesario*}
        {/foreach}
    </select>
  </div>
  <div class="mb-3">
    <input  name="image_dir" type="file" id="imageToUpload" placeholder="ingrese una nueva imagen">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
{include file="footer.tpl"}
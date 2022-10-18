{include file="header.tpl"}
<form method="POST" action="insert/teams" enctype='multipart/form-data'>
  <div class="mb-3">
    <label for="nombre" class="form-label">Pais</label>
    <input type="text" class="form-control" name="pais" placeholder="ingrese nombre del jugador">
  </div>
  <div class="mb-3">
    <label for="bandera_dir" class="form-label">Imagen</label>
    <input  name="bandera_dir" type="file" id="imageToUpload" placeholder="ingrese una nueva imagen">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
{include file="footer.tpl"}
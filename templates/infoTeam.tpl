{include file="header.tpl"}
<div class="d-flex">
    {foreach from=$info item=$item}
        <img src="./{$item->bandera_dir}" class="flag">
        <div class="container-form">
            <p class="h3">Elija el campo que desee actualizar</p>
            <form class="flex-column" method="POST" action="update/teams" enctype='multipart/form-data'>
                <div class="white" type="button" data-toggle="collapse" data-target="#pais" aria-expanded="false" aria-controls="pais" for="pais">Nombre: {$item->pais}<i class="fa-solid fa-pen"></i></div>
                <div class="collapse" id="pais">
                    <input  type="text" name="pais" placeholder="ingrese un nuevo nombre">
                    <input type='hidden' name='id' value={$item->id_pais}>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <form class="flex-column" method="POST" action="update/teams" enctype='multipart/form-data'>
                <div class="white" type="button" data-toggle="collapse" data-target="#bandera_dir" aria-expanded="false" aria-controls="bandera_dir" for="bandera_dir">Direccion de imagen: {$item->bandera_dir}<i class="fa-solid fa-pen"></i></div>
                <div class="collapse" id="bandera_dir">
                    <input name="bandera_dir" type="file" id="imageToUpload" placeholder="ingrese una nueva imagen">
                    <input type='hidden' name='id' value={$item->id_pais}>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div> 
            </form>
        </div>
    {/foreach}
</div>
{include file="footer.tpl"}
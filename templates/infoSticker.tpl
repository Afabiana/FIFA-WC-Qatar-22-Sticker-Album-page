{include file="header.tpl"}
<div class="d-flex">
    {foreach from=$stickerinfo item=$sticker}
        <img src="./{$sticker->image_dir}" class="figurita">
        <div class="container-form">
            <p class="h1">Elija el campo que desee actualizar</p>
            <form class="flex-column" method="POST" action="update/stickers">
                <div class="white" type="button" data-toggle="collapse" data-target="#nombre" aria-expanded="false" aria-controls="nombre" for="nombre">Nombre: {$sticker->nombre} 
                {if isset($smarty.session.IS_LOGGED)}
                    <i class="fa-solid fa-pen"></i></div>
                    <div class="collapse" id="nombre">
                        <input  type="text" name="nombre" placeholder="ingrese un nuevo nombre">
                        <input type='hidden' name='id' value={$sticker->numero}>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                {/if}
            </form>
            <form class="flex-column" method="POST" action="update/stickers">
                <div class="white" type="button" data-toggle="collapse" data-target="#apellido" aria-expanded="false" aria-controls="apellido" for="apellido">Apellido: {$sticker->apellido} 
                {if isset($smarty.session.IS_LOGGED)}
                    <i class="fa-solid fa-pen"></i></div>
                    <div class="collapse" id="apellido" >
                        <input type="text" name="apellido" placeholder="ingrese un nuevo apellido">
                        <input type='hidden' name='id' value={$sticker->numero}>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                {/if}
            </form>
            <form class="flex-column" method="POST" action="update/stickers">
                <div class="white" type="button" data-toggle="collapse" data-target="#numero" aria-expanded="false" aria-controls="numero" for="numero">Numero de figurita: {$sticker->numero} 
                {if isset($smarty.session.IS_LOGGED)}
                    <i class="fa-solid fa-pen"></i></div>
                    <div class="collapse" id="numero">
                        <input type="number" name="numero" placeholder="ingrese un nuevo numero de figurita">
                        <input type='hidden' name='id' value={$sticker->numero}>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                {/if}
            </form>
            <form>
                <div class="white" type="button" data-toggle="collapse" data-target="#seleccion" aria-expanded="false" aria-controls="seleccion" for="seleccion">Seleccion: {$sticker->pais} 
                {if isset($smarty.session.IS_LOGGED)}
                    <i class="fa-solid fa-pen"></i></div>
                    <div class="collapse" id="seleccion">
                        <select name="pais" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                                {foreach from=$teams item=$team }
                                    <option value="{$team->id_pais}">{$team->pais}</option>
                                {/foreach}
                        </select>
                        <input type='hidden' name='id' value={$sticker->numero}>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
            </form>
            <form class="flex-column" method="POST" action="update/stickers" enctype='multipart/form-data'>
                    <div class="white" type="button" data-toggle="collapse" data-target="#image_dir" aria-expanded="false" aria-controls="image_dir" for="image_dir">Direccion de imagen: {$sticker->image_dir} <i class="fa-solid fa-pen"></i></div>
                    <div class="collapse" id="image_dir">
                        <input name="image_dir" type="file" id="imageToUpload" placeholder="ingrese una nueva imagen">
                        <input type='hidden' name='id' value={$sticker->numero}>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                {/if}
            </form>
            <h4 class="text-danger">{$error}</h4>
        </div>
    {/foreach}
</div>
{include file="footer.tpl"}
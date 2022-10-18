<div class="row row-cols-4">
{if isset($smarty.session.IS_LOGGED)}
    <a href="add/stickers" class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-plus circle-icon"></i>
    </a>
{/if}
    {foreach from=$stickers item=$sticker}
        <div class="figurita-container">
        {if isset($smarty.session.IS_LOGGED)}
            <a class="admin_actions" href="delete/stickers/{$sticker->nombre}-{$sticker->apellido}"><i class="fa-solid fa-trash circle-icon"></i></a>
            <a class="admin_actions" href="show/stickers/{$sticker->nombre}-{$sticker->apellido}"><i class="fa-solid fa-pen circle-icon"></i></a>
        {/if}
            <a href="show/stickers/{$sticker->nombre}-{$sticker->apellido}">
                <img src="./{$sticker->image_dir}" class="figurita"/>
            </a>
            <p class="text-center">{$sticker->numero}</p>
        </div>
    {/foreach}
</div>

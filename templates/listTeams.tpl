<p class="h1">Selecciona el pais que deseas ver:</p>
<div class="row row-cols-4">
    {if isset($smarty.session.IS_LOGGED)}
        <a href="add/teams" class="d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-plus circle-icon"></i>
        </a>
    {/if}
    {foreach from=$teams item=$team}
        <div class="figurita-container">
            {if isset($smarty.session.IS_LOGGED)}
                <a class="admin_actions white" type="button" data-toggle="collapse" data-target="#{$team->pais}" aria-expanded="false" aria-controls="{$team->pais}" for="{$team->pais}"><i class="fa-solid fa-trash circle-icon"></i></a>
                <a class="admin_actions" href="show/teams/{$team->pais}">
                    <i class="fa-solid fa-pen circle-icon"></i>
                </a>
            {/if}
            <a href="team/{$team->pais}">
                <img src="./{$team->bandera_dir}" class="bandera">
            </a>
            <div class="collapse" id="{$team->pais}">
                Si borra esta seleccion, se eliminaran todas las figuritas asociadas. ¿Esta seguro? 
                <a href="delete/teams/{$team->pais}">si/</a>
                <a href="home">no</a>
            </div>
        </div>
    {/foreach}
</div>
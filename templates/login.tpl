{include file="header.tpl"}
<div class="row row-4">
    <div class="col-md-4">
        <h2>{$title}</h2>
        <form action="verify/auth" method="POST">
            <div class="mb-3">
                <label class="form-label" for="seleccion">Email</label>
                <input class="form-control" name="email" type="text">                    
            </div>
            <div class="mb-3">
                <label class="form-label" for="seleccion">Contraseña</label>
                <input class="form-control" name="password" type="password">                    
            </div>
            <h4 class="text-danger">{$error}</h4>
            <button type="submit" class="btn btn-primary">enviar</button>
        </form>
    </div>
</div>
{include file="footer.tpl"}
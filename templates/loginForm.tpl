{include 'templates/header.tpl'}
<div class="container">
    <form action="verify" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Ingrese Password">
        </div>


        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

    {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
    {/if}


</div>
{include 'templates/footer.tpl'}


<div class="container">

    <h1>Añadir</h1>

    <form action="addSerie" method="POST">

    <h2>Ingrese los datos</h2>


    <div class="col-3">
        <div>

            <input name="name" type="text" placeholder="Nombre de la Serie"></input>

            <input name="genre" type="text" placeholder="Genero de la Serie"></input>

                <select name="choice" class="form-selected">
                            <option selected>Selecciona una Plataforma</option>
                
                                            
                                {foreach $platforms as $platform }
                                <option value="{$platform->id_platform}">{$platform->id_platform}({$platform->company})</option>
                                {/foreach}  

                        </select>

            <input name="image" type="file" placeholder="Archivo Imagen-Serie"></input>


        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Enviar</button>

    </form>

</div>


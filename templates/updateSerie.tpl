    {include 'templates\header.tpl'}

    

<div class="container">

    <h1>Actualizar</h1>

    <form action="confirmUpdSerie" method="POST">

    <h2>Ingrese los datos</h2>


    <div class="col-3">
        <div>
            <label>Nombre de la Serie</label>

            <input name="name" type="text" placeholder="Nombre de la Serie"></input>

            <label>Genero de la Serie</label>
            <input name="genre" type="text" placeholder="Genero de la Serie"></input>

              <label>Plataforma a la que Pertenece</label>
                <select name="choice" class="form-selected">
                            <option selected>Selecciona una Plataforma</option>
                
                                            
                                {foreach $platforms as $platform }
                                <option value="{$platform->id_platform}">{$platform->id_platform}({$platform->company})</option>
                                {/foreach}  

                              

                        </select>
                    <select name="id" class="form-selected">
                              <option value="{$id}">{$id}</option>
                    </select>   

            <label>Archivo Imagen-Serie</label>
            <input name="image" type="file" placeholder="Archivo Imagen-Serie"></input>


        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Enviar</button>

    </form>

</div>



    {include 'templates\footer.tpl'}


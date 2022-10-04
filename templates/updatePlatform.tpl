
    {include 'templates\header.tpl'}

    <div class="container">

        <h1>Actualizar</h1>

        <form action="confirmUpdPlatform" method="POST">

            <h2>Ingrese los datos</h2>

            <div class="col-3">
                <div>

                    <input name="company" type="text" placeholder="Nombre de Plataforma"></input>

                    <input name="price" type="text" placeholder="Precio Mensualidad"></input>

                    <select name="id" class="form-selected">

                      <option value="{$id}">{$id}</option>
                      
                    </select>   

                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Enviar</button>

        </form>

    </div>

 {include 'templates\footer.tpl'}


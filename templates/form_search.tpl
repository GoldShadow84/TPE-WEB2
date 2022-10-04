    {include 'templates\header.tpl'}
      

    <div class="container">

        <h2>Elige una Plataforma para ver sus series</h2>


            <form action="filter" method="POST" class="my-4">

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">

                            <select name="choice" class="form-selected">
                                <option selected>Selecciona una Plataforma</option>
                    
                  
                                    {foreach $platforms as $platform }
                                    <option value="{$platform->company}">{$platform->company}</option>
                                    {/foreach}  


                            </select>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </form>

    </div>


     {include 'templates\footer.tpl'}
   

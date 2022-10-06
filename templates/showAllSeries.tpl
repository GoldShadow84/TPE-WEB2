
    {include 'templates\header.tpl'}


      <div class="container">

        <h1>{$titulo}</h1>

          <ul class="list-group">
          
              {foreach $series as $serie }

                  <li class='list-group-item d-flex justify-content-between align-items-center'>
                    <span> <b><a href="viewSerie/{$serie->id_serie}">{$serie->name}</a></b> - {$serie->genre} - (Plataforma: {$serie->companies})</span>


                    {if $logged}
                    <a href='deleteSerie/{$serie->id_serie}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                    <a href='updateSerie/{$serie->id_serie}' type='button' class='btn btn-danger ml-auto'>Actualizar</a>
                    {/if}

                                
                  </li>

              {/foreach}
  

          </ul>



    </div>  
          
    {if $logged}
    {include 'templates\form_serie.tpl'}
    {/if}


    {include 'templates\footer.tpl'}



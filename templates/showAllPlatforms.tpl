
    {include 'templates\header.tpl'}


    <div class="container">

      <h1>{$titulo}</h1>

      <ul class="list-group">
      
           {foreach $platforms as $platform }

                <li class='list-group-item d-flex justify-content-between align-items-center'>
                  <span> <b>{$platform->company}</b> - <b> ${$platform->price} pesos</b> </span>
              

                  <a href='deletePlatform/{$platform->id_platform}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                <a href='update/{$platform->id_platform}' type='button' class='btn btn-danger ml-auto'>Actualizar</a>

                  </li> 

            {/foreach}

      </ul>

      

    </div>  
    

      {include 'templates\footer.tpl'}



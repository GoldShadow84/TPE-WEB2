
    {include 'templates\header.tpl'}


    <div class="container">

      <h1>{$titulo}</h1>

      <ul class="list-group">
      
           {foreach $platforms as $platform }

                <li class='list-group-item d-flex justify-content-between align-items-center'>
                  <span> <b>{$platform->company}</b> - <b> ${$platform->price} pesos</b> </span>
              

                  <a href='deletePlatform/{$platform->id_platform}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                <a href='updatePlatform/{$platform->id_platform}' type='button' class='btn btn-danger ml-auto'>Actualizar</a>

                  </li> 

            {/foreach}

      </ul>

      
      {include 'templates\form_platform.tpl'}
    </div>  


      


      {include 'templates\footer.tpl'}



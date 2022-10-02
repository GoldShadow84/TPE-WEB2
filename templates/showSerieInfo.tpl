
    {include 'templates\header.tpl'}


    <div class="container">

      <h1>{$titulo}</h1>

      <ul class="list-group">
      
              {foreach $series as $serie }
            

                <li class='list-group-item d-flex justify-content-between align-items-center'>

                <p>Nombre de la Serie: {$serie->name}</p>

                </li>

                <li class='list-group-item d-flex justify-content-between align-items-center'>

                <p>Genero: {$serie->genre}</p>

                </li>

                   <a href="series">Volver a Elegir</a>

              {/foreach}  
             
      </ul>

 




    </div>  
    

      {include 'templates\footer.tpl'}



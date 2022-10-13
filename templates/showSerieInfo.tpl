
    {include 'templates\header.tpl'}


      <div class="container">

          <h1>Informacion de la serie: </h1>

          <ul class="list-group">
      
              {foreach $series as $serie }
            
                  <a href="series">Volver a Elegir</a>
                  
                <li class='list-group-item d-flex justify-content-between align-items-center'>

                  <p>Nombre de la Serie: {$serie->name}</p>

                </li>

                <li class='list-group-item d-flex justify-content-between align-items-center'>

                  <p>Genero: {$serie->genre}</p>

                </li>

               <img class="img-thumbnail" src="{$serie->image}"/>         


              {/foreach}  
                
          </ul>

      </div>  
    

    {include 'templates\footer.tpl'}



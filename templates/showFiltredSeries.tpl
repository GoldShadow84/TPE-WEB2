
  {include 'templates\header.tpl'}


      <div class="container">

         <h1>Series Encontradas: </h1>

          <ul class="list-group">
          
              {foreach $series as $serie }

                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                      <span> <b>{$serie->name}</b> - <b> {$serie->genre}</b> </span>
                    </li>

                {/foreach}

          </ul>

          <a href="search">Buscar otra vez</a>


      </div>  
    

  {include 'templates\footer.tpl'}



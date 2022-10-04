    {include 'templates\header.tpl'}


    <div class="presentation">

         {if $logged}
        <h4>[Te encuentras en una sesion]</h4>
         {/if}

        <h2>Bienvenido a Series y Plataformas</h2>

        <p>Aqui encontraras informacion sobre determinadas Series y sus Plataformas de Streaming</p>

       <h4>Secciones: </h4>

       <p>En <b><a href="series">Series</a></b> vera una lista sobre determinadas series junto con su determinada Plataforma de Streaming.

        En <b><a href="platforms">Plataformas</a></b> puede ver una lista de distintas plataformas de streaming.

        en <b><a href="search">Buscar</a></b> podra elegir determinada plataforma y ver una lista de las series que se encuentran disponibles allí.

        <img src="images\img.jpg">

       </p>


    </div>

 </div>

    {include 'templates\footer.tpl'}
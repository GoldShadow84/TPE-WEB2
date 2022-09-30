{include 'templates\header.tpl'}
{include 'templates\form_alta.tpl'}


        
    <table class='table'>
          <tr>
            <th scope='col'>deudor</th>
            <th scope='col'>cuota</th>
            <th scope='col'>cuota_capital</th>
            <th scope='col'>fecha_pago</th>
            <th scope='col'>Id</th>
            <th scope='col'>Actualizar</th>
            <th scope='col'>Borrar</th>
         </tr>
    
    
    
       {foreach $pagos as $pago }
            <tr>
            <td>{$pago->deudor}</td>
            <td>{$pago->cuota}</td>
            <td>{$pago->cuota_capital}</td>
            <td>{$pago->fecha_pago}</td>
            <td>{$pago->ID}</td>
            <td><a href='update/{$pago->ID}' type='button' class='btn btn-danger ml-auto'>Actualizar</a></td>
            <td><a href='delete/{$pago->ID}' type='button' class='btn btn-danger ml-auto'>Borrar</a></td>
            </tr>
        {/foreach}
    
        </table>
    
     
{include 'templates\footer.tpl'}

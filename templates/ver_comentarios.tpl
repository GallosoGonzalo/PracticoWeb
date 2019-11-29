{include file="templates/header.tpl"}

<article class="container tabla">
    <section class="row form-insertar" >
            <form id="form-comentario" action="insertarcome" method="post" >
                <input type="text" class="col-2" name="comentario">             
                <select name="puntaje">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="hidden" name="idproducto" value="{$producto->id_producto}">
            <input type="submit" value="Comentar">
        </form>
    
          <table class="table table-striped table-dark tabla table-responsive-md margentabla">
            <thead>
                <tr>
                    <th scope="col">Comentario</th>
                    <th scope="col">Puntaje</th>
                </tr>
            </thead>
      </table>
          {foreach from=$comentario item=comentarios}
                    <td>{$comentarios->comentario}</td>
                    <td>{$comentarios->puntaje}</td>
                    
            </tr>        
            {/foreach}
 </table>
</section>
  </article>
  
{include file="templates/footer.tpl"}

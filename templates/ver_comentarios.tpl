{include file="header.tpl"}
<article class="container">
  {if ($isLogged=="Usuario")||($isLogged=="Administrador")}
        <section class="admin">
        {if $isLogged=="Administrador"}
        <a class="nav-link adminn" href="admin">Administracion <span class="sr-only"></span></a>
        {/if}
        <a class="nav-link adminn" href="logout">Logout <span class="sr-only"></span></a>
        </section>
    {/if}
<div> 
    <div class="card my-5 mx-4" style="width: 18rem";>
        <img src="{$producto->imagen}" class="img" style="width: 250px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{$producto->nombre}</h5>
            <p class="card-text">{$producto->descripcion}</p>
        </div>
    </div>
    <div class="col-12">
    <input type="hidden" name="idproducto" id="idp" value="{$producto->id_producto}">
    {if ($isLogged=="Administrador")||($isLogged=="Usuario")}
    <input type="text" class="col-3 form-control input" id="comentario"name="comentario" placeholder="Comentario">
    <select name="puntaje" class="col-3 form-control input" id="puntaje"> 
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    </select>
    <input type="submit" id="btn-comentario" class="btn btn-primary" value="insertar">
    </div>
    </div>
    {/if}
    <label class="isLogged" id="{$isLogged}"></label>
    <label class="idp" id="{$producto->id_producto}"></label>
    <section id="vue-comentarios">
        {include file="vue/comentarios.tpl"}
    </section>
</article>
<script src="./js/comentario.js"></script>
{include file="footer.tpl"}    

{include file="templates/header.tpl"}

<article class="container tabla">
    {if ($isLogged=="Usuario")||($isLogged=="Administrador")}
        <section class="admin">
        {if $isLogged=="Administrador"}
        <a class="nav-link adminn" href="admin">Administracion <span class="sr-only"></span></a>
        {/if}
        <a class="nav-link adminn" href="logout">Logout <span class="sr-only"></span></a>
        </section>
    {/if}

{if $isLogged=="Administrador"}
    <section class="row form-insertar" >
        <form action="insertar" method="post" enctype="multipart/form-data">
            <input type="file" class="col-2" name="input_name" id="imageToUpload" >
            <input type="text" class="col-2" name="nombre" placeholder="Nombre">
            <input type="text" class="col-2" name="descripcion" placeholder="Descripcion">
            <input type="text" class="col-2" name="precio" value="$" placeholder="Precio">
            <input type="text" class="col-2" name="marca" placeholder="Marca">
            <select name="id_catego">
               {foreach from=$categoria item=categorias}
               <option name="id_catego" value="{$categorias->id_categoria}">{$categorias->categoria}</option>
               {/foreach}
            </select>
            <input type="submit" value="insertar">
        </form>
        
        
    </section>
    {/if}
    <section>
        <table class="table table-striped table-dark tabla table-responsive-md margentabla">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoria</th>
                    

                </tr>
            </thead>
            <tbody id="tablaprueba">
                {foreach from=$producto item=productos}
                <tr>
                    {if isset($productos->imagen)}
                    <td> <img src="{$productos->imagen}"/> 
                    <form action="comentario" method="post">
                    <input type="submit" value="Comentarios">
                    </form></td>
                    {/if}
                    <td>{$productos->nombre}</td>
                    <td>{$productos->descripcion}</td>
                    <td>{$productos->marca}</td>
                    <td>{$productos->precio}</td>
                    <td>{$productos->categoria}</td>
                    {if $isLogged=="Administrador"}
                    <td><a href="borrarp/{$productos->id_producto}">Borrar</a></td>
                    <td><button type="button" id={$productos->id_producto} data-toggle="modal" data-target="#exampleModal{$productos->id_producto}">Modificar</button></td>
                 {/if}
                 </tr>
    {if ($isLogged=="Usuario")||($isLogged=="Administrador")}
                <div class="modal fade" id="exampleModal{$productos->id_producto}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{$productos->id_producto}">Modal title
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <section class="row">
                                    <form action="modificarp/{$productos->id_producto}" method="post" enctype="multipart/form-data">
                                        <input type="file"  name="input_name" id="imageToUpload" >
                                        <input type="text"  name="nombre" value="{$productos->nombre}">
                                        <input type="text"  name="descripcion" value="{$productos->descripcion}">
                                        <input type="text"  name="precio" value="{$productos->precio}">
                                        <input type="text"  name="marca" value="{$productos->marca}">
                                        <select name="id_catego">
                                        {foreach from=$categoria item=categorias}
                                        <option name="id_catego" value="{$categorias->id_categoria}">{$categorias->categoria}</option>
                                        {/foreach}
                                        </select>
                                        </tr>
                                        <input type="submit" value="Guardar">
                                    </form>
                                </section>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                {/if}
          
                {/foreach}
                            </tbody>
                        </table>
                    </section>
                </article>


{include file="templates/footer.tpl"}

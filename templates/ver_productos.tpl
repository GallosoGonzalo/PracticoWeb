{include file="templates/header.tpl"}

<article class="container tabla">
<h1>Lista de productos</h1>
    <section class="row form-insertar" >
        <form action="insertar" method="post">
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
    <section>
        <table class="table table-striped table-dark tabla table-responsive-md margentabla">
            <thead>
                <tr>
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
                    <td>{$productos->nombre}</td>
                    <td>{$productos->descripcion}</td>
                    <td>{$productos->precio}</td>
                    <td>{$productos->marca}</td>
                    <td>{$productos->categoria}</td>

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
                                    <form action="modificarp/{$productos->id_producto}" method="post">
                                        <input type="text" name="nombre" value="{$productos->nombre}">
                                        <input type="text" name="descripcion" value="{$productos->descripcion}">
                                        <input type="text" name="precio" value="{$productos->precio}">
                                        <input type="text" name="marca" value="{$productos->marca}">
                                        <select name="id_catego">
                                        {foreach from=$categoria item=categorias}
                                        <option name="id_catego" value="{$categorias->id_categoria}">{$categorias->categoria}</option>
                                        {/foreach}
                                        </select>
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
                                    <td><a href="borrarp/{$productos->id_producto}">Borrar</a></td>
                    <td><button type="button" id={$productos->id_producto} data-toggle="modal" data-target="#exampleModal{$productos->id_producto}">Modificar</button></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
</article>


{include file="templates/footer.tpl"}

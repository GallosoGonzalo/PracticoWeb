{include file="header.tpl"}


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
    <section class="row form-insertar">
        <form action="insertarc" method="post">
            <input type="text" class="col-6" name="categoria" placeholder="Categoria">
            <input type="submit" value="Insertar">
        </form>
    </section>
    {/if}
    <section>
        <table class="table table-striped table-dark tabla table-responsive-md margentabla">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$categoria item=categorias}
                <tr>
                    <td>{$categorias->categoria}</td>
        {if $isLogged=="Administrador"}
                <div class="modal fade" id="exampleModal{$categorias->id_categoria}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{$categorias->id_categoria}">Modal title
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <section class="row">
                                    <form action="modificarc/{$categorias->id_categoria}" method="post">
                                        <input type="text" name="categoria" value="{$categorias->categoria}">
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
                                    <td><a href="borrarc/{$categorias->id_categoria}">Borrar</a></td>
                    <td><button type="button" id={$categorias->id_categoria} data-toggle="modal" data-target="#exampleModal{$categorias->id_categoria}">Modificar</button></td>
                {/if}
                </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
</article>


{include file="footer.tpl"}

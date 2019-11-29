{include file="header.tpl"}


<article class="container tabla">

  
        
    <h1>Lista de Usuarios</h1>
        <section class="admin">
        <a class="nav-link adminn" href="logout">Logout <span class="sr-only"></span></a>
        </section>
    
    <section>
        <table class="table table-striped table-dark tabla table-responsive-md margentabla">
            <thead>
                <tr>
                    <th scope="col">Usuarios</th>
                    <th scope="col">Privilegio</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$usuario item=usuarios}
                <tr>
                    <td>{$usuarios->usuario}</td>
                    <td>{$usuarios->tipouser}</td>
{if $admin == "Administrador"}
                <div class="modal fade" id="exampleModal{$usuarios->id_usuario}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{$usuarios->id_usuario}">Modal title
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <section class="row">
                                    <form action="modificaru/{$usuarios->id_usuario}" method="post">
                                       <select name=tipoUser>
                                        <option name=tipoUser> Administrador </option>
                                        <option name=tipoUser> Usuario </option>
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
                                    <td><a href="borraru/{$usuarios->id_usuario}">Borrar</a></td>
                    <td><button type="button" id={$usuarios->id_usuario} data-toggle="modal" data-target="#exampleModal{$usuarios->id_usuario}">Modificar</button></td>
                {/if}
                </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
</article>


{include file="footer.tpl"}
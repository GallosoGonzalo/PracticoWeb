    {include file="header.tpl"}
    <section class="contenedor">
    <form action="iniciarSesion" method="POST" role="form">
        <div class="form-group">
            <label for="email">Usuario:</label>
            <input type="text" name="user" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="pass" class="form-control" id="pwd">
        </div>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
            Ingresar
            </button>
            <a class="btn btn-primary btnreg" href="Registrar">Registrarme <span class="sr-only"></span></a>
        </form>
    </section>

    {include file="footer.tpl"}
</html>


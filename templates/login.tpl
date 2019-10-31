    {include file="header.tpl"}
    <section id="contenedor">
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
        </form>
    </section>
    </body>

    {include file="footer.tpl"}
</html>


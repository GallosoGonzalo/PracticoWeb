  {include file="header.tpl"}
    <section class="contenedor">
    <form action="Registro" method="POST">
        <div class="form-group">
            <label>Usuario:</label>
            <input type="text" name="user" class="form-control"  placeholder="Usuario">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="pass" class="form-control"  placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
            Registrarme
            </button>
        </form>
         </section>

    {include file="footer.tpl"}
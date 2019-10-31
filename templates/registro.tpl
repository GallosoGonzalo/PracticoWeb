  {include file="header.tpl"}
      
    <form action="Registro" method="POST">
        <div class="form-group">
            <label>Usuario:</label>
            <input type="text" name="usuario" class="form-control"  placeholder="Usuario">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="pass" class="form-control"  placeholder="Password">
        </div>
            <input type="submit" value="Registro">
        </form>
    {include file="footer.tpl"}
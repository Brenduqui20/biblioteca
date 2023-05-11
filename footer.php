
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="plantilla/js/custom.js"></script>
     <script src="js/script.js"></script>
     <script src="js/alumnos.js"></script>
     <script src="js/autor.js"></script>

   

    <div id="modal" class="modal">
        <div class="modal-fondo"></div>
        <div class="modal-contenido">
            <form action="" method="post" id="modal_form">
                <div class="modal-header">
                    <h3 class="modal-titulo">ELIMINAR</h3>
                    <button class="modal-cerrar" onclick="ocultarModal()">&times;</button>
                </div>
                <div class="modal-cuerpo">
                    <p><span id="mensaje"></span></p>
                </div>
                <div class="modal-footer">
                    <a class="modal-btn-cancelar" onclick="ocultarModal()" style="text-decoration: none;">NO</a>
                    <button type="submit" name="btEliminar" class="modal-btn-aceptar">SI</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
  <div class="footer-container">
    <p align="center"  class="BI">BRENDA GARCIA</p>
  </div>
</footer>
</body>
</html>

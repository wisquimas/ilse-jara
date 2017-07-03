<div class="Contacto">
    <div class="Contacto--selector">
        <div class="Contacto--selector--select">PRESUPUESTO</div>
        <div class="Contacto--selector--select">Información</div>
        <div class="Contacto--selector--select">RELACIONES INTERNACIONALES y VENTAS</div>
        <div class="Contacto--selector--select" data-trabaje>TRABAJE CON NOSOTROS</div>
    </div>
    <div class="Contacto--ventana--body">
        <div class="Contacto--ventana">
            <div class="Contacto--ventana--cerrar">x</div>
            <div class="Contacto--ventana--title">Presupuesto</div>
            <form action="<?= get_page_uri(get_pageGafa('procesar-contacto')) ?>" method="post" class="Contacto--form"
                  enctype="multipart/form-data">
                <input type="hidden" name="tipo" id="Contacto--form--tipo"/>
                <div class="Contacto--form--label Contacto--form--label--email">
                    <label for="contacto-nombre">Nombre</label>
                    <div class="Contacto--form--input--cont">
                        <input type="text" class="Contacto--form--input" name="Nombre" id="contacto-nombre"/>
                    </div>
                </div>
                <div class="Contacto--form--label Contacto--form--label--email">
                    <label for="contacto-apellido">Apellido</label>
                    <div class="Contacto--form--input--cont">
                        <input type="text" class="Contacto--form--input" name="Apellido" id="contacto-apellido"/>
                    </div>
                </div>
                <div class="Contacto--form--label Contacto--form--label--email">
                    <label for="contacto-pais">País</label>
                    <div class="Contacto--form--input--cont">
                        <input type="text" class="Contacto--form--input" name="Pais" id="contacto-pais"/>
                    </div>
                </div>
                <div class="Contacto--form--label Contacto--form--label--email">
                    <label for="contacto-email">Mail</label>
                    <div class="Contacto--form--input--cont">
                        <input type="email" class="Contacto--form--input" name="Email" id="contacto-email"/>
                    </div>
                </div>
                <div class="Contacto--form--label Contacto--form--label--email">
                    <label for="contacto-telefono">Teléfono</label>
                    <div class="Contacto--form--input--cont">
                        <input type="tel" class="Contacto--form--input" name="Telefono" id="contacto-telefono"/>
                    </div>
                </div>
                <div class="clear"></div>
                <textarea name="texto" id="" cols="30" rows="10" class="Contacto--form--textarea"
                          placeholder=""></textarea>
                <!--/////////////
                Campos de trabaje
                /////////////-->
                <div class="Contacto--form--label Contacto--form--label--email Contacto--form--trabaje">
                    <label for="contacto-cv">CV</label>
                    <div class="Contacto--form--input--cont">
                        <input type="file" class="Contacto--form--input no_obligatorio" name="CV" id="contacto-cv"/>
                    </div>
                </div>
                <div class="Contacto--form--label Contacto--form--label--email Contacto--form--trabaje">
                    <label for="contacto-portfolio">Portfolio</label>
                    <div class="Contacto--form--input--cont">
                        <input type="file" class="Contacto--form--input no_obligatorio" name="Portfolio"
                               id="contacto-portfolio"/>
                    </div>
                </div>
                <div class="clear"></div>

                <button class="Contacto--form--enviar boton" type="button">Enviar</button>
            </form>
        </div>
    </div>
</div>
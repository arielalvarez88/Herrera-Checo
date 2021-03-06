<?php require dirname(__FILE__) . '/../paths.php'; ?>
<?php $section = 'contactos'; ?>

<div id="contactos">
    <?php require dirname(__FILE__) . '/defaultTopBanner.php'; ?>
    <h2 id="contactos-header">Para m&aacute;s informaci&oacute;n, no dudes en contactarnos.</h2>

    <div id="contactos-body">
        <div id="contactos-info">
            <h3>Direcci&oacute;n</h3>
            <p>Av. Juan Pablo Duarte <br/> Plaza Las Ramblas <br/> M&oacute;dulo 301, Santiago, Rep. Dom.</p>

            <h3>Tel&eacute;fonos</h3>
            <p>809-471-7807<br/> 809-471-7808</p>

            <h3>Email</h3>
            <p>constructora@herreracheco.com</p>

            
         
            
            <h3>Nuestra ubicaci&oacute;n</h3>

                
        </div>


        <form>
            <div>
                <label for="contactos-form-nombre" class="">Nombre <span class="required-text">*</span></label>
                
            <input type="text" id="contactos-form-nombre"/>
            </div>
            
            <div>
                <label for="contactos-form-email" class="">Email <span class="required-text">*</span></label>
                
            <input type="text" id="contactos-form-email"/>
            </div>
            
            <div>
                <label for="contactos-form-telephone" class="">Tel&eacute;fono<span class="required-text">*</span></label>
                
            <input type="text" id="contactos-form-telephone"/>
            </div>
            
            <div>
                <label for="contactos-form-empresa" class="">Empresa</label>
                
            <input type="text" id="contactos-form-empresa"/>
            </div>
            
            <div id="contactos-form-mensaje-container">
                <label for="contactos-form-nombre" class="">Mensaje <span class="required-text">*</span></label>
                
                <textarea></textarea>
            </div>
            

            <a href="#"><img src="<?php echo $paths->images . '/contactos/submitButton.png'; ?>"/></a>
        </form>
    </div>


</div>
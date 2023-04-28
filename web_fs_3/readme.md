3. CRUD PHP
Análisis
Se requiere desarrollar un formulario que cotice, guarde y notifique un traslado de Cancún a los Ferrys de las Islas; Isla Mujeres, Cozumel y Holbox.

A considerar:

a. Campo origen CANCUN
b. Campos destino ISLA MUJERES, COZUMEL, HOLBOX
c. Costos de viaje a: 
- Isla Mujeres: Privado 45USD, Lujo 75USD
- Cozumel: Privado 80USD, Lujo 120USD
- Holbox: Privado 130USD, Lujo 200USD
c. Campo horarios 09:00 AM, 04:00 PM, 08:00 PM
d. Campo boton CONTINUAR

e. Campos cliente NOMBRE, EMAIL, TELEFONO 
f. Campo boton RESERVAR

Objetivos
a. El formulario únicamente deberá mostrar los campos 'destino', 'servicio', 'horario' y botón 'CONTINUAR'
b. El formulario deberá renderizar de forma reactiva un TOTAL según el destino y tipo de servicio que seleccione el usuario.
c. La página deberá contar y aplicar un tema DARK de forma reactiva al seleccionar un horario, aplicando el tema DARK únicamente para el horario de las 08:00 PM de lo contrario aplicar el tema por default
d. Al clickear el botón CONTINUAR deberá ocultar campos del paso 'a' y mostrar los campos 'nombre', 'email', 'telefono' y botón 'RESERVAR', también deberá mostrar una resumen de lo previamente seleccioando.
d. Al clickear el botón RESERVAR deberá:
- Validar como requeridos todos los campos y así también el dato válido según cada tipo de campo
- Guardar la información a través de un procedimiento almacenado en una base de datos MySQL (Diseño y estructura de desición libre)
- Una vez que la inserción en la base de datos fue exitosa:
-- Crear un un layout y rellenarlo de con la información previamente almacenada para su notificación vía correo electrónico
-- Enviar un correo electrónico a través de https://mailtrap.io/
-- Redirigir a una página de agradecimiento dónde se le mostrará nuevamente los detalles de su elección en forma de resumen.
Instrucciones:
a. Puede hacer uso de utilerías CSS para la presentación.
b. NO deberá hacerse uso de frameworks o librerias tipo react, vue, jquery, etc.
c. NO deberá hacerse uso de frameworks como Laravel, Codeigniter, Lumen, etc.
d. Deberán validarse los datos de entrada en ambos enfoques, Frontend y Bakcend


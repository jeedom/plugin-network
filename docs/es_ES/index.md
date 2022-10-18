# Redes de complementos

Este complemento le permite hacer ping o reactivar en equipos de red.

# Configuración del plugin

Después de descargar el complemento, solo necesita activarlo, no hay configuración en este nivel.

![networks](../images/networks.PNG)

# Configuración del equipo

Se puede acceder a la configuración del equipo de Redes desde el menú de complementos :

![networks2](../images/networks2.PNG)

Así es como se ve la página del complemento de Redes (aquí con 1 dispositivo ya) :

![networks3](../images/networks3.PNG)

Una vez que haces clic en uno de ellos, obtienes :

![networks4](../images/networks4.PNG)

Aquí encontrarás toda la configuración de tu equipo :

-   **Nombre del equipo de redes** : nombre de su equipo de redes,
-   **Objeto padre** : indica el objeto padre al que pertenece el equipo,
-   **Categoría** : categorías de equipos (puede pertenecer a varias categorías),
-   **Activar** : activa su equipo,
-   **Visible** : hace que su equipo sea visible en el tablero,
-   **Dirección IP** : Dirección IP para hacer ping,
-   **Dirección MAC (wol)** : Dirección MAC para wake-on-lan,
-   **Broadcast IP (wol)** : Dirección IP de transmisión de red para enviar wake-on-lan,
-   **Método de ping** : Elección del método de ping : IP (normal), ARP (preferido para teléfonos inteligentes y dispositivos que se duermen), PORT (para probar si un puerto está abierto)
-   **TTL** : Time-to-live, les valeurs peuvent etre :
    - 0 : même hote
    - 1 : mismas subredes
    - 32 : mismo sitio
    - 64 : misma región
    - 128 : mismo continente
    - 256 : sin limite
    Si tiene el error 'Tiempo de vida excedido', aumente este valor. Si está vacío, entonces el parámetro es 255. Tenga en cuenta que en algunas configuraciones (Docker, por ejemplo) el 255 no está autorizado, por lo que es necesario disminuir este valor.
-   **Puerto** : Puerto para hacer ping si está en modo ping en un puerto (ejemplo : 8080 para 192.168.0.12:8080),
-   **Actualización automática (cron)** : cron que define la frecuencia de ping,

A continuación encontrará la lista de pedidos :

-   **Nombre** : el nombre que se muestra en el tablero,
-   **Mostrar** : permite mostrar los datos en el tablero,
-   **Probar** : Se usa para probar el comando.

> **Nota**
>
> Jeedom va vérifier toutes les minutes (par defaut) le ping sur l'IP.

> **Importante**
>
> Si no ingresa el MAC y la dirección de transmisión, entonces no tendrá un comando de activación en LAN.

> **Nota**
>
> La dirección MAC debe ser de la forma : 5E:FF:56:A2:AF:15

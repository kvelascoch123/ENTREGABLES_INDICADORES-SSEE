---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Docuasdasdmentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#APIs Alexa


<!-- START_86fc8006ecce93479f27eed48f6131e1 -->
## Autenticación del usuario.

Validación del usuario registrado. Table: al_user

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/user/1/1?alias_name=kevin&user_password=abcd" \
    -H "Content-Type: application/json" \
    -d '{"nombreUsuario":"kevin","contrase\u00f1a":"abcd"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/user/1/1");

    let params = {
            "alias_name": "kevin",
            "user_password": "abcd",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreUsuario": "kevin",
    "contrase\u00f1a": "abcd"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/user/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "alias_name" => "kevin",
            "user_password" => "abcd",
        ],
    'json' => [
            "nombreUsuario" => "kevin",
            "contraseña" => "abcd",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "id_user": "2",
        "email": "kav.chuga@yavirac.edu.ec",
        "name": "Kevin"
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "Usuario no encontrado"
}
```

### HTTP Request
`GET api/alexa/user/{nombre}/{contrasena}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreUsuario | string |  optional  | requireddel usuario.
    contraseña | string |  required  | Contraseña del usuario'.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    alias_name |  required  | Nombre del usuario.
    user_password |  required  | Contraseña del usuario.

<!-- END_86fc8006ecce93479f27eed48f6131e1 -->

<!-- START_977e907b88276390119e1fa42a06bbb2 -->
## Reconocimiento del usuario.

Solicitud del nombre del usuario, bienvenida. Table: al_user

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/user/1?alias_name=kevin" \
    -H "Content-Type: application/json" \
    -d '{"nombreUsuario":"kevin"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/user/1");

    let params = {
            "alias_name": "kevin",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreUsuario": "kevin"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/user/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "alias_name" => "kevin",
        ],
    'json' => [
            "nombreUsuario" => "kevin",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "mensaje": "Usuario encontrado"
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "Usuario no encontrado"
}
```

### HTTP Request
`GET api/alexa/user/{nombre}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreUsuario | string |  required  | Nombre del usuario.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    alias_name |  required  | Nombre del usuario.

<!-- END_977e907b88276390119e1fa42a06bbb2 -->

<!-- START_434fbc0237e6bb50c5db08f2228b8564 -->
## Áreas.

Todas las áreas registradas.

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/areas?ninguno=nihil" \
    -H "Content-Type: application/json" \
    -d '{"ninguno":"sit"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/areas");

    let params = {
            "ninguno": "nihil",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ninguno": "sit"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/areas", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "ninguno" => "nihil",
        ],
    'json' => [
            "ninguno" => "sit",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "areas": [
            "Financiera",
            "Comercial",
            "Contable"
        ]
    }
}
```

### HTTP Request
`GET api/alexa/areas`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ninguno | ninguno |  optional  | optional Ninguno.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    ninguno |  optional  | optional Ningun parametro.

<!-- END_434fbc0237e6bb50c5db08f2228b8564 -->

<!-- START_3f8be4723214005fb4a3d877c4457b31 -->
## Factor.

Todos los factors registrados mediante el área. Table: al_factor inner al_area

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/area/1?description=area+financiera" \
    -H "Content-Type: application/json" \
    -d '{"nombreArea":"area financiera"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/area/1");

    let params = {
            "description": "area financiera",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreArea": "area financiera"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/area/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "description" => "area financiera",
        ],
    'json' => [
            "nombreArea" => "area financiera",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "factoresPorArea": [
            "Liquidez",
            "Solvencia",
            "Gestion",
            "Rentabilidad"
        ]
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "Factores segun el area no encontradas"
}
```

### HTTP Request
`GET api/alexa/area/{description}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreArea | string |  required  | Nombre del area.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    description |  required  | Descripción del área .

<!-- END_3f8be4723214005fb4a3d877c4457b31 -->

<!-- START_9cd2d091485eebceaa2e1f418103ca02 -->
## Indicadores.

Todos los indicadores registrados según el factor. Table: al_indicators inner al_factor

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/indicadores/1?factor=liquidez" \
    -H "Content-Type: application/json" \
    -d '{"nombreFactor":"liquidez"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/indicadores/1");

    let params = {
            "factor": "liquidez",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreFactor": "liquidez"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/indicadores/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "factor" => "liquidez",
        ],
    'json' => [
            "nombreFactor" => "liquidez",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "factor": "Liquidez",
        "indicadores": [
            "liquidez corriente",
            "prueba acida"
        ]
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "Indicadore segun factor no encontrado"
}
```

### HTTP Request
`GET api/alexa/indicadores/{nombreFactor}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreFactor | string |  required  | Nombre del factor. 
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    factor |  required  | Nombre del factor.

<!-- END_9cd2d091485eebceaa2e1f418103ca02 -->

<!-- START_b39d0b86a8d7500c0eb74c29adcd7873 -->
## Monto Actual Año.

Cálculo del monto actual respecto al Año. Table: al_indicators_years

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/monthly/1/1?name=liquidez+corriente&year=2019" \
    -H "Content-Type: application/json" \
    -d '{"nombreIndicador":"liquidez corriente","a\u00f1o":"2019"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/monthly/1/1");

    let params = {
            "name": "liquidez corriente",
            "year": "2019",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreIndicador": "liquidez corriente",
    "a\u00f1o": "2019"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/monthly/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "name" => "liquidez corriente",
            "year" => "2019",
        ],
    'json' => [
            "nombreIndicador" => "liquidez corriente",
            "año" => "2019",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "indicator": "liquidez corriente",
        "monthly": [
            {
                "sumaActual": "1.46",
                "sumaAnterior": "1.37"
            }
        ],
        "resta": 0.09,
        "variacion": 6.57,
        "definicion": "es de 1.46, versus el año  anterior, que fue de 1.37 . La variacion es de 0.09, correspondiente al 6.57 %"
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "No monthly"
}
```

### HTTP Request
`GET api/alexa/monthly/{anio}/{nombreIndicador}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreIndicador | string |  required  | Nombre del indicador. 
    año | string |  required  | Año de busqueda .
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  required  | Nombre del indicador. 
    year |  required  | Año de busqueda. 

<!-- END_b39d0b86a8d7500c0eb74c29adcd7873 -->

<!-- START_0b2cf3cf67c78c39737600956e6f8fd4 -->
## Monto Actual Mes.

Cálculo del monto actual respecto al Mes. Table: al_indicators_years

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/monthly/1/1/1?month=enero&name=liquidez+corriente&year=2019" \
    -H "Content-Type: application/json" \
    -d '{"mes":"enero","nombreIndicador":"liquidez corriente","a\u00f1o":2019}'

```

```javascript
const url = new URL("http://localhost/api/alexa/monthly/1/1/1");

    let params = {
            "month": "enero",
            "name": "liquidez corriente",
            "year": "2019",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "mes": "enero",
    "nombreIndicador": "liquidez corriente",
    "a\u00f1o": 2019
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/monthly/1/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "month" => "enero",
            "name" => "liquidez corriente",
            "year" => "2019",
        ],
    'json' => [
            "mes" => "enero",
            "nombreIndicador" => "liquidez corriente",
            "año" => "2019",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "indicator": "rotacion de cartera",
        "monthly": [
            {
                "last_month": "20.05",
                "current_month": "25.01",
                "variation_between_months": "5.10",
                "criterial": "N",
                "description": "gestion"
            }
        ],
        "resta": 4.96,
        "variacion": "5.10",
        "definicion": "es de 25.01, versus el mes anterior, que fue de 20.05 . La variacion es de 4.96, correspondiente al 5.10 %"
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "No monthly"
}
```

### HTTP Request
`GET api/alexa/monthly/{mes}/{anio}/{nombreIndicador}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    mes | string |  required  | Mes de busqueda. 
    nombreIndicador | string |  required  | Nombre del indicador. 
    año | integer |  required  | Año de busqueda. 
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    month |  required  | Mes de busqueda. 
    name |  required  | Nombre del indicador.
    year |  required  | Año registrado. 

<!-- END_0b2cf3cf67c78c39737600956e6f8fd4 -->

<!-- START_647de820ee7a5b00d45d3a5c1d1a6e90 -->
## Token Insert.

Insertar token.
Guardar el token , usuario, indicador consultado en la tabla al_token_user.

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/tokenInsert/1/1/1/1?nombre_indicador=liquidez+corriente&month=agosto&year=2019&token=vel" \
    -H "Content-Type: application/json" \
    -d '{"nombreIndicador":"liquidez corriente","mes":"liquidez corriente","a\u00f1o":2019,"token":"fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/tokenInsert/1/1/1/1");

    let params = {
            "nombre_indicador": "liquidez corriente",
            "month": "agosto",
            "year": "2019",
            "token": "vel",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreIndicador": "liquidez corriente",
    "mes": "liquidez corriente",
    "a\u00f1o": 2019,
    "token": "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/tokenInsert/1/1/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "nombre_indicador" => "liquidez corriente",
            "month" => "agosto",
            "year" => "2019",
            "token" => "vel",
        ],
    'json' => [
            "nombreIndicador" => "liquidez corriente",
            "mes" => "liquidez corriente",
            "año" => "2019",
            "token" => "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```
> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/alexa/tokenInsert/{indicador}/{mes}/{anio}/{tokenEncrpt}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreIndicador | string |  required  | Nombre del indicador.
    mes | string |  required  | Mes de busqueda.
    año | integer |  required  | Año de busqueda.
    token | string |  required  | Token encrypt.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    nombre_indicador |  required  | Nombre del indicador.
    month |  required  | Mes de busqueda.
    year |  required  | Año de busqueda.
    token |  required  | Token encrypt.Example: fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj

<!-- END_647de820ee7a5b00d45d3a5c1d1a6e90 -->

<!-- START_8c1fc07f8977ce5bdd2660544db9d37f -->
## Validacion Usuario Token Web.

Desencriptar el toquen verificar segun el usuario, determinar el limite de visualización de la página web.

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/validateTokenUser/1/1?token=accusantium" \
    -H "Content-Type: application/json" \
    -d '{"token":"error"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/validateTokenUser/1/1");

    let params = {
            "token": "accusantium",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "error"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/validateTokenUser/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "token" => "accusantium",
        ],
    'json' => [
            "token" => "error",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "status": 0,
    "mensaje": "No existe el token asignado"
}
```

### HTTP Request
`GET api/alexa/validateTokenUser/{token}/{idUser}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | string |  required  | Token encrypt.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    token |  required  | Token encrypt.

<!-- END_8c1fc07f8977ce5bdd2660544db9d37f -->

<!-- START_4810a67f708e8eb514515bfb7c3eb00e -->
## Configuración.

Configuración del usuario y organización.
Utilidad: Determinar la organización del usuario.

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/configuration/1?id_org=1" \
    -H "Content-Type: application/json" \
    -d '{"Id_Organizaci\u00f3n":"1"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/configuration/1");

    let params = {
            "id_org": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Id_Organizaci\u00f3n": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/configuration/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "id_org" => "1",
        ],
    'json' => [
            "Id_Organización" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "id_al_configuration": "1",
        "value": "100.00",
        "isactive": "y",
        "description": "configuracion de Sidesoft",
        "created": "2019-09-02 16:18:13",
        "created_by": "100",
        "updated": "2019-09-02 16:18:27",
        "updated_by": "100",
        "name": "Sidesoft",
        "al_org_id": "1",
        "url_api": "http:\/\/www.sidesoft.com.ec",
        "url_project": "app_indicadores",
        "url_endpoint": "api\/alexa",
        "mail": "2",
        "smt_port": "3380",
        "token_p1": "0123456789abcdef0123456789abcdef",
        "token_p2": "abcdef9876543210abcdef9876543210"
    }
}
```
> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/alexa/configuration/{id_org}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Id_Organización | string |  required  | Nombre del indicador.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id_org |  required  | Nombre del indicador.

<!-- END_4810a67f708e8eb514515bfb7c3eb00e -->

<!-- START_67f8389c76319117722e49d50fb34a03 -->
## Comparación.

Comparación del indicador.
Utilidad: Txt_affirmative, respuesta de alexa.

> Example request:

```bash
curl -X GET -G "http://localhost/api/alexa/comparation/1?indicador=liquidez+corriente" \
    -H "Content-Type: application/json" \
    -d '{"indicador":"liquidez corriente"}'

```

```javascript
const url = new URL("http://localhost/api/alexa/comparation/1");

    let params = {
            "indicador": "liquidez corriente",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "indicador": "liquidez corriente"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/api/alexa/comparation/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "indicador" => "liquidez corriente",
        ],
    'json' => [
            "indicador" => "liquidez corriente",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "indicator": "rotacion de cartera",
        "txt_affirmative": "El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes."
    }
}
```
> Example response (404):

```json
{
    "status": 0,
    "mensaje": "No comparation"
}
```

### HTTP Request
`GET api/alexa/comparation/{nombreIndicador}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    indicador | string |  required  | Ninguno.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    indicador |  required  | Ningun parametro.

<!-- END_67f8389c76319117722e49d50fb34a03 -->

#APIs Web


<!-- START_f245be16f54f8d01fc355fddef8a19ae -->
## Indicador respecto al mes V1.

Versión 1, permite ver la pagina sin cumplir la validación del token ni tiempo límite de visualización.

> Example request:

```bash
curl -X GET -G "http://localhost/indicadorMYv1/1/1/1?name=doloremque&month=perspiciatis&year=voluptatem" \
    -H "Content-Type: application/json" \
    -d '{"nombreIndicador":"et","mes":"unde","a\u00f1o":2}'

```

```javascript
const url = new URL("http://localhost/indicadorMYv1/1/1/1");

    let params = {
            "name": "doloremque",
            "month": "perspiciatis",
            "year": "voluptatem",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreIndicador": "et",
    "mes": "unde",
    "a\u00f1o": 2
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/indicadorMYv1/1/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "name" => "doloremque",
            "month" => "perspiciatis",
            "year" => "voluptatem",
        ],
    'json' => [
            "nombreIndicador" => "et",
            "mes" => "unde",
            "año" => "2",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET indicadorMYv1/{nombre}/{mes}/{anio}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreIndicador | string |  required  | Nombre del indicador.
    mes | string |  required  | Mes de busqueda.
    año | integer |  required  | Año de busqueda.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  required  | Nombre del indicador.
    month |  required  | Mes de busqueda respecto al indicador.
    year |  required  | Año de busqueda respecto al indicador.

<!-- END_f245be16f54f8d01fc355fddef8a19ae -->

<!-- START_2a2ade87b5d7c5bda68ab6f49a5aa5fc -->
## Indicador respecto al año V1.

Versión 1, permite ver la pagina sin cumplir la validación del token ni tiempo límite de visualización.

> Example request:

```bash
curl -X GET -G "http://localhost/indicadorYv1/1/1?name=amet&year=maiores" \
    -H "Content-Type: application/json" \
    -d '{"nombreIndicador":"quam","a\u00f1o":8}'

```

```javascript
const url = new URL("http://localhost/indicadorYv1/1/1");

    let params = {
            "name": "amet",
            "year": "maiores",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreIndicador": "quam",
    "a\u00f1o": 8
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/indicadorYv1/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "name" => "amet",
            "year" => "maiores",
        ],
    'json' => [
            "nombreIndicador" => "quam",
            "año" => "8",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET indicadorYv1/{nombre}/{anio}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreIndicador | string |  required  | Nombre del indicador.
    año | integer |  required  | Año de busqueda.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  required  | Nombre del indicador.
    year |  required  | Año de busqueda respecto al indicador.

<!-- END_2a2ade87b5d7c5bda68ab6f49a5aa5fc -->

<!-- START_5ae08a65ca3674ca267b4dfd59b02e98 -->
## Indicador por mes.

Datos del indicador respecto al mes y año.
Utilidad: Visualización de la pagina respecto a los datos del Indicador y Mes

> Example request:

```bash
curl -X GET -G "http://localhost/indicadorMY/1/1/1/1?name=liquidez+corriente&month=agosto&year=2019&token=fTUsnJgJgOBx%2BUcV9um73t2ImqqOLctq4HT7Eh%2B0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj" \
    -H "Content-Type: application/json" \
    -d '{"nombreIndicador":"liquidez corriente","mes":"agosto","a\u00f1o":2019,"token":"fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj"}'

```

```javascript
const url = new URL("http://localhost/indicadorMY/1/1/1/1");

    let params = {
            "name": "liquidez corriente",
            "month": "agosto",
            "year": "2019",
            "token": "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreIndicador": "liquidez corriente",
    "mes": "agosto",
    "a\u00f1o": 2019,
    "token": "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/indicadorMY/1/1/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "name" => "liquidez corriente",
            "month" => "agosto",
            "year" => "2019",
            "token" => "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        ],
    'json' => [
            "nombreIndicador" => "liquidez corriente",
            "mes" => "agosto",
            "año" => "2019",
            "token" => "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "factor": "gestion",
    "indicator": "rotacion de cartera",
    "mes": "agosto",
    "mes_anterior_name": "Lulio",
    "mes_actual": "25.01",
    "mes_anterior": "20.05",
    "variacion": 4.96,
    "valor": "25.01",
    "base_total": [
        {
            "maxCurrentMonth": "25.01"
        }
    ],
    "proporcionla_data": [
        {
            "mes": "marzo",
            "valor_año": 15.42,
            "baseTotal_año": "29.57",
            "porcentaje_año": 52.147446736557,
            "mes_mes": "marzo",
            "valor_mes_unico": "4.56",
            "valor_mes": 18.23,
            "baseTotal_mes": "25.01",
            "porcentaje_mes": 72.890843662535,
            "color_bar": "brown"
        },
        {
            "mes": "agosto",
            "valor_año": 84.58,
            "baseTotal_año": "29.57",
            "porcentaje_año": 286.03314169767,
            "mes_mes": "agosto",
            "valor_mes_unico": "25.01",
            "valor_mes": 100,
            "baseTotal_mes": "25.01",
            "porcentaje_mes": 399.84006397441,
            "color_bar": "red"
        }
    ],
    "valor_interpretacion": "El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.",
    "data_chart": [
        {
            "al_indicator_id": "3",
            "value": "100",
            "isactive": "Y",
            "description": "gestion",
            "created": "2019-09-02 16:50:49",
            "created_by": "100",
            "updated": "2019-09-02 16:50:55",
            "updated_by": "100",
            "name": "rotacion de cartera",
            "al_org_id": "1",
            "al_user_role_id": "1",
            "allow_monthly": "N",
            "allow_not_compare": "Y",
            "al_factor_id": "3",
            "criterial": "B",
            "interpretation_need_compare": "N",
            "not_compare_value": null,
            "compare_middle_point_min": null,
            "compare_middle_point_max": null,
            "txt_affirmative": "El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.",
            "txt_negative": null,
            "graph_min_value": "0",
            "graph_max_value": "50",
            "graph_green_min_value": "35",
            "graph_green_max_value": "50",
            "graph_yellow_min_value": "25",
            "graph_yellow_max_value": "35",
            "graph_red_min_value": "25",
            "graph_red_max_value": "0"
        }
    ]
}
```
> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET indicadorMY/{nombre}/{mes}/{anio}/{token}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreIndicador | string |  required  | Nombre del indicador.
    mes | string |  required  | Mes de busqueda.
    año | integer |  required  | Año de busqueda.
    token | string |  required  | Token encrypt.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  required  | Nombre del indicador.
    month |  required  | Mes de busqueda respecto al indicador.
    year |  required  | Año de busqueda respecto al indicador.
    token |  required  | Token encrypt. 

<!-- END_5ae08a65ca3674ca267b4dfd59b02e98 -->

<!-- START_3562ba6d9cac05857ed07381d38de248 -->
## Indicador por año.

Datos del indicador respecto al año.
Utilidad: Visualización de la pagina respecto a los datos del Indicador respecto al Año.

> Example request:

```bash
curl -X GET -G "http://localhost/indicadorY/1/1/1?name=rotacion+de+cartera&year=incidunt&token=fTUsnJgJgOBx%2BUcV9um73t2ImqqOLctq4HT7Eh%2B0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj" \
    -H "Content-Type: application/json" \
    -d '{"nombreIndicador":"rotacion de cartera","a\u00f1o":2019,"token":"fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj"}'

```

```javascript
const url = new URL("http://localhost/indicadorY/1/1/1");

    let params = {
            "name": "rotacion de cartera",
            "year": "incidunt",
            "token": "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombreIndicador": "rotacion de cartera",
    "a\u00f1o": 2019,
    "token": "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/indicadorY/1/1/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "name" => "rotacion de cartera",
            "year" => "incidunt",
            "token" => "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        ],
    'json' => [
            "nombreIndicador" => "rotacion de cartera",
            "año" => "2019",
            "token" => "fTUsnJgJgOBx+UcV9um73t2ImqqOLctq4HT7Eh+0Z0Q0rhTHzlmxdsjXMGNj8PNV574UFBfZ0Z5woBTWA8G6ulvDmC9OhwmxvhvOQuUUxCmA9RYOCeiRScnpKB4agATj",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "factor": "gestion",
    "indicator": "Indicador rotacion de cartera respecto al año 2019",
    "mes": "",
    "anio": "2019",
    "año_anterior": 2018,
    "anio_actual_value": "36.34",
    "anio_anterior_value": "27.31",
    "variacion": 9.03,
    "valor": "4.56",
    "proporcionla_data": [
        {
            "mes": "marzo",
            "valor_año": 15.42,
            "baseTotal_año": "29.57",
            "porcentaje_año": 52.147446736557,
            "mes_mes": "marzo",
            "valor_mes_unico": "4.56",
            "valor_mes": 18.23,
            "baseTotal_mes": "25.01",
            "porcentaje_mes": 72.890843662535,
            "color_bar": "green"
        },
        {
            "mes": "agosto",
            "valor_año": 84.58,
            "baseTotal_año": "29.57",
            "porcentaje_año": 286.03314169767,
            "mes_mes": "agosto",
            "valor_mes_unico": "25.01",
            "valor_mes": 100,
            "baseTotal_mes": "25.01",
            "porcentaje_mes": 399.84006397441,
            "color_bar": "blue"
        }
    ],
    "base_total": [
        {
            "total_months": "29.57"
        }
    ],
    "valor_interpretacion": "El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.",
    "data_chart": [
        {
            "al_indicator_id": "3",
            "value": "100",
            "isactive": "Y",
            "description": "gestion",
            "created": "2019-09-02 16:50:49",
            "created_by": "100",
            "updated": "2019-09-02 16:50:55",
            "updated_by": "100",
            "name": "rotacion de cartera",
            "al_org_id": "1",
            "al_user_role_id": "1",
            "allow_monthly": "N",
            "allow_not_compare": "Y",
            "al_factor_id": "3",
            "criterial": "B",
            "interpretation_need_compare": "N",
            "not_compare_value": null,
            "compare_middle_point_min": null,
            "compare_middle_point_max": null,
            "txt_affirmative": "El resultado significa que la empresa en promedio tarda 25 dias en recuperar su cartera, en otras palabras su cartera se convierte en efectivo en menos de un mes.",
            "txt_negative": null,
            "graph_min_value": "0",
            "graph_max_value": "50",
            "graph_green_min_value": "35",
            "graph_green_max_value": "50",
            "graph_yellow_min_value": "25",
            "graph_yellow_max_value": "35",
            "graph_red_min_value": "25",
            "graph_red_max_value": "0"
        }
    ]
}
```
> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET indicadorY/{nombre}/{anio}/{token}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombreIndicador | string |  required  | Nombre del indicador.
    año | integer |  required  | Año de busqueda.
    token | string |  required  | Token encrypt.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name |  required  | Nombre del indicador.
    year |  required  | Año de busqueda respecto al indicador. Example 2019
    token |  required  | Token encrypt.

<!-- END_3562ba6d9cac05857ed07381d38de248 -->

#App Móvil


<!-- START_d0547df0a8fb839513d092df5f28f07d -->
## Token Update App.

POST token app móvil. 
Modificar el token en el campo app_user de la tabla al_user.

> Example request:

```bash
curl -X POST "http://localhost/api/alexa/tokenUpdate?token=fwdst48uh7tc6s8yu8sadjA&idUser=1" \
    -H "Content-Type: application/json" \
    -d '{"token":"lasd5678cjdez","idUser":1}'

```

```javascript
const url = new URL("http://localhost/api/alexa/tokenUpdate");

    let params = {
            "token": "fwdst48uh7tc6s8yu8sadjA",
            "idUser": "1",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "lasd5678cjdez",
    "idUser": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/api/alexa/tokenUpdate", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "token" => "fwdst48uh7tc6s8yu8sadjA",
            "idUser" => "1",
        ],
    'json' => [
            "token" => "lasd5678cjdez",
            "idUser" => "1",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
null
```

### HTTP Request
`POST api/alexa/tokenUpdate`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | string |  required  | Token.
    idUser | integer |  required  | Id del usuario.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    token |  required  | Token.
    idUser |  required  | Id del usuario.

<!-- END_d0547df0a8fb839513d092df5f28f07d -->

<!-- START_32537bc0483bd53395292518dc3aeafd -->
## Push Notifications.
Notificación del indicador en aplicación móvil.

> Example request:

```bash
curl -X GET -G "http://localhost/push/1?token=vel" \
    -H "Content-Type: application/json" \
    -d '{"token":"aspernatur"}'

```

```javascript
const url = new URL("http://localhost/push/1");

    let params = {
            "token": "vel",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "token": "aspernatur"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/push/1", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'query' => [
            "token" => "vel",
        ],
    'json' => [
            "token" => "aspernatur",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response:

```json
null
```

### HTTP Request
`GET push/{token}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | string |  required  | Token app_movil.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    token |  required  | Token app_movil.

<!-- END_32537bc0483bd53395292518dc3aeafd -->

#general


<!-- START_7c1e0ac0639bb1be6ffd9043492c477a -->
## _ignition/health-check
> Example request:

```bash
curl -X GET -G "http://localhost/_ignition/health-check" 
```

```javascript
const url = new URL("http://localhost/_ignition/health-check");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/_ignition/health-check", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _ignition/health-check`


<!-- END_7c1e0ac0639bb1be6ffd9043492c477a -->

<!-- START_e5f8cf3530eb18016c5b38d338c824a4 -->
## _ignition/execute-solution
> Example request:

```bash
curl -X POST "http://localhost/_ignition/execute-solution" 
```

```javascript
const url = new URL("http://localhost/_ignition/execute-solution");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/_ignition/execute-solution", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST _ignition/execute-solution`


<!-- END_e5f8cf3530eb18016c5b38d338c824a4 -->

<!-- START_c7878c22064327a038e101c534d2690d -->
## _ignition/share-report
> Example request:

```bash
curl -X POST "http://localhost/_ignition/share-report" 
```

```javascript
const url = new URL("http://localhost/_ignition/share-report");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://localhost/_ignition/share-report", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



### HTTP Request
`POST _ignition/share-report`


<!-- END_c7878c22064327a038e101c534d2690d -->

<!-- START_022a636baa67209b79bda81cb8c2b0c5 -->
## _ignition/scripts/{script}
> Example request:

```bash
curl -X GET -G "http://localhost/_ignition/scripts/1" 
```

```javascript
const url = new URL("http://localhost/_ignition/scripts/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/_ignition/scripts/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _ignition/scripts/{script}`


<!-- END_022a636baa67209b79bda81cb8c2b0c5 -->

<!-- START_f58213cd71dff813cecd421259a65e22 -->
## _ignition/styles/{style}
> Example request:

```bash
curl -X GET -G "http://localhost/_ignition/styles/1" 
```

```javascript
const url = new URL("http://localhost/_ignition/styles/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://localhost/_ignition/styles/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _ignition/styles/{style}`


<!-- END_f58213cd71dff813cecd421259a65e22 -->



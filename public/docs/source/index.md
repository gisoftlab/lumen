---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://research.local/docs/collection.json)

<!-- END_INFO -->

#Auth management

APIs for managing Auth
<!-- START_ac6527c96d4b9793a4c77ff1e22a8906 -->
## Authenticate a user and return the token if the provided credentials are correct.

> Example request:

```bash
curl -X POST "/auth/login" 
```

```javascript
const url = new URL("/auth/login");

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


### HTTP Request
`POST /auth/login`


<!-- END_ac6527c96d4b9793a4c77ff1e22a8906 -->

#Team management

APIs for managing teams
<!-- START_a50cae0b7c28bde2d8183f929d4db702 -->
## /teams
> Example request:

```bash
curl -X GET -G "/teams" 
```

```javascript
const url = new URL("/teams");

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

> Example response:

```json
null
```

### HTTP Request
`GET /teams`


<!-- END_a50cae0b7c28bde2d8183f929d4db702 -->

#User management

APIs for managing users
<!-- START_c85938a1661fd9e3d30b9d51df1c8f11 -->
## /users
> Example request:

```bash
curl -X GET -G "/users" 
```

```javascript
const url = new URL("/users");

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

> Example response:

```json
null
```

### HTTP Request
`GET /users`


<!-- END_c85938a1661fd9e3d30b9d51df1c8f11 -->

<!-- START_34185b6be1ea30206acdb5b1b4814ad5 -->
## /users
> Example request:

```bash
curl -X POST "/users" 
```

```javascript
const url = new URL("/users");

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


### HTTP Request
`POST /users`


<!-- END_34185b6be1ea30206acdb5b1b4814ad5 -->



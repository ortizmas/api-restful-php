# api-restful-php
API RESTful PHP Puro


## Especificações

- [x] CRUD de usuário
- [x] Obter endereços
- [x] Obter endereço por id
- [x] Obter Cidades
- [x] Obter Cidades por id
- [x] Obter Estados
- [x] Obter Estado por id
- [x] Obter total de usuários cadastrados por cidade
- [x] Obter total de usuários cadastrados por estado

## Configurar bases de dados e serviços

The project uses [MySql](https://www.mysql.com/downloads), [PHP 7.3.27](https://www.php.net/downloads.php) and [Insomnia](https://insomnia.rest/download).

## Como instalar

### Backend (API RESTful)

* Para descargar el proyecto, siga las instrucciones a continuación.:

```
1. git clone https://github.com/ortizmas/api-restful-php.git
2. cd api-restful-php
3. Configurar o banco de dados no config.php
4. Importar o arquivo apirestful.sql para o servidor de banco de dados.
5. Levantar o servidor php -S localhost:9090
```

* Endpoints

```
1. CRUD de usuário
	- CREATE http://localhost:9090/Api/users/create.php
	{
		"name":"Lucas Vargas",
		"email":"email@gmail.com",
		"password":"password",
		"cep":"44300000",
		"street":"Rua Luzer",
		"number":2,
		"district":"Capoeiruçu",
		"additional":"FADBA",
		"city_id":3,
		"state_id":4
	}

	- READ http://localhost:9090/Api/users/
	- UPDAT http://localhost:9090/Api/users/edit.php
	{
		"id":"5",
		"name":"Lucas SS",
		"email":"oree@gmail.com",
		"password":"password"
	}
	- DELETE http://localhost:9090/Api/users/delete.php
	{
		"id":"6"
	}
		
```

```
2. Obter endereços => http://localhost:9090/Api/addresses/
3. Obter endereço por id => http://localhost:9090/Api/addresses/show.php?id=4
4. Obter Cidades => http://localhost:9090/Api/cities
5. Obter Cidades por id => http://localhost:9090/Api/cities/show.php?id=500
6. Obter Estados => http://localhost:9090/Api/states
7. Obter Estado por id => http://localhost:9090/Api/states/show.php?id=1
8. Obter total de usuários cadastrados por cidade => http://localhost:9090/Api/addresses/total-users-by-cities.php
9. Obter total de usuários cadastrados por estado => http://localhost:9090/Api/addresses/total-users-by-states.php
		
```

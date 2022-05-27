<h1 align="center"> 
	 Crud 🚀  
</h1>


## :hammer: Funcionalidade do projeto

 Este projeto é um CRUD simples feito com o framework Laravel da linguagem PHP.

<h3>Telas</h3>

**Autenticação com JWT (Teste com Postman)**

<img src="https://user-images.githubusercontent.com/60020510/170698331-f478551d-3750-4f85-a883-c5f9d80272d6.PNG">
<img src="https://user-images.githubusercontent.com/60020510/170698333-5a59ca2e-0d59-485e-b8db-ffdf312685ea.PNG">
<img src="https://user-images.githubusercontent.com/60020510/170698326-f0d83145-36e0-4c82-afee-807bbb67034b.PNG">

<h3>Rotas</h5>

```
Login: http://localhost:8000/api/auth/login
Acesso aos clientes: http://localhost:8000/api/clients
Logout: http://localhost:8000/api/auth/logout
```

**Página principal**
<img src="https://user-images.githubusercontent.com/60020510/170698232-76024eeb-7fd3-4d28-b1fa-02d461845287.png">


<h3>Rota</h5>

```
Principal: http://localhost:8000
```

**Página de Login e Dashboard (Laravel jetstream)**

<img src="https://user-images.githubusercontent.com/60020510/170698236-857acf47-61ab-41fe-9be5-fca5a189a9d0.png">
<img src="https://user-images.githubusercontent.com/60020510/170698237-6e5de46e-c92f-452e-8683-a226fdc38e56.png">


<h3>Rotas</h5>

```
Login: http://localhost:8000/login
Dashboard: http://localhost:8000/dashboard
```

**Página dos Clientes (Crud)**

<img src="https://user-images.githubusercontent.com/60020510/170698239-e3d72066-9c12-4407-95ab-b9667729c337.png">


<h3>Rota</h5>

```
Clientes: http://localhost:8000/clients
```

## 🔑 Acesso ao projeto
```
Email: admin@admin.com
Senha: password
```

## 🚗 Executar o projeto(Siga as instruções abaixo para execução)

**Baixar e Acessar projeto**

```
$ git clone https://github.com/vandeilson01/Teste_laravel_CRUD.git

$ cd Teste_laravel_CRUD
```

**Baixar depedências**
```
$ composer install
```

**Gerar arquivo de ambiente e chave do app**
```
$ cp .env.example .env

$ php artisan key:generate
```

**Rodando migrations e seeders**
```
$ php artisan migrate --seed

$ php artisan db:seed --class=TypeSeeder
```

**Execução app na porta 8000**
```
$ php artisan serve
```

## 🛠️ Tecnologias utilizadas

**🩹 Depedências**

| Depedência | Versão |
| --- | --- |
| Composer | 1.* |

**☕ Back end**

| Linguagem | Versão |
| --- | --- |
| PHP | 7.3 | 8.0 |

| Framework | Versão |
| --- | --- |
| Laravel | 8.* |

 <h4>Biblioteca(s): </h4>
 
- Jwt-auth
- Laravel jetstream

<br/>

**🎨 Front End**

| Linguagem | Versão |
| --- | --- |
| HTML | 5 |
| CSS | 3 |
| JavaScript | ES6 |

 <h4>Biblioteca(s): </h4>
 
- Bootstrap
- Jquery

<br/>

## 🙂 Autor

Vandeilson Correia Fernandes

https://www.linkedin.com/in/vandeilson-fernandes-417934178/

## O que é este projeto? 🤔

### Projeto desenvolvido usando Framework Laravel e de autoria do curso LaravelPro da TreinaWeb

## Ferramentas utilizadas? 🛠

### 1) PHP (versão thread safe)

### 2) Composer

### 3) VS Code

## Extensões usadas

### Laravel Blade formatter (para indentar o que for feito usando o Blade)

### PHP Intelephense (Verificar a orientação da extensão para desativar a opção do VS code para PHP)

### PHP Namespace Resolver (para auxiliar a importar as classes)

## Passos do projeto 🗺

### 1-No terminal do VS Code ao terminal do windows, utilizar o comando composer create-project laravel/laravel --prefer-dist

### 2-Ajustar o arquivo de rotas

### 3-Criar o primeiro Controller (Home)

-   Usar o comando `php artisan make:controller HomeController --invokable` para um controlador com apenas uma função/método

### Criar layouts para reaproveitar componentes

-   Criar o diretório dos componentes com o comando `php artisan make:component layout --view` (esse view no final é para não criar uma classe component)
-   Pegar o conteúdo base de todas as views e colocar em layout.blade.php

### 4-Página de Rastreamento

#### 4.1-Controller do Rastreamento

-   Usar o comando `php artisan make:controller RastreamentoController --invokable` para um controlador com apenas uma função/método

#### 4.2-Rota do Rastreamento

-   No arquivo web.php colocar `Route::get('/rastreamento', RastreamentoController::class);`

#### 4.3-Criar a view da página de rastreamento

-   Em resources->view criar uma pasta chamada frete e dentro dela criar o arquivo rastreamento.blade.php

#### 4.4 - Direcionar o controller de rastreamento para view correspondente

-   Dentro do método \_\_invoke inserir: `return view('frete.rastreamento');`

#### 5 - Criação da estrutura do banco de dados

##### - Criação dos Migrations:

Migrations no Laravel são um sistema de controle de versão para o esquema do seu banco de dados, permitindo definir e
compartilhar a estrutura (tabelas, colunas, índices) usando código PHP em vez de SQL. Elas funcionam como "commits" para o banco,
facilitando a criação, modificação e reversão de alterações estruturais entre ambientes de desenvolvimento e produção

-   a) Migration Clientes: no terminal usar o comando: `php artisan make:migration CreateClientesTable`
-   Criada a Migration, ajustar o método dela de acordo com a tabela que será usada (Clientes)
    public function up(): void
    {
    Schema::create('clientes', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->string('telefone')->unique();
    $table->timestamps();
    });
    }
-   b) Migration Frete: seguir mesmo comando da Clientes com a seguinte alteração: `php artisan make:migration CreateFretesTable`
- Criada a Migration ajustar o método:
`public function up(): void
    {
        Schema::create('fretes', function (Blueprint $table) {
            $table->id();
            $table->string('origem');
            $table->string('destino');
            $table->string('codigo_rastreio')->unique();
            $table->string('status');

            $table->foreignId('remetente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('destinatario_id')->constrained('clientes')->onDelete('cascade');

            $table->timestamps();
        });
    }`

<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->

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

### 1-No terminal do VS Code ao terminal do windows, utilizar o comando `composer create-project laravel/laravel tw-transportes --prefer-dist`

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

```
    public function up(): void
    {
    Schema::create('clientes', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->string('telefone')->unique();
    $table->timestamps();
    });
    }
```

-   b) Migration Frete: seguir mesmo comando da Clientes com a seguinte alteração: `php artisan make:migration CreateFretesTable`
-   Criada a Migration ajustar o método:

```
public function up(): void
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
```

-   c) Migration Etapas: seguir mesmo comando da Clientes com a seguinte alteração: `php artisan make:migration CreateEtapasTable`
-   Criada a Migration ajustar o método:

```
public function up(): void
   {
       Schema::create('etapas', function (Blueprint $table) {
           $table->id();
           $table->string('descricao');

           $table->foreignId('frete_id')->constrained('fretes')->onDelete('cascade');

           $table->timestamps();
       });
   }
```

##### - Criadas as Migrations executá-las

-   Comando `php artisan migrate`

#### 6 - Trabalhando com os Models

-   Para criar via linha de comando é: `php artisan make:model Frete` (por convenção, melhor criar no singular diferente das migrations)

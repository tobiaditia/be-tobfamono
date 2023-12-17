<a name="readme-top"></a>

## Daftar Isi
<ul>
    <li>
      <a href="#checklist">Checklist</a>
      <ul>
        <li><a href="#">PHP 8.1</a></li>
      </ul>
    </li>
    <li>
      <a href="#installation">Installation</a>
      <ul>
        <li><a href="#fresh-laravel">Install Fresh Laravel</a></li>
        <li><a href="#set-environment">Set Environment</a></li>
        <li><a href="#create-database-user">Create Database User</a></li>
        <li><a href="#composer-install">Composer Install</a></li>
        <li><a href="#api-documentation">Dokumentasi API</a></li>
        <li><a href="#testing">Testing</a></li>
        <li><a href="#branch-merge-flow">Branch & Merge Flow</a></li>
      </ul>
    </li>
</ul>

<p style="text-align: right" class="text-right">(<a href="#readme-top">back to top</a>)</p>

## Checklist
Sebelum melakukan proses installasi, pastikan beberapa kebutuhan khusus berikut terpenuhi / bekerja.

<p style="text-align: right" class="text-right">(<a href="#readme-top">back to top</a>)</p>

## Installation

<p style="text-align: right" class="text-right">(<a href="#readme-top">back to top</a>)</p>

<a name="fresh-laravel"></a>

### 1. Clone dari repo master

```bash
git clone https://github.com/tobiaditia/be-tobfamono.git
```

<a name="set-environment"></a>

### 2. Set Environment

- copy .env.local.example to .env

<a name="create-database-user"></a>

### 3. Create Database
Buat DB dengan nama tobfamono

<a name="composer-install"></a>

### 4. Composer Install

```bash
$ composer install
```

<a name="passport"></a>

### 5. Passport

```bash
$ php artisan passport:install
```

<a name="Seeder"></a>

### 5. Passport

```bash
$ php artisan db:seed --class="Database\Seeders\SystemSeeder"
```

<a name="api-documentation"></a>

### 6. Dokumentasi API

URL API Docs bisa diakses di [http://app.tobfamono.test/api/documentation](http://app.tobfamono.test/api/documentation).

<a name="testing"></a>

### 7. Testing

Coming soon
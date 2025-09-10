# 📖 Caderno Litúrgico

O **Caderno Litúrgico** é uma aplicação web desenvolvida para auxiliar na organização e gestão de informações para celebrações, como leituras e cânticos.  

Construído com o framework **Laravel**, o projeto é totalmente containerizado usando **Docker** e **Docker Compose**, garantindo um ambiente de desenvolvimento rápido, consistente e isolado.

---

## ✨ Funcionalidades Principais

- 📅 **Calendário Litúrgico**: Visualização de tempos litúrgicos, festas, solenidades e memórias.  
- 📖 **Gestão de Leituras**: Cadastro e consulta das leituras bíblicas para cada dia (Primeira Leitura, Salmo, Segunda Leitura, Evangelho).  
- 🎶 **Gerenciador de Cânticos**: Repositório de músicas e cânticos, com cifras e letras, organizados por tempo litúrgico ou tipo de celebração.  

---

## 🛠️ Tecnologias Utilizadas

- **Backend**: PHP 8.2+ / Laravel 12.x  
- **Banco de Dados**: PostgreSQL  
- **Servidor Web**: Nginx  
- **Containerização**: Docker & Docker Compose  
- **Frontend (padrão)**: Blade, Bootstrap e CSS  

---

## ⚙️ Pré-requisitos

Antes de começar, garanta que você tenha as seguintes ferramentas instaladas em seu sistema:

- [Docker](https://docs.docker.com/get-docker/)  
- [Docker Compose](https://docs.docker.com/compose/)  

---

## 🚀 Instalação e Execução

### 1. Clone o repositório:

```bash
git clone https://github.com/luandoliveira/Caderno-Lit-rgico.git
cd Caderno-Liturgico
````

### 2. Configure o arquivo de ambiente:

```bash
cp .env.example .env
```

Certifique-se de que seu arquivo `.env` contenha as seguintes configurações:

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=caderno_liturgico
DB_USERNAME=user      # ou o usuário definido no docker-compose.yml
DB_PASSWORD=password  # ou a senha definida no docker-compose.yml
```

### 3. Construa e suba os containers Docker:

```bash
docker compose up -d --build
```

### 4. Instale as dependências do Composer:

```bash
docker compose exec app composer install
```

### 5. Gere a chave da aplicação Laravel:

```bash
docker compose exec app php artisan key:generate
```

### 6. Execute as migrações (e seeders, se houver):

```bash
docker compose exec app php artisan migrate --seed
```

### 7. Pronto! 🎉

A aplicação estará rodando e acessível em:
👉 [http://localhost](http://localhost)



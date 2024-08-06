# Projeto de Visualização de Dados Meteorológicos com TreeMap

Este projeto é uma aplicação web desenvolvida com Laravel e D3.js para visualizar dados meteorológicos de diferentes cidades em um gráfico de TreeMap.

## Funcionalidades

- Buscar dados meteorológicos de qualquer cidade.
- Exibir dados como temperatura, umidade, pressão, velocidade do vento, direção do vento e nebulosidade.
- Visualizar esses dados em um gráfico de TreeMap interativo.

## Tecnologias Utilizadas

- **Laravel** (Framework PHP)
- **D3.js** (Biblioteca JavaScript para visualização de dados)
- **GuzzleHttp** (Cliente HTTP para PHP)

## Requisitos

- PHP >= 7.3
- Composer
- Laravel 8.x
- API key do OpenWeatherMap

## Instalação

1. Clone o repositório para o seu ambiente local:

    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd seu-repositorio
    ```

3. Instale as dependências do Composer:

    ```bash
    composer install
    ```

4. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, incluindo a chave da API do OpenWeatherMap:

    ```bash
    cp .env.example .env
    ```

5. Gere a chave da aplicação Laravel:

    ```bash
    php artisan key:generate
    ```

6. Inicie o servidor de desenvolvimento:

    ```bash
    php artisan serve
    ```

## Uso

Acesse a aplicação no navegador:

[http://localhost:8000](http://localhost:8000)

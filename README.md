## 💻 Projeto desafio Promobit

### 🚀 Techs Utilizadas
- PHP 8
- Laravel 8
- Jquery
- bootstrap 4.6
- AdminLTE 3
- MySQL 8

### Instalando o projeto

#### Clonar o repositório

```
git clone https://github.com/Sidneyasjr/desafio-promobit.git
```

#### Instalar as depencências

```
composer install
```

Ou em ambiente de desenvolvimento:

```
composer update
```

#### Criar arquivo de configurações de ambiente

Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto
configurar os detalhes da aplicação e conexão com o banco de dados.

#### Criar a estrutura no banco de dados

```
php artisan migrate
```

#### Iniciar o servidor de desenvolvimento

```
php artisan serve
```

#### Extração de relatório de releavância de produtos
```
SELECT tags.id
	,tags.name
	,COUNT(product_tag.product_id) AS qtde_products
	,GROUP_CONCAT(products.name ORDER BY products.name ASC SEPARATOR ', ') AS products
FROM tags
JOIN product_tag ON tags.id = product_tag.tag_id
JOIN products ON products.id = product_tag.product_id
GROUP BY tags.name

```

Abaixo está um `README.md` já estruturado para você colocar no GitHub:

````markdown
# 📦 API Almoxarifado

API desenvolvida em PHP para gerenciamento de produtos de um almoxarifado.

O sistema permite cadastrar, consultar, atualizar e excluir produtos armazenados em um banco de dados SQL.

## 🚀 Funcionalidades

A API possui as seguintes operações:

- ✅ Cadastrar produtos
- ✅ Listar produtos
- ✅ Atualizar produtos
- ✅ Excluir produtos
- ✅ Validação de categorias
- ✅ Comunicação com banco de dados através do PDO
- ✅ Recebimento e envio de dados no formato JSON

## 🛠️ Tecnologias utilizadas

- PHP
- SQL
- PDO
- JSON
- HTTP/REST

## 📂 Estrutura do projeto

```text
almoxarifado/
│
├── almoxarifado.php
├── conexao.php
└── README.md
````

### `almoxarifado.php`

Arquivo principal da API. É responsável por identificar o método HTTP utilizado e executar a operação correspondente.

### `conexao.php`

Arquivo responsável pela conexão entre o PHP e o banco de dados.

> As informações de acesso ao banco devem ser configuradas nesse arquivo.

---

# 🗄️ Banco de dados

A tabela utilizada pela API é:

```sql
CREATE TABLE almoxarifado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    fornecedor VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL
);
```

## 📋 Campos

| Campo            | Tipo    | Descrição                |
| ---------------- | ------- | ------------------------ |
| `id`             | INT     | Identificador do produto |
| `nome`           | VARCHAR | Nome do produto          |
| `categoria`      | VARCHAR | Categoria do produto     |
| `fornecedor`     | VARCHAR | Fornecedor               |
| `quantidade`     | INT     | Quantidade disponível    |
| `preco_unitario` | DECIMAL | Preço de cada unidade    |

---

# 📡 Endpoints

A API utiliza o arquivo:

```text
almoxarifado.php
```

As operações são diferenciadas pelo método HTTP.

---

## ➕ Cadastrar produto

### Método

```http
POST
```

### Exemplo de JSON

```json
{
    "nome": "Disjuntor Bipolar 20A",
    "categoria": "eletrica",
    "fornecedor": "EletroMais",
    "quantidade": 30,
    "preco_unitario": 45.90
}
```

### Categorias aceitas

Atualmente, a API aceita:

```text
eletrica
mecanica
hidraulica
```

### Resposta

```json
{
    "Mensagem": "item cadastrado com sucesso!"
}
```

---

# 🔎 Consultar produtos

### Método

```http
GET
```

O método `GET` consulta os produtos cadastrados no banco de dados e retorna os registros em JSON.

### Exemplo de resposta

```json
[
    {
        "id": 1,
        "nome": "Disjuntor Bipolar 20A",
        "categoria": "eletrica",
        "fornecedor": "EletroMais",
        "quantidade": 30,
        "preco_unitario": "45.90"
    }
]
```

---

# ✏️ Atualizar produto

### Método

```http
PUT
```

Para atualizar um produto, é necessário informar o `id` do item.

### Exemplo de JSON

```json
{
    "id": 1,
    "nome": "Disjuntor Bipolar 32A",
    "categoria": "eletrica",
    "fornecedor": "EletroMais",
    "quantidade": 50,
    "preco_unitario": 52.90
}
```

### Resposta esperada

```json
{
    "Mensagem": "item atualizado com sucesso!"
}
```

---

# 🗑️ Excluir produto

### Método

```http
DELETE
```

### Exemplo de JSON

```json
{
    "id": 1
}
```

### Resposta

```json
{
    "Mensagem": "item excluído com sucesso!"
}
```

---

# 🔌 Conexão com o banco de dados

A conexão é realizada utilizando o **PDO (PHP Data Objects)**.

Exemplo de configuração:

```php
<?php

$host = "localhost";
$dbname = "almoxarifado";
$user = "root";
$password = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    echo "Erro na conexão: " . $e->getMessage();

}

?>
```

> ⚠️ Não publique senhas reais do banco de dados no GitHub.

---

# 🧪 Testando a API

Você pode testar a API utilizando ferramentas como:

* Postman
* Insomnia
* Thunder Client
* Navegador, para requisições GET

### Exemplo

Se o projeto estiver rodando no servidor local:

```text
http://localhost/almoxarifado/almoxarifado.php
```

Para consultar os produtos:

```http
GET http://localhost/almoxarifado/almoxarifado.php
```

Para cadastrar:

```http
POST http://localhost/almoxarifado/almoxarifado.php
```

---

# 📊 Exemplo de produto

```json
{
    "nome": "Bomba Hidráulica",
    "categoria": "hidraulica",
    "fornecedor": "HidroTech",
    "quantidade": 10,
    "preco_unitario": 350.50
}
```

---

# 🎯 Objetivo do projeto

O projeto foi desenvolvido com o objetivo de praticar:

* Desenvolvimento de APIs em PHP
* Métodos HTTP
* Manipulação de JSON
* Operações CRUD
* SQL
* Conexão com banco de dados
* Utilização do PDO
* Integração entre aplicação e banco de dados

---

# 🔄 Operações CRUD

| Operação | Método HTTP | Função             |
| -------- | ----------- | ------------------ |
| Create   | `POST`      | Cadastrar produto  |
| Read     | `GET`       | Consultar produtos |
| Update   | `PUT`       | Atualizar produto  |
| Delete   | `DELETE`    | Excluir produto    |

---

# 👨‍💻 Autor

**Kauam de Souza Belsi**

Projeto disponível no GitHub:

[https://github.com/KauamDeSouzaBelsi/almoxarifado](https://github.com/KauamDeSouzaBelsi/almoxarifado)

---

# 📌 Status do projeto

🚧 Em desenvolvimento.

Novas funcionalidades e melhorias poderão ser adicionadas futuramente.

````

### ⚠️ Uma observação sobre o seu código atual

Eu também encontrei **alguns erros no `PUT`** do repositório que vale a pena corrigir antes de colocar o projeto como finalizado. Por exemplo, nessa parte há `almoxerifado`, `qunatidade` e `preco unitario`, enquanto no restante do projeto você usa `almoxarifado`, `quantidade` e `preco_unitario`. :contentReference[oaicite:1]{index=1}

O trecho atual é:

```php
$sql = "UPDATE almoxerifado SET nome=?,categoria=?,fornecedor=?,qunatidade=?,preco_unitario=? WHERE id=?";
````

O correto, considerando a tabela e os campos usados no `POST`, seria:

```php
$sql = "UPDATE almoxarifado 
        SET nome=?, categoria=?, fornecedor=?, quantidade=?, preco_unitario=? 
        WHERE id=?";
```

E:

```php
$dados["quantidade"],
$dados["preco_unitario"],
```

Isso é importante porque o **POST está funcionando**, mas o **PUT pode apresentar erro**. ([GitHub][1])

[Abrir seu repositório no GitHub](https://github.com/KauamDeSouzaBelsi/almoxarifado?utm_source=chatgpt.com)

[1]: https://github.com/KauamDeSouzaBelsi/almoxarifado/blob/main/almoxarifado.php "almoxarifado/almoxarifado.php at main · KauamDeSouzaBelsi/almoxarifado · GitHub"

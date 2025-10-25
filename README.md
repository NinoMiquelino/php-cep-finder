## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

# 🔍 Buscador de Endereço por CEP (PHP/JS Full Stack)

![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/php-cep-finder?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/php-cep-finder?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/php-cep-finder)

Este projeto simula uma funcionalidade essencial de e-commerce e cadastros: a busca e preenchimento automático de endereço a partir de um CEP. Ele demonstra a construção de um Service Layer em PHP para integrar APIs externas de forma limpa e o uso de JavaScript assíncrono para melhorar a experiência do usuário.

--

## 🚀 Arquitetura e Destaques

* **PHP POO (Service Layer):** A classe `CepService` isola toda a lógica de comunicação externa, incluindo a limpeza, validação do CEP e a requisição HTTP via cURL para a API ViaCEP.
* **Comunicação Segura e Tratamento de Erros:** O PHP trata diversos cenários de erro (CEP inválido, CEP não encontrado na base, erros de rede), retornando respostas JSON claras para o frontend.
* **JavaScript Assíncrono (UX):** O JavaScript usa o evento `onblur` e a `fetch` API para disparar a busca somente após o usuário terminar de digitar o CEP.
* **Feedback em Tempo Real:** O frontend exibe um spinner de carregamento e mensagens de status (sucesso, erro, buscando), garantindo que o usuário saiba o que está acontecendo.
* **Máscara e Validação Frontend:** O JavaScript aplica uma máscara no campo CEP e realiza uma validação inicial de formato, reduzindo requisições desnecessárias ao backend.

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 7.4+ (POO, cURL para requisições HTTP).
* **API Externa:** ViaCEP (API pública, sem necessidade de chave de autenticação).
* **Frontend:** HTML5, JavaScript Vanilla (`fetch` API, Event Listeners) e Tailwind CSS.

---

## 🧩 Estrutura do Projeto

```
php-cep-finder/
├── index.html
├── README.md
├── .gitignore
└── 📁 src/
         ├── CepService.php
         └── api.php
```
---

## ⚙️ Configuração e Instalação

### Pré-requisitos

1.  Um ambiente de servidor web com PHP.
2.  A **extensão cURL** do PHP deve estar habilitada.

### Execução

1.  Crie a estrutura de pastas e preencha os arquivos PHP e HTML.
2.  Execute o servidor embutido do PHP (a partir da raiz do projeto):

    ```bash
    php -S localhost:8001
    ```

3.  Acesse o formulário: `http://localhost:8001/public/index.html`.

## 📝 Instruções de Uso

1.  Acesse a página `index.html`.
2.  Digite um CEP válido (ex: **01001-000**) no campo.
3.  Saia do campo (clique em outro campo ou pressione Tab).
4.  O JavaScript dispara a requisição AJAX ao `api.php`, que consulta a ViaCEP.
5.  Os campos **Rua**, **Bairro**, **Cidade** e **UF** são preenchidos automaticamente.
6.  **Teste com Erros:**
    * Digite um CEP incompleto (menos de 8 dígitos).
    * Digite um CEP inválido (ex: **99999-999**). O PHP deve retornar 404.
    * O JavaScript deve limpar os campos de endereço e permitir a digitação manual em caso de falha na busca.

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/php-cep-finder/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/php-cep-finder/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---

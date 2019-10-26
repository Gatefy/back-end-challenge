# To Do Tasks

### Pré-requisitos
* PHP 7.2+
* NPM 6.11+

Este sistema foi testado e desenvolvido em Linux,
alguns comandos predefinidos podem não funcionar no Windows

### Instalação
Na pasta *ToDoList* executar os seguintes comandos no terminal:
```shell script
npm install;
gulp install;
```
Para gerar os usuários de teste do sistema basta executar: ``gulp seed;``.
Os 10 usuários criados terão o seguinte padrão:

| nome | email | senha |
| --- | --- | --- |
| user1 | user1@todo.list | user1 |
| user2 | user2@todo.list | user2 |
| ... | ... | ... |
| user10 | user10@todo.list | user10 |

Após isto, as necessidades do sistema já estarão completas.

Lembre-se de ajustar o arquivo ``.env`` de acordo com as suas necessidades.

### Execução
Para executar o serviço *WEB*, basta executar: ``gulp serve;``.
Por padrão sua execução se dá em: [http://127.0.0.1:8000](http://127.0.0.1:8000).

# Teste Back-End PHP

### Objetivo
Mostrar sua maturidade como desenvolvedor em aspectos como orientação a objetos, design patterns,
boas práticas, clean code, testes, recursos do framework (se utilizar), recursos da linguagem e recursos do HTTP;

### O que:
Seu código deve ser capaz de gerenciar uma API de lista de tarefas (To Do List).

O usuário deve poder:
- Adicionar um item a lista;
- Editar um item da lista;
- Marcar um item como feito;
- Remover um item da lista;
- Remover todos os itens marcados como feito;
- Remover todos os itens da lista;
- Filtrar por: mostrar todos, apenas marcados como feito, apenas não marcados como feito;

### Como:
Faça um pull request para este repositório com o seu código (Não esqueça de adicionar ao pull request as instruções
para executar seu programa).

### Extras:
Testes unitários e/ou testes E2E.

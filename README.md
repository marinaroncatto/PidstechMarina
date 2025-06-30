# Projeto PIDS TECH
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) 

![XAMPP](https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white) ![NotePad++](https://img.shields.io/badge/Notepad++-90E59A.svg?style=for-the-badge&logo=notepad%2B%2B&logoColor=black) ![ApacheNetBeans](https://img.shields.io/badge/apache%20netbeans-1B6AC6?style=for-the-badge&logo=apache%20netbeans%20IDE&logoColor=white)

Este projeto foi desenvolvido entre agosto e novembro de 2024 como requisito para a conclusão do curso Técnico em Informática do Senac Tech, em Porto Alegre.

## Sobre o Projeto

O tema do site é o **PIDS TECH**, uma iniciativa idealizada pelo professor Miguel Mattiola que busca democratizar o acesso à tecnologia para pessoas em situação de vulnerabilidade social. O projeto realiza a coleta, triagem e recuperação de computadores, notebooks e peças eletrônicas, destinando os equipamentos revitalizados a quem mais precisa. Caso não seja possível o reaproveitamento, os itens são descartados de forma ambientalmente responsável.

A iniciativa é mantida pelo professor Mattiola com o apoio voluntário de alunos do Senac, que atuam na manutenção e montagem dos equipamentos.

## Metodologia

- **Levantamento de requisitos** por meio de reuniões com o cliente (Miguel Mattiola).
- Utilização de **metodologia ágil** com foco em entregas contínuas e adaptabilidade.
- Aplicação da linguagem **Gherkin (BDD)** para descrever funcionalidades, estórias e testes de forma clara e acessível.
&nbsp;
## Tecnologias Utilizadas

- **Front-End:**
  - HTML5 e CSS3 (sem uso de frameworks)
  - JavaScript (para validação de regras de login e acesso)
  - Design das páginas desenvolvido com base nas aulas de Photoshop
  - IDE: Notepad++

- **Back-End:**
  - PHP (sem frameworks)
  - Arquitetura em três camadas: Model, View, Controller (MVC)
  - IDE: Apache NetBeans 22

## Estrutura do Projeto

- A **camada View** é responsável pela interface do usuário e por encaminhar requisições à camada Controller.
- A **Controller** aplica as regras de negócio e faz a mediação entre a View e a Model.
- A **Model** representa as entidades e realiza o acesso ao banco de dados.

As senhas são armazenadas utilizando o algoritmo SHA-1. *(Nota: sabe-se que SHA-1 não é mais recomendado para criptografia de senhas, uma melhoria futura incluirá a adoção de métodos mais seguros como `password_hash()`.)*

## Funcionalidades

- Sistema de autenticação com login de usuários
- Controle de acesso com validação por perfil
- Interface limpa, acessível e responsiva
- Funcionalidade provisória de recuperação de senha 
- Gerenciamento de doações recebidas pelo projeto (CRUD)
- Gerenciamento de doações destinadas a beneficiários (CRUD)
- Gerenciamento de usuários e perfis de acesso (CRUD)

 *(CRUD: Create, Read, Update, Delete — funcionalidades completas de criação, visualização, edição e exclusão de registros.)*

## Limitações

- O recurso de recuperação de senha está implementado de forma funcional, mas depende da configuração de um servidor de e-mails para que o link de redefinição seja enviado ao e-mail do usuário cadastrado.

&nbsp;
## Modelagem Funcional

### Lista dos Atores

| **Ator**                | **Descrição** |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Administrador**     | O administrador do sistema é encarregado de manter o banco de dados atualizado, tendo a responsabilidade de adicionar, excluir e editar todas as doações recebidas, assim como os perfis dos doadores, os quais podem ser classificados como Pessoa Física ou Pessoa Jurídica. <br><br>Além disso, o administrador é responsável pela gestão do estoque, podendo adicionar ou remover itens conforme necessário. <br><br>Também cabe ao administrador a criação, edição e exclusão de perfis de usuários secundários, garantindo um controle eficaz do sistema. |
| **Usuário**            | O usuário padrão terá a função específica de registrar as doações recebidas e os doadores no sistema, com a capacidade de categorizá-los entre Pessoa Física ou Pessoa Jurídica. |
| **Visitante**          | O Visitante não possui login na área administrativa, tendo acesso somente às informações do site e ao formulário de contato. |

&nbsp;&nbsp;

## Preview
&nbsp;
![mockup2](https://github.com/user-attachments/assets/83f9299d-0f27-44fd-9909-e82f4feaa489 "Mockup da página inicial com responsividade para desktop e mobile")


# Licença

Este projeto está protegido sob uma **Licença de Código-Fonte Visível com Uso Restrito**.

### Permissões

- A visualização do código é **permitida apenas para fins educacionais e consulta**.

### Restrições

- É **proibido copiar, modificar ou redistribuir** qualquer parte do código ou do design sem **autorização prévia da autora**.
- É proibido o uso comercial do projeto sem permissão expressa.

### Direitos Autorais

O **design visual** deste projeto — incluindo layout, paleta de cores, tipografia e elementos gráficos originais — está protegido por **direitos autorais** e não pode ser reproduzido ou adaptado.

Para solicitações especiais de uso ou contribuições, entre em contato com a autora.



© 2024 Marina M. Roncatto. Todos os direitos reservados.

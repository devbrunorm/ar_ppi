# ar_ppi

Projeto desenvolvido para avaliação na Disciplina de Programação para Internet (UNIPAR EAD)

## Acadêmico
<ul>
<li><b>Nome:</b> Bruno Renzi Marques</li>
<li><b>RA:</b> 09019085</li>
<li><b>Polo:</b> UNIPAR-EAD - Polo Umuarama</li>
<li><b>Curso:</b> Análise e Desenvolvimento de Sistemas</li>
<li><b>Disciplina:</b> Programação para Internet</li>
</ul>

## Projeto
Projeto Web que consiste em um CRUD de Produtos com autenticação, utilizando PHP, Bootstrap, jQuery e Font Awesome. Utilizada a estrutura de MVC neste projeto.

## Instalação
Esse projeto deve ter instalado no servidor de forma que o repositório fique na raiz do domínio. 
### Exemplo
Caso esteja utilizando o XAMPP, o repositório do projeto deve ficar no diretório:
```
/xampp/htdocs/ar_ppi
```

Sendo assim, entre no diretório "<i>htdocs</i>" do XAMPP e clone o repositório:
```
git clone https://github.com/devbrunorm/ar_ppi.git
```
## Utilização do projeto
Após clonar o repositório, basta abrir seu navegador e acessar:
```
http://localhost/ar_ppi/public/home/index
```

Se for a primeira vez que está acessando o sistema ou tiver reiniciado o servidor, você se deparará com uma tela de Login. Você não sairá dela até ser autenticado corretamente. Caso você não tinha uma conta, clique no botão de se registrar, crie sua conta e faça o login.

Pronto, com isso, você terá acesso ao sistema desenvolvido. A navegação por ele pode ser feita através da Navbar no canto superior ou através dos botões em tela.

## Produtos
Como demandado, foi desenvolvido um CRUD de produtos. Com isso, podemos visualizar, adicionar, atualizar ou remover produtos.

### Listagem
Ao clicar no item "Produtos" na Navbar ou em "Consultar produtos" no Menu Inicial, você será direcionado para uma listagem completa de produtos com suas principais informações e com botões de ação para visualizar, editar ou remover um produto em específico. Além disso, no cabeçalho da tabela, existe um botão para adicionar novos produtos.

### Adicionar
Ao clicar no botão "Adicionar" no cabeçalho da listagem de Produtos ou "Cadastrar novo produto" no menu inicial, você será redirecionado ao formulário de adição de produtos. Dentro dele, você deve preencher os campos dos produtos e clicar no botão "Adicionar" ao final do formulário. Entre os campos, alguns são <b>obrigatórios</b> sendo esses representados em negrito:

<ul>
<li><b>Nome:</b> Nome do produto a ser adicionado</li>
<li><b>Preço:</b> Valor que o produto é comercializado em R$. Nesse campo, o valor poder ser digitado com o dígito separador sendo vírgula (,) ou ponto(.). Em casos de valores inteiros, não necessita se digitar as casas decimais com 0</li>
<li><b>Código:</b> Código com o qual o produto é identificado pelo cliente</li>
<li>Vencimento: Nesse campo se informa a data de validade do produto, caso seja conveniente. Neste campo, a data deve ser preenchida no formato "dd/mm/yyyy"</li>
<li>Fabricante: Nome do fabricante do produto</li>
<li>Descrição: Informações extras que não estão presentes no formulário</li>
</ul>

Caso algum dos campos obrigatórios não sejam preenchidos, o próprio formulário indicará o campo vazio e pedirá o usuário o informe. Caso contrário, o produto será adicionado a base de dados e o usuário será redirecionado à listagem dos Produtos.

Caso queira cancelar a ação e retornar a listagem, basta clicar no botão "Cancelar" ao final do formulário.

### Editar
Ao clicar no botão de ação "Editar" de um produto em específico dentro da listagem de Produtos, você será redirecionado ao formulário de edição deste produto. Nessa tela, você se deparará com um formulário idêntico ao da tela "Adicionar", porém os valores dos campos estão preenchidos com os atributos daquele respectivo produto. Caso deseje alterar alguma informação, basta modificar os valores nos campos, contudo os campos que são obrigatórios no formulário de "Adicionar" também são obrigatórios aqui.

Ao finalizar a edição, basta clicar no botão "Editar" ao final do formulário. O registro será alterado no banco de dados e o usuário retornará à listagem de Produtos. Caso deseja cancelar a operação, basta clicar no botão "Cancelar" ao final do formulário e você será redirecionado à listagem também.

### Deletar
Caso deseje deletar algum produto em específico, navegue até a listagem de Produtos e clique na ação de "Deletar" do registro do produto que se deseje remover. Quando clicar no botão, uma caixa de alerta aparecerá no canto superior da tela pedindo para confirmar a ação. Caso o usuário confirme, o registro será deletado do banco de dados e a página será recarregada. Caso contrário, o processo é cancelado e o registro não é deletado.

### Visualizar
Para visualizar um produto, acesse a listagem de produtos. Cada registro possuirá um botão de "Visualizar" no seu menu de ações ou um link em seu nome e código. Clicando em uma dessas opções, você será encaminhado para um formulário idêntico ao da tela de "Editar", porém os campos serão apenas para visualização, não permitindo a alteração de seus valores. Após visualizar o formulário, o usuário pode clicar no botão "Retornar" para voltar até a listagem.

## Usuários
Já que foi demandado um sistema de login e registro, decidi adicionar um CRUD de usuário também para ajudar a gerenciar os usuários que podem ou não acessar o sistema.

### Listagem
Ao clicar no item "Usuários" na Navbar ou em "Gerenciar usuários" no Menu Inicial, você será direcionado para uma listagem completa de usuários com seus nomese <i>usernames</i> e com botões de ação para visualizar, editar ou remover um usuário em específico (desde que não seja o próprio usuário logado). Além disso, no cabeçalho da tabela, existe um botão para adicionar novos usuários sem ter que deslogar e cadastrá-lo.

### Adicionar
Ao clicar no botão "Adicionar" no cabeçalho da listagem de Usuário, você será redirecionado ao formulário de adição de usuários. Dentro dele, você deve preencher os campos dos usuários e clicar no botão "Adicionar" ao final do formulário. Entre os campos, alguns são <b>obrigatórios</b> sendo esses representados em negrito:

<ul>
<li>Nome: Nome completo do usuário</li>
<li><b>Username:</b> Login que o usuário utilizará durante o processo de login</li>
<li><b>Senha:</b> Senha que o usuário utilizará no login</li>
</ul>

Caso algum dos campos obrigatórios não sejam preenchidos, o próprio formulário indicará o campo vazio e pedirá o usuário o informe. Caso contrário, o usuário informado será adicionado a base de dados e o usuário logado será redirecionado à listagem dos Usuários.

Caso queira cancelar a ação e retornar a listagem, basta clicar no botão "Cancelar" ao final do formulário.

### Editar
Ao clicar no botão de ação "Editar" de um usuário em específico dentro da listagem de Usuários, você será redirecionado ao formulário de edição deste produto. Nessa tela, você se deparará com um formulário idêntico ao da tela "Adicionar", porém os valores dos campos estão preenchidos com os atributos daquele respectivo usuário (com exceção da senha por questões de segurança e privacidade). Caso deseje alterar alguma informação, basta modificar os valores nos campos, contudo os campos que são obrigatórios no formulário de "Adicionar" também são obrigatórios aqui (novamente, com exceção da senha, pois ela vem vazia por padrão).

Ao finalizar a edição, basta clicar no botão "Editar" ao final do formulário. O registro será alterado no banco de dados e o usuário retornará à listagem de Usuário. Caso deseja cancelar a operação, basta clicar no botão "Cancelar" ao final do formulário e você será redirecionado à listagem também.

### Deletar
Caso deseje deletar algum usuário em específico (desde não seja o próprio usuário logado), navegue até a listagem de Usuários e clique na ação de "Deletar" do registro do produto que se deseje remover. Quando clicar no botão, uma caixa de alerta aparecerá no canto superior da tela pedindo para confirmar a ação. Caso o usuário confirme, o registro será deletado do banco de dados e a página será recarregada. Caso contrário, o processo é cancelado e o registro não é deletado.

### Visualizar
Para visualizar um usuário, acesse a listagem de Usuários. Cada registro possuirá um botão de "Visualizar" no seu menu de ações ou um link em seu nome e código. Clicando em uma dessas opções, você será encaminhado para um formulário idêntico ao da tela de "Editar", porém os campos serão apenas para visualização, não permitindo a alteração de seus valores. Após visualizar o formulário, o usuário pode clicar no botão "Retornar" para voltar até a listagem.

### Login
Essa tela aparecerá apenas se o usuário estiver deslogado e estiver tentando acessar o sistema. Com isso, o usuário deverá informar um username e senha válidos com base nos usuários cadastrados no banco de dados. Se os dois foram válidos, o sistema criará uma sessão e liberará o acesso para esse usuário. Caso contrário, a tela apenas será recarregada, até o usuário informar um login válido.

Nesta tela também existe a opção de "Registrar", caso o usuário não tenha uma conta.

### Registrar
Essa tela só é acessível se o usuário estiver deslogado e clicar no botão "Registrar" na tela de login. Aqui um usuário que não tenha cadastro no sistema pode se cadastrar. O formulário é idêntico ao presente na tela de "Adicionar", portanto os campos presentes e quais são obrigatórios acabam sendo os mesmos. Após cadastra-se o usuário é redirecionado para a tela de login.

### Logout
Para sair do sistema, existem duas opções:
<ul>
<li>No botão "Logout" na <i>home</i></li>
<li>Na <i>Navbar</i> no link "Logout" à direita do username</li>
</ul>

Ao clica em uma dessas opções, uma caixa de alerta aparecerá confirmando se deseja deslogar. Se for confirmado, o processo é realizado, a sessão é finalizada e o usuário será redirecionado a tela de login. Caso contrário, o processo é cancelado.

## Referências
<a href="https://www.php.net/docs.php">Documentação Oficial do PHP</a>

<a href="https://getbootstrap.com/docs/5.1/getting-started/introduction/">Documentação Oficial do Bootstrap</a>

<a href="https://api.jquery.com">Documentação Oficial do jQuery</a>

<a href="https://fontawesome.com/docs">Documentação Oficial do Font Awesome</a>

<a href="https://www.youtube.com/watch?v=OsCTzGASImQ&list=PLfdtiltiRHWGXVHXX09fxXDi-DqInchFD">Playlist utilizada para gerar o formato MVC no PHP</a>
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

Pronto, com isso, você terá acesso ao sistema desenvolvido. A navegação por ele pode ser feita através da Navbar no canto superior ou através do botões em tela.

## Produtos
Como demandado, foi desenvolvido um CRUD de produtos. Com isso, podemos visualizar, adicionar, atualizar ou remover produtos.

### Listagem
Ao clicar no item "Produtos" na Navbar ou em "Consultar produtos" no Menu Inicial, você será direcionado para uma listagem completa de produtos com suas principais informações e com botões de ação para visualizar, editar ou remover um produto em específico. Além disso, no cabeçalho da tabela, existe um botão para adicionar novos produtos.

### Adicionar
Ao clicar no botão "Adicionar" no cabeçalho da listagem de Produtos ou "Cadastrar novo produto" no menu inicial, você será redicionado ao formulário de adição de produtos. Dentro dele, você deve preencher os campos dos produtos e clicar no botão "Adicionar" ao final do formulário. Entre os campos, alguns são <b>obrigatórios</b> sendo esses representados em negrito:

<ul>
<li><b>Nome:</b> Nome do produto a ser adiconado</li>
<li><b>Preço:</b> Valor que o produto é comecializado em R$. Nesse campo, o valor poder ser digitado com o dígito separador sendo vírgula (,) ou ponto(.). Em casos de valores inteiros, não necessita se digitar as casas decimais com 0</li>
<li><b>Código:</b> Código com o qual o produto é identificado pelo cliente</li>
<li>Vencimento: Nesse campo se informa a data de validade do produto, caso seja conviente. Neste campo, a data deve ser preenchida no formato "dd/mm/yyyy"</li>
<li>Fabricante: Nome do fabricante do produto</li>
<li>Descrição: Informações extras que não estão presentes no formulário</li>
</ul>

Caso algum dos campos obrigatórios não sejam preenchidos, o próprio formulário indicará o campo vazio e pedirá o usuário o informe. Caso contrário, o produto será adicionado a base de dados e o usuário será rediricionado à listagem dos Produtos.

Caso queira cancelar a ação e retronar a listagem, basta clicar no botão "Cancelar" ao final do formulário.

### Editar
Ao clicar no botão de ação "Editar" de um produto em específico dentro da listagem de Produtos, você será redicionado ao formulário de edição deste produto. Nessa tela, você se deparará com um formulário idêntico ao da tela "Adicionar", porém os valores dos campos estão preenchidos com os atributos daquele respectivo produto. Caso deseje alterar alguma informação, basta modificar os valores nos campos, contudo os campos que são obrigatórios no formulário de "Adicionar" também são obrigatórios aqui.

Ao finalizar a edição, basta clicar no botão "Editar" ao final do formulário. O registro será alterado no banco de dados e o usuário retornará à listagem de Produtos. Caso deseja cancelar a operação, basta clicar no botão "Cancelar" ao final do formulário e você será redirecionado à listagem também.

### Deletar
Caso deseje deletar algum produto em específico, navegue até a listagem de Produtos e clique na ação de "Deletar" do registro do produto que se deseje remover. Quando clicar no botão, uma caixa de alerta aparecerá no canto superior da tela pedindo para confirmar a ação. Caso o usuário confirme, o registro será deletado do banco de dados e a página será recarregada. Caso contrário, o processo é cancelado e o registro não é deletado.

### Visualizar
Para visualizar um produto, acesse a listagem de produtos. Cada registro possuirá um botão de "Visualizar" no seu menu de ações ou um link em seu nome e código. Clicando em uma dessas opções, você será encaminhado para um formulário idêntico ao da tela de "Editar", porém os campos serão apenas para visualização, não permitindo a alteração de seus valores. Após visualizar o formulário, o usuário pode clicar no botão "Retornar" para voltar até a listagem.
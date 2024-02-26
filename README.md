
README - Projeto Transforme-se

Descrição do Projeto
  Este projeto foi desenvolvido como parte do curso de Desenvolvedor de Sistemas oferecido pelo programa TRANSFORME-SE da Serasa Experian. A motivação por trás da criação do site "Transforme-se" surgiu a partir de experiências vividas durante um estágio anterior, onde foi evidenciada a carência de informações sobre a violência contra a mulher. O objetivo principal    é fornecer informações detalhadas sobre os diferentes tipos de violência doméstica, seus impactos e as opções disponíveis para buscar ajuda. A plataforma busca preencher essa lacuna de desinformação, disponibilizando recursos valiosos para quem enfrenta ou deseja entender melhor essa problemática.

- Pré-requisitos
  Antes de começar, certifique-se de ter o XAMPP instalado em sua máquina. XAMPP é uma distribuição fácil de instalar que inclui o Apache, MySQL, PHP e Perl.

- Configuração do Ambiente
  Clone o Repositório:
  git clone https://github.com/seu-usuario/seu-repositorio.git

- Mova o Código Fonte:
  Mova todo o conteúdo do repositório para o diretório htdocs do seu XAMPP. Isso geralmente está localizado em C:\xampp\htdocs no Windows ou /Applications/XAMPP/htdocs no macOS.

- Configuração do Banco de Dados
  Inicie o XAMPP:
  Inicie o painel de controle do XAMPP e inicie os serviços Apache e MySQL.

- Acesse o phpMyAdmin:
  Abra seu navegador e vá para http://localhost/phpmyadmin.

- Crie um Banco de Dados:
  Clique em "Banco de Dados" no menu superior.
  Insira o nome do banco de dados, por exemplo, transforme_se_db.
  Selecione utf8_general_ci como conjunto de caracteres e collation.
  Clique em "Criar".
  Importe a Estrutura do Banco de Dados:

No phpMyAdmin, vá para o banco de dados recém-criado.
Clique em "Importar" e selecione o arquivo SQL disponível em database/estrutura.sql no código fonte do seu site.
Clique em "Executar".
Configuração do Site
Configuração do Banco de Dados:
Abra o arquivo config/config.php e atualize as configurações do banco de dados com suas credenciais.

define('DB_HOST', 'localhost');
define('DB_USER', 'seu_usuario');
define('DB_PASSWORD', 'sua_senha');
define('DB_NAME', 'transforme_se_db');
Acesso ao Site:
Abra seu navegador e vá para http://localhost/seu-repositorio.

Problemas Comuns
Se você encontrar problemas com as permissões, certifique-se de que o Apache tem permissão para acessar os arquivos no diretório htdocs.

Certifique-se de que os serviços Apache e MySQL estão em execução no painel de controle do XAMPP.

Contribuições
Contribuições são bem-vindas! Se você encontrar problemas ou tiver sugestões de melhorias, por favor, abra uma issue ou envie um pull request.

Aproveite o uso do Projeto Transforme-se!


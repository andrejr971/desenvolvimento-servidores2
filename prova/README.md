# PROVA PHP

## ATIVIDA FINAL
---
<br />
1 - DESCREVA RESUMIDAMENTE QUAIS SÃO OS 4 PILARES DA PROGRAMAÇÃO ORIENTADA A OBJETOS.
  - ABSTRAÇÃO: Representa entidades e conceitos abstratos. Ela não é instanciada.
  - ENCAPSULAMENTO:  Encapsula dados da aplicação para não serem acessados. 
 - HERANÇA: Possibilita que as classes compartilhem seus atributos e métodos entre si.
 - POLIMORFISMO: Possibilita que os mesmos atributos e objetos possam ser utilizados em objetos distintos.

2 - QUAL A DIFERENÇA ENTRE CARACTERÍSTICAS, MÉTODOS, ATRIBUTOS E AÇÕES ?
  - CARACTERISTICAS são os nomes e a visibilidade: public, private e protected; 
  - MÉTODOS são as ações; 
  - ATRIBUTOS são as propriedades de um  objeto, as variáveis;
  - AÇÕES: são as ações que o método pode realizar;

3 - CITE AS 3 DIRETIVAS DE VISIBILIDADE DOS ATRIBUTOS E MÉTODOS E QUAIS SUAS DIFERENÇAS.
  - PRIVATE: somente a própria classe pode acessá-la; 
  - PROTECTED: além da própria classe as classes que herdam (classes filhas) dela podem acessar;
  - PUBLIC: pode ser acessada por qualquer classe.

4 - QUAL A FINALIDADE DE USAR MÉTODOS ABSTRATOS ?
 - Criar uma base para serem usadas nas classes derivadas

<br />

## REQUISITOS
---
<br />
ATIVIDADE PRÁTICA !

- CONSTRUIR UMA API PARA GERENCIAMENTO DE ESTOQUE USANDO AS CLASSES QUE FORAM DESENVOLVIDAS DURANTE A MATÉRIA (Conexão e Crud).
- [x] PERSISTINDO OS DADOS EM UM SGBD (banco de dados) MYSQL.
- [x] UTILIZAR O VERBO GET PARA CONSULTAR OS DADOS DA TABELA "movimentacao_estoque"
- [x] UTILIZAR O VERBO POST PARA INCLUIR UM PRODUTO NOVO NA TABELA "estoque"
- [x] UTILIZAR O VERBO PUT PARA MOVIMENTAR O ESTOQUE (ENTRADA OU SAIDA)
    * ATUALIZAR A QUANTIDADE NA TABELA "estoque"
    * GRAVAR UM LOG NA TABELA "movimentacao_estoque"


<br />

## BANCO
---
<br />

CREATE DATABASE `prova`;

use prova;

CREATE TABLE `movimentacao_estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `saldo_antes` decimal(15,3) DEFAULT NULL,
  `saldo_depois` decimal(15,3) DEFAULT NULL,
  `qtde` decimal(15,3) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `saldo_atual` decimal(15,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1; 
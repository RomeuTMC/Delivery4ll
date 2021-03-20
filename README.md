# Delivery4ll
Sistema de Delivery para todos os tipos de produtos, com ênfase em produtos específicos para presentes. Um dos grandes problemas nos aplicativos atuais de delivery é que são baseados na geolocalização do usuário, e não possuírem uma forma específica para entrega de itens embrulhados para presente, e com opções de um cartão de mensagem personalizado.
No **Delivery4ll** o diferencial dos concorrentes é justamente as opções disponibilizadas para embalar um determinado produto para presente, e acompanhar o produto de uma mensagem ou cartão impresso ou virtual com uma mensagem personalizada. Além de permitir que uma entrega de presente seja realizada, ou seja, diferente das lojas virtuais tradicionais, quando o cliente escolhe a opção presente, o produto é despachado acompanhado de uma nota-fiscal própria sem valor do item adquirido.
Baseado em um sistema de delivery tradicional, possui todos os requisitos tradicionais como vistos adiante.
## Requisitos
O sistema é dividido em 4 módulos específicos, sendo, administrativo, lojista, entregador e cliente, cada qual com as funcionalidades descriminadas abaixo
### Administrativo
Módulo responsável pelo controle geral do software, onde é possível realizar qualquer operação de mediação, cadastro e edição de qualquer conteúdo dos demais módulos, além de ser através dele que todas as operações de funcionamento dos demais aplicativos são configuradas.
São funcionalidades encontradas a manutenção dos administradores do sistema e permissões de acesso, moderação de avaliações e de comentários de todo o sistema, moderação e controle de acesso (bloqueio) de clientes, lojistas e entregadores. Liberação de uso da API para outros desenvolvedores, cadastro de lojas para acesso ao sistema (parceiros), disponibilização e controle de meios de pagamento, checagem e moderação de pedidos, entre outros cadastros e relatórios de funcionamento e estatísticos.
### Lojista
Neste módulo, todas as operações de uma determinada loja são realizadas, é o módulo que fica ativo sempre nos lojistas para a captura de pedidos novos e atualizações da operação daquela loja. São módulos primariamente realizados pelo sistema do parceiro, e que também podem ser feitos pelo sistema do administrador.
Cadastro de produtos e de detalhes do produto e prazos de entrega, cadastro dos dados da loja específica como horário de funcionamento, abertura em feriados, disponibilidade de entrega, formas de pagamento aceitas, cadastro de funcionários e permissões de acesso, cadastro de áreas de entrega e formas de entrega aceitas, requisições de suporte e moderações de conteúdo, além de avaliação dos clientes e entregadores e emissão e controle dos pedidos para a loja.
### Entegador
É o módulo que fica ativo na equipe de entrega para realizar o rastreamento das entregas e também para os lojistas e clientes acompanharem os entregadores próprios ou compartilhados.
Nele é possível aos entregadores e aos administradores fazerem o cadastro de horários de disponibilidade, emitir ao sistema as geolocalizações de cada entregador, avaliar os clientes e os lojistas pela entrega, cadastrar os tipos de veículo que ele opera e qual esta disponível no momento, atualizar sua documentação e controlar suas viagens realizadas pelo app. Também é possível escolher áreas de entrega que ele atua e demais detalhes sobre sua própria atuação.
### Cliente
É o módulo responsável pela vitrine de produtos e pelo processamento dos pedidos, e também a área central do dos módulos, sendo o ponto de entrada do sistema.
Nele é disponibilizado a vitrine de lojas, e de produtos de cada loja, é possível aos consumidores escolherem e adquirirem o produto de um lojista e definir a forma de pagamento, permite avaliar os entregadores e os lojistas, além de realizar todo o rastreamento de sua encomenda, seja pela modalidade presente seja pela modalidade consumo.

## Contribuindo com o projeto
Leia como contribuir no nosso [Guia de Contribuição](./.github/contributing.md) 

## Obtendo Suporte
Leia como receber ajuda, suporte e solicitar funcionalidade no [Guia de Ajuda e Suporte](./.github/SUPPORT.md)

## Código de Conduta
Conheça nosso [Código de Conduta](./.github/CODE_OF_CONDUCT.md) para entender o fluxo de trabalho e politicas de novas funcionalidades e requisições de funcionalidades.

## Politica de Segurança e Privacidade
Leia nossa [Politica de Segurança e Privacidade](./.github/SECURITY.md) para saber como lidamos com seus dados, com o report de bugs e falhas de segurança.

# O Que Está Sendo Feito
Acompanhe o andamento do projeto e o escopo de cada funcionalidade nas nossas [Issues](./issues) do Git Hub, utilize essa ferramenta também para solicitar novas funcionalidades e ferramentas.

# Manual e Wiki
Acompanhe no [Wiki](./wiki) o nosso manual, tutoriais, instalação e outros detalhes de ajuda na instalação, configuração e utilização

# Outros Detalhes
Leia assuntos relacionados a este e outros projetos coligados, conheça a equipe de desenvolvedores do projeto no nosso link de [OUTROS ASSUNTOS](./.github/OTHER.md).
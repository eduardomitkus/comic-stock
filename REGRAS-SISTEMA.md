# Requisitos e regras do sistema

## CRUD de produtos 
- Produtos do tipo Comics

## [SYSTEM] Add produto ao estoque
- Para cada adição foi criado logs que serve como movimentação do produto

## [SYSTEM] Baixa em produto do estoque
- Para cada baixa foi criado logs de movimentação

## [API] para add produtos ao estoque
- É possível adicionar mais de um produtos por vez

## [API] para add produtos ao estoque
- É possível remover do estoque mais de um produtos por vez

## Relatório de movimentações
- em /movimentacoes é listado todas as datas que ocorreram movimentações de adição e remoção do estoque

- em /relatorio é visualizado os produtos em estoque e os removidos que fazem parte da data escolhida

- em movimentacoes/estoque e movimentacoes/baixa é listado os produtos conforme as situaçẽos

- A informação do produto adicionado/removido pela API ou pelo Sistema está visível em movimentacoes/estoque e movimentacoes/baixa

- O aviso de estoque baixo está contido em /estoque. O aviso é gerado quando a quantidade de produtos em estoque for menor que 5 pois não foi possível realizar carga de dados.

## Login
- Não foi possível fazer à tempo

## Testes unitários
- Não foi possível fazer à tempo

## Validações
- Todas feitas

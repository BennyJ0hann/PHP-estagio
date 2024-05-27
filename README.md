# PHP-estagio
Neste repositório estão os estudos e projetos feitos a título de aprendizado e estudo em PHP no estágio do CRO (Conselho Regional de Odontoligia).

## Visão Geral
Diretorios existentes e o que contém:

Projeto 1 - ConsultaSalário: Programa feito para consultar através das horas trabalhadas e remuneradas o salário e quanto é descontado em Imposto de Renda, INSS e Sindicato;

Projeto 1 - CadastroDeVeículos: Programa feito para cadastrar veículos dizendo o modelo do carro, frabricante, cor do veículo, a quantidade de portas e o ano do carro. De pois de inseridos estão feitas alguns exemplos de consultas como: Modelo e ano dos carros cadastrados, Modelos na cor prata, Veículos-Cores-quantidadeDePortas, Veículos da Ford e Veículos com o ano de fabricação igual ou superior a 2013.

## Pré-requisitos

Primeiro, baixe os pacotes da sua distribuição, no exemplo será no ubuntu 22.04

```bash
sudo apt-get update 
```

Em seguida, atualize seus pacotes

```bash
sudo apt-get upgrade
```

Instale pacotes para usar um repositório HTTPS

```bash
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```


Instale o Apache 2

```bash
sudo apt install apache2
```

- Verifique seu servidor web

```bash
sudo systemctl status apache2
```
- Inicie um servidor

```bash
sudo systemctl start apache2
```
- Crie um diretório para seu dominio

```bash
sudo mkdir /var/www/html/your_domain
```
- Use your_domain/Projeto_name/nome_do_projeto.php no navegador

Após isso, clone o projeto para um diretório

```bash
git clone git@github.com:BennyJ0hann/PHP-estagio.git
```


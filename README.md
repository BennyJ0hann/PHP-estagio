# PHP-estagio
Neste repositório estão os estudos e projetos feitos a título de aprendizado e estudo em PHP no estágio do CRO (Conselho Regional de Odontoligia).

## Visão Geral
Diretorios existentes e o que contém:

Projeto 1 - ConsultaSalário: Programa feito para consultar através das horas trabalhadas e remuneradas o salário e quanto é descontado em Imposto de Renda, INSS e Sindicato;

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
sudo mkdir /var/www/your_domain
```

Após isso, clone o projeto para um diretório

```bash
git clone git@github.com:BennyJ0hann/PHP-estagio.git
```


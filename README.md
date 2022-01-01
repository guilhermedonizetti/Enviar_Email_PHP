<h1 align="center">
  Enviar E-mail - PHP
</h1>
<p align="center">Programa para envio de e-mails com PHP.<br><b>Status:</b> Feito :computer: :heavy_check_mark:</p>

<b>Objetivo:</b> a ideia é criar uma interface Web para realizar envio de e-mails baseado no servidor SMTP do Gmail. O programa não possui uma aplicação específica, mas através do código desenvolvido poderia ser reutilizado em outros cenários para fins mais específicos.

O programa utiliza AJAX para fazer a comunicação dos dados do e-mail com o PHP, que vai executar o envio do correio eletrônico. E para funcionar corretamente, nenhuma configuração precisa ser feita, apenas o PHPMailer deverá ser incluído na pasta do programa. Use o comando abaixo:
```php
composer require phpmailer/phpmailer
```
 A única adaptação a ser feita no código é a informação de uma conta de Gmail com a sua senha. Se esses valores não forem informados ou forem informados incorretamente, não será efetuado o envio da mensagem. Portanto preste muita atenção a esse trecho do código:
 ```php
$mail->Username   = 'mail@gmail.com'; //email host
$mail->Password   = 'senha'; //senha do email host
 ```
 
 É importante lembrar que a conta Gmail informada precisa estar configurada para aceitar conexão com apps menos seguros. Por não ser o recomendado, vale a pena criar uma conta específica para isso!
 
 <br>
 
 <p align="center">
 <b>PHP, AJAX, SMTP.</b><br>
 Guilherme Donizetti.
 </p>

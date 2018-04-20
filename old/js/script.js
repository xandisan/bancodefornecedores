jQuery(function($){

   /*MASCARAS PARA O FORMULARIO*/	
   $("#telefone").mask("(999) 99999-9999");
   $("#senha").mask("******", {placeholder:""});
   $("#hora").mask("99:99");
   $("#data").mask("99/99/9999");
   $("#email").mask("aaaaaaaa & aaaa?aaaa");
   $("#cpf").mask("999.999.999-99", {reverse: true});
   $("#cep").mask("99999-999");
   $("#rg").mask("9.999.999"); 
   $("#cnpj").mask("99.999.999/9999-99");
   $("#placa").mask("aaa - 9999");
   $('#money').mask('000.000.000.000.000,00', {reverse: true});


});
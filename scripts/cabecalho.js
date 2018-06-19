hs.graphicsDir = 'scripts/highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
hs.align = 'center';
hs.dimmingOpacity = 0.75;
//hs.flushImgSize = true;
//hs.cacheAjax = false;
//hs.forceAjaxReload = true;


$(document).ready(function() {
	//$("divMain").css("display", "none");
	//$("#divMain").show("toogle",  500 );
	$("#divMain").toggle( "fold",500);


	$(".data").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });

});

$(function() {
    $( "#datepicker" ).datepicker();
  });


function validarCPF(cpf) {  
    cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true;   
}

function retornaDateParaInsert(data){

    var mes = ("0" + (data.getMonth() + 1)).slice(-2);
    var dia = ("0" + data.getDate()).slice(-2);
    var ano = data.getFullYear();
    return (dia + '/' + mes + '/' + ano);  

}


// a e b são objetos Date do JS
function dateDiferencaEmDias(a, b) {
   // Descartando timezone e horário de verão
   var utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
   var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

   return Math.floor((utc2 - utc1) / ( 1000 * 60 * 60 * 24) );
}
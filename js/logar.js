
//Sistema local para validação de usuario, exemplifica uso de script externo
function logar(form){

if( form.nome.value == "betha" && form.senha.value == "sistemas"){
    location = "./principal.html";
} else {
    alert("Dados Incorretos!");
}
}

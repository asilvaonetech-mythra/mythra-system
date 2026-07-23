/*
|--------------------------------------------------------------------------
| MYTHRA CORE
| Navegação dos Núcleos
|--------------------------------------------------------------------------
*/


document.addEventListener(
"DOMContentLoaded",
()=>{


const buttons =
document.querySelectorAll(
".core-action"
);



buttons.forEach(button=>{


button.addEventListener(
"click",
()=>{


const section =
button.dataset.core;



if(!section)
return;



window.location.href =
"/portal/core/" + section;



});


});



});
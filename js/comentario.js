"use strict"

let app = new Vue({
    el: "#vue-template-comentarios",
    data: {
        title: "comentario",
        comentarios: [],
        isLogged: "isLogged",   
     },
     methods: {
        deleteComentario
      }
});

document.addEventListener('DOMContentLoaded',getComentarios);
document.querySelector("#btn-comentario").addEventListener('click', AgregarComentario);



function getComentarios() { 
    let table = document.getElementById("vue-template-comentarios");
    let id = document.querySelector(".idp").id;
    let isLogged = document.querySelector(".isLogged").id; 
    fetch("api/comentarios")
    .then(response => response.json())  
    .then(comentarios => {
        let html = "";
        for (let x=0 ; x < comentarios.length; x++){
            if(comentarios[x].producto_fk == id){
                app.comentarios.push(comentarios[x]);
            }
        }
        table.innerHTML = html;
        app.isLogged = isLogged;
    })
    
    .catch(error => console.log(error));
}

function AgregarComentario() {
    let data = {
        comentario:  document.querySelector("#comentario").value,
        puntaje:  document.querySelector("#puntaje").value,
        id_producto:  document.querySelector("#idp").value,
    }
    console.log(comentario)
    console.log(puntaje)

    fetch("api/comentarios", {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })

     .then(response => {
        getComentarios();
     })
     .catch(error => console.log(error));
}

async function deleteComentario(id) {
    
    try{   
        let response= await fetch("api/eliminar/" + id, {
        'method': 'DELETE'});
        let response2= await response.json();
        getComentarios();
    }
    catch(error){
        console.log(error);
    }
   
}


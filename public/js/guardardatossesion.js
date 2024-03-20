//session storage

var nombre = document.getElementById('nombre').textContent.split(': ')[1];
var apellidos = document.getElementById('apellidos').textContent.split(': ')[1];
var fechaNacimiento = document.getElementById('fecha_nac').textContent.split(': ')[1];
var telefono = document.getElementById('telefono').textContent.split(': ')[1];
var email = document.getElementById('email').textContent.split(': ')[1];
var nif = document.getElementById('nif').textContent.split(': ')[1];


sessionStorage.setItem('nombre', nombre);
sessionStorage.setItem('apellidos', apellidos);
sessionStorage.setItem('fecha_nacimiento', fechaNacimiento);
sessionStorage.setItem('telefono', telefono);
sessionStorage.setItem('email', email);
sessionStorage.setItem('nif', nif);

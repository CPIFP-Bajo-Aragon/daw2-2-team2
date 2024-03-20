//recoger datos de la sesion
var nombre = sessionStorage.getItem('nombre');
var apellidos = sessionStorage.getItem('apellidos');
var fechaNacimiento = sessionStorage.getItem('fecha_nacimiento');
var telefono = sessionStorage.getItem('telefono');
var email = sessionStorage.getItem('emai    l');
var nif = sessionStorage.getItem('nif');

// utilizar los datos de la session en algun formulario que querramos que se llene solo

// if (nombre) {
//     document.getElementById('nombre').value = nombre;
// }
// if (apellidos) {
//     document.getElementById('apellidos').value = apellidos;
// }
// if (fechaNacimiento) {
//     document.getElementById('fecha_nac').value = fechaNacimiento;
// }
// if (telefono) {
//     document.getElementById('telefono').value = telefono;
// }
// if (email) {
//     document.getElementById('email').value = email;
// }
// if (nif) {
//     document.getElementById('nif').value = nif;
// }

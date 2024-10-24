let input_id_hab = document.getElementById('input_id_hab');
let form_del = document.getElementById('form_del');

function borrarHabitacion(id_hab){
    input_id_hab.value = Number(id_hab);
    form_del.action += `/${id_hab}`;
    form_del.submit();
}
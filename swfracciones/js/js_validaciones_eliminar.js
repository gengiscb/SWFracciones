function confirmarEliminacionUsuario(id){
    if(window.confirm("¿Está seguro que desea eliminar este usuario?")){
        window.location ="vistaAlumnos.php?eliminar_Alumno=eliminar&idUsuario="+id+"&obtener_Alumnos=obtener";
        return true;
    }
    else{
        return false;
    }
}

function confirmarEliminacionProfesor(id){
    if(window.confirm("¿Está seguro que desea eliminar este usuario y todo su grupo?")){
        window.location ="vistaProfesores.php?eliminar_profesor=eliminar&idUsuario="+id+"&obtener_profesores=obtener";
        return true;
    }
    else{
        return false;
    }
}

function confirmarEliminacionProfesorProf(id){
    if(window.confirm("¿Está seguro que desea eliminar este usuario y todo su grupo?")){
        window.location ="EditarProfesor.php?eliminar_profesor=eliminarProf&idUsuario="+id+"";
        return true;
    }
    else{
        return false;
    }
}
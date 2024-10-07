<?php
    $html = "";
    if ($_POST["selected"]==13) {
        $html = '
        <option value="" disabled selected>Selecciona una Zona</option>
        <option value="Miraflores">Miraflores</option>
        ';	 
    }
    if ($_POST["selected"]==14) {
        $html = '
        <option value="" disabled selected>Selecciona una Zona</option>
        <option value="Miraflores Sur">Miraflores Sur</option>
        <option value="Santa Barbara">Santa Barbara</option>
        ';	
    }
    if ($_POST["selected"]==20) {
        $html = '
        <option value="" disabled selected>Selecciona una Zona</option>
        <option value="San Antonio">San Antonio</option>
        <option value="Escobar Uria">Escobar Uria</option>
        <option value="Villa Litoral">Villa Litoral</option>
        <option value="Pampahasi">Pampahasi</option>
        <option value="Valle de las Flores">Valle de las Flores</option>
        <option value="Villa Salome">Villa Salome</option>
        <option value="Ciudad del Niño">Ciudad del Niño</option>
        ';	
    }
    if ($_POST["selected"]==24) {
        $html = '
        <option value="" disabled selected>Selecciona una Zona</option>
        <option value="Central">Central</option>
        <option value="Santa Barbara">Santa Barbara</option>
        ';	
    }
    echo $html;	
?>
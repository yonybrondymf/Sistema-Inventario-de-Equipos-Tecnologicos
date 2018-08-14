    <table cellspacing="0" cellpadding="3" style="width: 100%; border: 1px solid;">
        <tbody>
            <tr>
                <td>
                    <img src="/assets/images/usuarios/imagen_femenino.jpg" alt="" style="width: 50px; height: 50px;">
                </td>
                <td>EMPRESA DE TRANSPORTE</td>
                <td><?php echo date("d-m-Y H:i:s");?></td>
            </tr>
        </tbody>
    </table>
    <h2 style="text-align: center;">Reporte de Computadoras</h2>
   
    <table cellspacing="0" cellpadding="3" style="width: 100%; border: 1px solid;">
    <thead>
        <tr>
            <th style="border: 1px solid;">#</th>
            <th style="border: 1px solid;">Codigo</th>
            <th style="border: 1px solid;">Finca</th>
            <th style="border: 1px solid;">Area</th>
            <th style="border: 1px solid;">Procesador</th>
            <th style="border: 1px solid;">Disco Duro</th>
            <th style="border: 1px solid;">Monitor</th>
            <th style="border: 1px solid;">Memoria RAM</th>
            <th style="border: 1px solid;">Serial S.O</th>
            
            <th style="border: 1px solid;">Usuario</th>
            <th style="border: 1px solid;">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($computadoras as $computadora): ?>
            <tr>
                <td style="border: 1px solid;"><?php echo $computadora->id?></td>
                <td style="border: 1px solid;"><?php echo $computadora->codigo?></td>
                <td style="border: 1px solid;"><?php echo $computadora->finca?></td>
                <td style="border: 1px solid;"><?php echo $computadora->area?></td>
                <td style="border: 1px solid;"><?php echo $computadora->velocidad?></td>
                <td style="border: 1px solid;"><?php echo $computadora->disco?></td>
                <td style="border: 1px solid;"><?php echo $computadora->monitor?></td>
                <td style="border: 1px solid;"><?php echo $computadora->memoria?></td>
                
                <td style="border: 1px solid;"><?php echo $computadora->serial_so?></td>
                
                <td style="border: 1px solid;"><?php echo $computadora->nombres?></td>
                
                <td style="border: 1px solid;"><?php echo $computadora->estado == 0 ?"Inactivo":"Activo";?></td>
                

            </tr>
        <?php endforeach ?>
    </tbody>
</table>

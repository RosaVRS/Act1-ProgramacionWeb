<!DOCTYPE html>
<html>
<head>
	<title>Procesamiento de Tarjetas de Datos - Resultados</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Procesamiento de Tarjetas de Datos - Resultados</h1>
    <form method="post" action="resultados.php">
        <label>Confirme la cantidad de Tarjetas:</label>    
        <input type="number" name="cantidad" min="1" required>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cantidad = intval($_POST["cantidad"]);
                if ($cantidad > 0) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Número de cédula de identidad</th>";
                    echo "<th>Nombre del alumno</th>";
                    echo "<th>Nota de matemáticas</th>";
                    echo "<th>Nota de física</th>";
                    echo "<th>Nota de programación</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    for ($i = 1; $i <= $cantidad; $i++) {
                        echo "<tr>";
                        echo "<td><input type='text' name='cedula[]' required></td>";
                        echo "<td><input type='text' name='nombre[]' required></td>";
                        echo "<td><input type='number' name='nota_mat[]' min='0' max='20' required></td>";
                        echo "<td><input type='number' name='nota_fis[]' min='0' max='20' required></td>";
                        echo "<td><input type='number' name='nota_prog[]' min='0' max='20' required></td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<button type='submit'>Calcular Resultados</button>";

                
                } 
                
                else {
                    echo "<p>La cantidad de tarjetas debe ser un número entero positivo.</p>";
                }
            } else {
                echo "<p>Debe enviar el formulario para procesar los datos.</p>";
            }
    
    
	?>
    </form>
</body>
</html>










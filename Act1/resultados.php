<!DOCTYPE html>
<html>
<head>
	<title>Procesamiento de Tarjetas de Datos - Resultados</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Procesamiento de Tarjetas de Datos - Resultados</h1>
    <form method="post" action="procesar.php">
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$cantidad = intval($_POST["cantidad"]);
			if ($cantidad > 0) {
				$cedula = $_POST["cedula"];
				$nombre = $_POST["nombre"];
				$nota_mat = $_POST["nota_mat"];
				$nota_fis = $_POST["nota_fis"];
				$nota_prog = $_POST["nota_prog"];
				$prom_mat = 0;
				$prom_fis = 0;
				$prom_prog = 0;
				$aprov_mat = 0;
				$aprov_fis = 0;
				$aprov_prog = 0;
				$aplaz_mat = 0;
				$aplaz_fis = 0;
				$aplaz_prog = 0;
				$aprov_todas = 0;
				$aprov_una = 0;
				$aprov_dos = 0;
				$max_mat = 0;
				$max_fis = 0;
				$max_prog = 0;
				for ($i = 0; $i < $cantidad; $i++) {
					$promedio = ($nota_mat[$i] + $nota_fis[$i] + $nota_prog[$i]) / 3;
					$prom_mat += $nota_mat[$i];
					$prom_fis += $nota_fis[$i];
					$prom_prog += $nota_prog[$i];
					if ($nota_mat[$i] >= 10) {
						$aprov_mat++;
					} else {
						$aplaz_mat++;
					}
					if ($nota_fis[$i] >= 10) {
						$aprov_fis++;
					} else {
						$aplaz_fis++;
					}
					if ($nota_prog[$i] >= 10) {
						$aprov_prog++;
					} else {
						$aplaz_prog++;
					}
					if ($nota_mat[$i] >= 10 && $nota_fis[$i] >= 10 && $nota_prog[$i] >= 10) {
						$aprov_todas++;
					}
					if (($nota_mat[$i] >= 10 && $nota_fis[$i] < 10 && $nota_prog[$i] < 10) ||
						($nota_mat[$i] < 10 && $nota_fis[$i] >= 10 && $nota_prog[$i] < 10) ||
						($nota_mat[$i] < 10 && $nota_fis[$i] < 10 && $nota_prog[$i] >= 10)) {
						$aprov_una++;
					}
					if (($nota_mat[$i] >= 10 && $nota_fis[$i] >= 10 && $nota_prog[$i] < 10) ||
						($nota_mat[$i] >= 10 && $nota_fis[$i] < 10 && $nota_prog[$i] >= 10) ||
						($nota_mat[$i] < 10 && $nota_fis[$i] >= 10 && $nota_prog[$i] >= 10)) {
						$aprov_dos++;
					}
					if ($nota_mat[$i] > $max_mat) {
						$max_mat = $nota_mat[$i];
					}
					if ($nota_fis[$i] > $max_fis) {
						$max_fis = $nota_fis[$i];
					}
					if ($nota_prog[$i] > $max_prog) {
						$max_prog = $nota_prog[$i];
					}
				}
				$prom_mat /= $cantidad;
				$prom_fis /= $cantidad;
				$prom_prog /= $cantidad;
				echo "<table>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>Materia</th>";
				echo "<th>Promedio</th>";
				echo "<th>Aprobados</th>";
				echo "<th>Aplazados</th>";
				echo "<th>Nota Máxima</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				echo "<tr>";
				echo "<td>Matemáticas</td>";
				echo "<td>" . number_format($prom_mat, 2) . "</td>";
				echo "<td>" . $aprov_mat . "</td>";
				echo "<td>" . $aplaz_mat . "</td>";
				echo "<td>" . $max_mat . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Física</td>";
				echo "<td>" . number_format($prom_fis, 2) . "</td>";
				echo "<td>" . $aprov_fis . "</td>";
				echo "<td>" . $aplaz_fis . "</td>";
				echo "<td>" . $max_fis . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Programación</td>";
				echo "<td>" . number_format($prom_prog, 2) . "</td>";
				echo "<td>" . $aprov_prog . "</td>";
				echo "<td>" . $aplaz_prog . "</td>";
				echo "<td>" . $max_prog . "</td>";
				echo "</tr>";
				echo "</tbody>";
				echo "</table>";
				echo "<p>Alumnos que aprobaron todas las materias: " . $aprov_todas . "</p>";
				echo "<p>Alumnos que aprobaron una sola materia: " . $aprov_una . "</p>";
				echo "<p>Alumnos que aprobaron dos materias: " . $aprov_dos . "</p>";
			} //else {
				//echo "<p>La cantidad de tarjetas debe ser un número entero positivo.</p>";
			//}
		} else {
			echo "<p>Debe enviar el formulario para procesar los datos.</p>";
		}
	?>
</body>
</html>
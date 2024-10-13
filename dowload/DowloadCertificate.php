<?php
    require '../constants/settings.php'; 
    require '../constants/check-login.php';
    require '../constants/db_config.php';

    if (isset($_GET['empid'])) {
        $empid = $_GET['empid'];

        try {
            // Conectamos a la base de datos usando PDO
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparamos la consulta para obtener el certificado en formato binario
            $stmt = $conn->prepare("SELECT certificate FROM tbl_academic_qualification WHERE member_no = :empid");
            $stmt->bindParam(':empid', $empid);
            $stmt->execute();

            // Verificamos si hay resultados
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $certificate = $row['certificate'];

                // Si el certificado está en formato binario
                if ($certificate) {
                    // Definimos el nombre del archivo PDF a descargar
                    $pdfFileName = "certificado_$empid.pdf";

                    // Establecemos los encabezados para la descarga del PDF
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: attachment; filename="' . $pdfFileName . '"');
                    header('Content-Length: ' . strlen($certificate));

                    // Limpiamos el búfer de salida para evitar contenido adicional
                    ob_clean();
                    flush();

                    // Enviamos el contenido binario del certificado al navegador para su descarga
                    echo $certificate;
                    exit; // Detenemos el script después de la descarga
                } else {
                    echo "No se encontró el contenido del certificado.";
                }
            } else {
                echo "No se encontraron certificaciones para el miembro especificado.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        header("location:./");	
    }
?>

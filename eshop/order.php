<?php
include_once "index_top.php";
//var_dump($_POST);
//var_dump($_SESSION['cislo_zakaznika']);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>


<h1>Objednávky</h1>

<?php
$datum = date("Y-m-d");
$zakaznik = $_SESSION['cislo_zakaznika'];
$sql = "SELECT email FROM zakaznik WHERE cislo_zakaznika = $zakaznik";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email = $row['email'];

for($i = 1; $i <= 5; $i++){
    $polozka[$i] = checkDBInput($_POST['polozka' . $i]);
    $pocet[$i]= checkDBInput($_POST['pocet' . $i]);

//var_dump($polozka[$i], $pocet[$i]);        
}

if($polozka[1] && $pocet[1]){
    $sql = "INSERT INTO orders VALUES (NULL, '$datum', '$zakaznik')";
    if (mysqli_query($conn, $sql))
    $show = 1;
    else
    $show = 2;
}
else
$show = 3;
//var_dump($datum, $zakaznik,$sql);

$last_id = mysqli_insert_id($conn);
for($i = 1; $i <= 5; $i++){
    if(!empty($polozka[$i])){
        $sql = "INSERT INTO order_list VALUES (NULL, '$last_id', '$polozka[$i]', '$pocet[$i]')";
        mysqli_query($conn, $sql); 
    }
}

if($polozka[1] && $pocet[1]){
			//Load Composer's autoloader
			require 'vendor/autoload.php';

            $message = '<html>
            <style>
            * {font-family: DejaVu Sans; font-size: 10pt;}
            h1 {font-size: 14pt;}
            td, th {padding: 2px 10px;}
            </style>

            <h1>Detail objednávky</h1>
            <table>
            <thead>
                <tr>
                    <th>Tovar</th>
                    <th>Počet kusov</th>
                    <th>Cena za kus</th>
                </tr>    
            </thead>
            <tbody>';

            $sql = "SELECT * FROM order_list JOIN tovar ON polozka = cislo_tovaru WHERE order_list.order = $last_id ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $message .= '<tr>';
                    $message .= '<td>' . $row['nazov'] . '</td>';
                    $message .= '<td>' . $row['pocet'] . '</td>';
                    $message .= '<td>' . $row['cena'] . '€</td>';
                    $message .= '</tr>';
                }
            }
            $message .= '</tbody></table>';

			$phpmailer = new PHPMailer();
			try {
				
                $phpmailer->isSMTP();
                $phpmailer->Host = 'smtp.mailtrap.io';
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = 2525;
                $phpmailer->Username = '643c1a7ede3943';
                $phpmailer->Password = '5121ce1eddfa3a';
                $phpmailer->CharSet = 'UTF-8';

				//Recipients
				$phpmailer->setFrom('dominikstrunga@centrum.sk', 'Mailer');
				$phpmailer->addAddress($email);               //Name is optional

				//Content
				$phpmailer->isHTML(true);                                  //Set email format to HTML
				$phpmailer->Subject = 'Detail objednávky';
				$phpmailer->Body    = $message;

				$phpmailer->send();
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
        }


header("location: kosik?a=$show.php");

?>
<?php
include_once "index_bottom.php";
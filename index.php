<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
<body>
    <h1>Student Registration Form</h1>
    
    <form method="POST" action="register.php">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required><br><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label><br><br>
        
        <input type="submit" value="Submit">
    </form>
    
 <?php
    $servername = "localhost";
    $username = "kullanici_adi";
    $password = "sifre";
    $dbname = "veritabani_adi";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
    }
    
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    if (empty($full_name) || empty($email) || empty($gender)) {
        echo "Lütfen tüm alanları doldurun.";
    } else {
    

        $sql = "INSERT INTO students (full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Öğrenci kaydedildi.";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
    ?>
    
</body>
</html>

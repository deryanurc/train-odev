<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "train_booking";

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mevcut tüm verileri temizleme
$conn->query("TRUNCATE TABLE journeys");

$from_cities = ["Adana", "Izmir", "Ankara", "Istanbul", "Bursa", "Antalya", "Kayseri", "Konya", "Samsun", "Niğde", "Mersin"
, "Gaziantep", "Malatya", "Erzurum", "Van", "Nevşehir", "Yozgat", "Kayseri", "Bolu", "Çorum", "Amasya", "Çanakkale", "Balıkesir", "Hatay", "Eskişehir"];
$to_cities = ["Mersin", "Istanbul", "Ankara", "Niğde", "Eskişehir", "Zonguldak" , "Ordu", "Konya","Bursa", "Antalya", "Kayseri", "İzmir"];
$start_year = 2024;
$end_year = $start_year + 2;
$price = 30.00; // Başlangıç fiyatı

for ($year = $start_year; $year <= $end_year; $year++) {
    for ($month = 6; $month <= 12; $month++) {
        for ($day = 1; $day <= 31; $day++) {
            if (checkdate($month, $day, $year)) {
                for ($hour = 0; $hour < 24; $hour++) {
                    $date = sprintf("%04d-%02d-%02d %02d:00:00", $year, $month, $day, $hour);
                    foreach ($from_cities as $from_city) {
                        foreach ($to_cities as $to_city) {
                            if ($from_city !== $to_city) {
                                $sql = "INSERT INTO journeys (from_city, to_city, date, time, price) VALUES ('$from_city', '$to_city', '$date', '$hour:00:00', $price)";
                                if (!$conn->query($sql)) {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                $price += 0.50; // Her yolculuk için fiyatı artırma
                            }
                        }
                    }
                }
            }
        }
    }
}

$conn->close();
echo "Veri ekleme ve güncelleme işlemi tamamlandı.";
?>

<?php
// استقبال البيانات من النموذج
$username = $_POST['username'];
$password = $_POST['password'];

// اتصال بقاعدة البيانات MySQL
$servername = "localhost";
$db_username = "اسم المستخدم لقاعدة البيانات";
$db_password = "كلمة المرور لقاعدة البيانات";
$db_name = "اسم قاعدة البيانات";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعداد الاستعلام لإدخال البيانات
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// تنفيذ الاستعلام
if ($stmt->execute()) {
    echo "تم تسجيل الحساب بنجاح!";
} else {
    echo "خطأ أثناء التسجيل: " . $stmt->error;
}

// إغلاق التحضير والاتصال
$stmt->close();
$conn->close();
?>
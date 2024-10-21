<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = isset($_POST['order_id']) ? $_POST['order_id'] : '';
    $status = 'Dikonfirmasi';

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["payment_proof"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["payment_proof"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    if ($_FILES["payment_proof"]["size"] > 500000) {
        echo "Maaf, file Anda terlalu besar.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Maaf, hanya JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak terunggah.";
    } else {
        if (move_uploaded_file($_FILES["payment_proof"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars(basename($_FILES["payment_proof"]["name"])). " telah terunggah.";
        } else {
            echo "Maaf, terjadi kesalahan dalam mengunggah file Anda.";
        }
    }

    $sql = "UPDATE orders SET status = ?, payment_proof = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $status, $target_file, $order_id);

    if ($stmt->execute()) {
        echo "Pesanan berhasil dikonfirmasi.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

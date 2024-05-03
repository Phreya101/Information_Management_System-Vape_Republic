<?php
$conn = new mysqli("localhost", "root", "", "vp_ims");
if ($conn->connect_error) {
    echo "failed" . $conn->connect_error;
}

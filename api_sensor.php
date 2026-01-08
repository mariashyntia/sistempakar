<?php
/**
 * API Endpoint untuk Menerima Data Sensor IoT dari Hardware
 * 
 * Endpoint ini menerima data POST dari perangkat IoT (ESP32/Arduino/Raspberry Pi)
 * dan menyimpannya ke database untuk ditampilkan secara real-time
 * 
 * Cara Penggunaan dari Hardware:
 * POST ke: http://your-server/sistempakar/api_sensor.php
 * Content-Type: application/json
 * 
 * Body JSON:
 * {
 *   "id_jenis": 1,
 *   "cahaya": 8500.50,
 *   "kelembapan_tanah": 65.30,
 *   "suhu": 28.50,
 *   "ph_tanah": 6.20
 * }
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Izinkan akses dari perangkat IoT
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include 'db/koneksi.php';

// Fungsi untuk mengirim response JSON
function sendResponse($success, $message, $data = null)
{
    $response = [
        'success' => $success,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    if ($data !== null) {
        $response['data'] = $data;
    }

    echo json_encode($response);
    exit();
}

// Hanya terima POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    sendResponse(false, 'Method not allowed. Use POST request.');
}

// Ambil data JSON dari request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Validasi JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    sendResponse(false, 'Invalid JSON format: ' . json_last_error_msg());
}

// Validasi field yang diperlukan
$required_fields = ['id_jenis', 'cahaya', 'kelembapan_tanah', 'suhu', 'ph_tanah'];
$missing_fields = [];

foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        $missing_fields[] = $field;
    }
}

if (!empty($missing_fields)) {
    http_response_code(400);
    sendResponse(false, 'Missing required fields: ' . implode(', ', $missing_fields));
}

// Sanitasi dan validasi data
$id_jenis = intval($data['id_jenis']);
$cahaya = floatval($data['cahaya']);
$kelembapan = floatval($data['kelembapan_tanah']);
$suhu = floatval($data['suhu']);
$ph = floatval($data['ph_tanah']);

// Validasi range nilai
$errors = [];

if ($id_jenis < 1 || $id_jenis > 3) {
    $errors[] = 'id_jenis must be 1 (Tomat), 2 (Sawi), or 3 (Selada)';
}

if ($cahaya < 0 || $cahaya > 100000) {
    $errors[] = 'cahaya must be between 0 and 100000 Lux';
}

if ($kelembapan < 0 || $kelembapan > 100) {
    $errors[] = 'kelembapan_tanah must be between 0 and 100%';
}

if ($suhu < -50 || $suhu > 100) {
    $errors[] = 'suhu must be between -50 and 100°C';
}

if ($ph < 0 || $ph > 14) {
    $errors[] = 'ph_tanah must be between 0 and 14';
}

if (!empty($errors)) {
    http_response_code(400);
    sendResponse(false, 'Validation errors', ['errors' => $errors]);
}

// Cek apakah jenis sayuran valid
$check_jenis = mysqli_query($koneksi, "SELECT nama_jenis FROM jenis_sayuran WHERE id_jenis = $id_jenis");
if (mysqli_num_rows($check_jenis) === 0) {
    http_response_code(404);
    sendResponse(false, 'Jenis sayuran not found');
}

$nama_jenis = mysqli_fetch_assoc($check_jenis)['nama_jenis'];

// Insert data ke database
$query = "INSERT INTO sensor_iot (id_jenis, cahaya, kelembapan_tanah, suhu, ph_tanah) 
          VALUES ($id_jenis, $cahaya, $kelembapan, $suhu, $ph)";

if (mysqli_query($koneksi, $query)) {
    $inserted_id = mysqli_insert_id($koneksi);

    http_response_code(201);
    sendResponse(true, 'Sensor data saved successfully', [
        'id_sensor' => $inserted_id,
        'jenis_sayuran' => $nama_jenis,
        'sensor_values' => [
            'cahaya' => $cahaya . ' Lux',
            'kelembapan_tanah' => $kelembapan . '%',
            'suhu' => $suhu . '°C',
            'ph_tanah' => $ph
        ]
    ]);
} else {
    http_response_code(500);
    sendResponse(false, 'Database error: ' . mysqli_error($koneksi));
}
?>
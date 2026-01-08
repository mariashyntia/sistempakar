/**
 * CONTOH KODE ARDUINO/ESP32 UNTUK MENGIRIM DATA SENSOR
 * 
 * Hardware yang dibutuhkan:
 * - ESP32 / ESP8266 / Arduino + WiFi Shield
 * - Sensor DHT22 (Suhu & Kelembapan)
 * - Sensor Cahaya (LDR / BH1750)
 * - Sensor pH Tanah
 * - Sensor Kelembapan Tanah
 */

#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

// WiFi Credentials
const char* ssid = "NAMA_WIFI_ANDA";
const char* password = "PASSWORD_WIFI_ANDA";

// Server URL (ganti dengan IP server Anda)
const char* serverUrl = "http://192.168.1.100/sistempakar/api_sensor.php";

// Pin Sensor (sesuaikan dengan hardware Anda)
#define PIN_CAHAYA 34      // Sensor cahaya (analog)
#define PIN_KELEMBAPAN 35  // Sensor kelembapan tanah (analog)
#define PIN_SUHU 4         // DHT22 sensor
#define PIN_PH 32          // Sensor pH (analog)

// ID Jenis Tanaman (1=Tomat, 2=Sawi, 3=Selada)
int id_jenis = 1; // Ubah sesuai tanaman yang dipantau

void setup() {
  Serial.begin(115200);
  
  // Koneksi WiFi
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  
  Serial.println("\nWiFi Connected!");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  // Baca sensor (contoh nilai, ganti dengan pembacaan sensor asli)
  float cahaya = bacaSensorCahaya();
  float kelembapan = bacaSensorKelembapan();
  float suhu = bacaSensorSuhu();
  float ph = bacaSensorPH();
  
  // Tampilkan di Serial Monitor
  Serial.println("\n=== Data Sensor ===");
  Serial.print("Cahaya: "); Serial.print(cahaya); Serial.println(" Lux");
  Serial.print("Kelembapan: "); Serial.print(kelembapan); Serial.println(" %");
  Serial.print("Suhu: "); Serial.print(suhu); Serial.println(" °C");
  Serial.print("pH: "); Serial.println(ph);
  
  // Kirim data ke server
  kirimDataKeServer(id_jenis, cahaya, kelembapan, suhu, ph);
  
  // Tunggu 5 menit sebelum kirim data lagi
  delay(300000); // 5 menit = 300000 ms
}

// Fungsi untuk membaca sensor cahaya
float bacaSensorCahaya() {
  int nilaiAnalog = analogRead(PIN_CAHAYA);
  // Konversi ke Lux (sesuaikan dengan kalibrasi sensor Anda)
  float lux = map(nilaiAnalog, 0, 4095, 0, 10000);
  return lux;
}

// Fungsi untuk membaca sensor kelembapan tanah
float bacaSensorKelembapan() {
  int nilaiAnalog = analogRead(PIN_KELEMBAPAN);
  // Konversi ke persen (sesuaikan dengan kalibrasi sensor Anda)
  float persen = map(nilaiAnalog, 0, 4095, 0, 100);
  return persen;
}

// Fungsi untuk membaca sensor suhu (DHT22)
float bacaSensorSuhu() {
  // Contoh: gunakan library DHT
  // return dht.readTemperature();
  
  // Untuk testing, return nilai random
  return random(20, 35);
}

// Fungsi untuk membaca sensor pH
float bacaSensorPH() {
  int nilaiAnalog = analogRead(PIN_PH);
  // Konversi ke pH (sesuaikan dengan kalibrasi sensor Anda)
  float ph = map(nilaiAnalog, 0, 4095, 0, 14);
  return ph / 10.0; // Sesuaikan dengan sensor Anda
}

// Fungsi untuk mengirim data ke server
void kirimDataKeServer(int id_jenis, float cahaya, float kelembapan, float suhu, float ph) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    
    // Mulai koneksi HTTP
    http.begin(serverUrl);
    http.addHeader("Content-Type", "application/json");
    
    // Buat JSON payload
    StaticJsonDocument<200> doc;
    doc["id_jenis"] = id_jenis;
    doc["cahaya"] = cahaya;
    doc["kelembapan_tanah"] = kelembapan;
    doc["suhu"] = suhu;
    doc["ph_tanah"] = ph;
    
    String jsonString;
    serializeJson(doc, jsonString);
    
    // Kirim POST request
    Serial.println("\nMengirim data ke server...");
    int httpResponseCode = http.POST(jsonString);
    
    // Cek response
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.print("Response code: ");
      Serial.println(httpResponseCode);
      Serial.print("Response: ");
      Serial.println(response);
      
      if (httpResponseCode == 201) {
        Serial.println("✅ Data berhasil dikirim!");
      }
    } else {
      Serial.print("❌ Error: ");
      Serial.println(httpResponseCode);
    }
    
    http.end();
  } else {
    Serial.println("❌ WiFi tidak terhubung!");
  }
}

/**
 * CARA INSTALL LIBRARY:
 * 
 * 1. Buka Arduino IDE
 * 2. Tools > Manage Libraries
 * 3. Install library berikut:
 *    - ArduinoJson by Benoit Blanchon
 *    - DHT sensor library (jika pakai DHT22)
 *    - HTTPClient (biasanya sudah built-in di ESP32)
 * 
 * CARA UPLOAD:
 * 
 * 1. Hubungkan ESP32 ke komputer via USB
 * 2. Tools > Board > ESP32 Dev Module
 * 3. Tools > Port > Pilih port COM ESP32
 * 4. Klik tombol Upload
 * 5. Buka Serial Monitor (115200 baud) untuk lihat output
 * 
 * TESTING:
 * 
 * 1. Pastikan server XAMPP sudah running
 * 2. Pastikan ESP32 dan komputer server dalam jaringan WiFi yang sama
 * 3. Ganti IP address di variabel serverUrl dengan IP komputer server
 * 4. Upload kode ke ESP32
 * 5. Lihat Serial Monitor untuk memastikan data terkirim
 * 6. Buka website sistem pakar → pilih sayuran → data sensor akan muncul otomatis
 */

# Halaman Web Admin Sederhana

## Deskripsi
Ini adalah proyek halaman web admin sederhana di mana **User** dan **Admin** memiliki akses yang berbeda.

- **User** dapat melakukan registrasi dan login.
- **Admin** memiliki hak akses lebih untuk mengedit dan menghapus user.

## Fitur Utama
1. **Login User** → User dapat login menggunakan **Username dan Password** setelah registrasi.
2. **Register User** → User dapat membuat akun baru.
3. **Login Admin** → Admin memiliki hak istimewa untuk **mengedit dan menghapus user**.

## Alur Pengguna
### **Alur User:**
![image](https://github.com/user-attachments/assets/f1a3d8cc-a3f6-44a9-81ce-344713961a47)

1. User membuka halaman login.
2. Jika belum memiliki akun, user dapat melakukan registrasi.
3. Setelah registrasi berhasil, user bisa login menggunakan akun yang dibuat.
4. Setelah login, user akan diarahkan ke **dashboard user**.
5. User hanya bisa melihat informasi yang tersedia tanpa bisa mengedit data lain.

### **Alur Admin:**
![image](https://github.com/user-attachments/assets/d0ab6335-21f2-419e-ac93-a4fc9fbd7ac9)
1. Admin membuka halaman login khusus admin.
2. Admin memasukkan **username dan password**.
3. Setelah login berhasil, admin akan diarahkan ke **dashboard admin**.
4. Admin memiliki fitur tambahan untuk:
   - **Melihat daftar user**.
   - **Mengedit informasi user**.
   - **Menghapus user jika diperlukan**.

## Teknologi yang Digunakan
- **HTML & CSS** → Untuk tampilan antarmuka.
- **PHP & MySQL** → Untuk backend dan penyimpanan data user.

## Cara Menjalankan Proyek
1. Clone repository ini:
   ```bash
   git clone https://github.com/xxxTectationxxx/task_pertama.git
   ```
2. Masuk ke direktori proyek:
   ```bash
   cd task_pertama
   ```
3. Jika menggunakan **XAMPP (Windows)**, pindahkan folder proyek ke dalam direktori:
   ```
   C:\xampp\htdocs\
   ```
4. Jika menggunakan **MariaDB (Linux)**, pindahkan ke:
   ```bash
   /var/www/html/
   ```
5. Jalankan server lokal (XAMPP/Laragon/Apache2) dan buat database.
6. Import file **database.sql** ke dalam MySQL/MariaDB.
7. **Ubah konfigurasi database** dengan mengedit file `db.php` sesuai dengan username dan password MySQL/MariaDB.

   Contoh isi file **db.php**:
   ```php
   <?php
   $host = "localhost";
   $user = "root";
   $pass = "";  // Ganti dengan password MariaDB jika ada
   $dbname = "data_user";

   $conn = new mysqli($host, $user, $pass, $dbname);
   if ($conn->connect_error) {
       die("Koneksi gagal: " . $conn->connect_error);
   }
   ?>
   ``
8.  Untuk menjalankan di browser, gunakan url berikut : 
``http://localhost/task_pertama/``

## Contoh Halaman
Registrasi 
![image](https://github.com/user-attachments/assets/3aff21c8-cc9f-47e3-9d44-7aae0f0c7716)

Login user & Admin
![image](https://github.com/user-attachments/assets/19be35c8-45db-49e2-b22f-158e3a97e3a9)

Dashboard User 
![image](https://github.com/user-attachments/assets/b9ff1e0f-edec-44b3-bab8-d614c23ba98d)

Dashboard Admin
![image](https://github.com/user-attachments/assets/502e944e-75a7-4cce-bc52-95ba4764d5e3)
![image](https://github.com/user-attachments/assets/b9f64bea-8cb4-4fc0-9bf2-bbb62f161668)


---
Dibuat dengan ❤️ oleh [Dewa Agustina]


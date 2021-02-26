# Web-Resto

### Home

![Imgur](https://i.imgur.com/84mK1RN.png)

### Menu

![Imgur](https://i.imgur.com/9yMt4H8.png)

### Gallery

![Imgur](https://i.imgur.com/GO2RPmV.png)

### Kontak

![Imgur](https://i.imgur.com/UjIwN74.png)

## Persyaratan Sistem

```
Versi PHP : 7.
```
```
Database : MySQL (MariaDB)
```
```
Web Server : Apache 2.
```
## Setup

1. Nyalakan web server (Bisa gunakan XAMPP).
2. Ekstrak semua file dalam web-resto.zip ke C:\xampp\htdocs\ (jika menggunakan xampp).
3. Buat database baru, bisa melalui phpMyAdmin (contoh: [http://localhost/phpmyadmin).](http://localhost/phpmyadmin).)
    Buat database dengan nama restodb atau jika menginginkan dengan nama lain dapat di
    ubah pengaturannya di application/config/database.php.
4. Kemudian import struktur database dan isinya ke db yang baru (import file restodb –
    WithData.sql).
    Jika menghendaki database tanpa data silahkan download aplikasinya di
    https://www.github.com/cloudenum/web-resto dan ikuti instruksinya disana.
5. Setelah itu buka [http://localhost/web-resto](http://localhost/web-resto) untuk halaman web
    [http://localhost/web-resto/admin](http://localhost/web-resto/admin) untuk halaman admin.


## Cara Penggunaan

### A. Register akun admin

1. Isi setiap kolom dengan data yang sesuai, kemudian klik Register. Jika sudah selesai
    proses (tidak ada pemberitahuan sukses atau tidak) langsung menuju halaman login.
		
	  ![Imgur](https://i.imgur.com/zIcTvr6.png)

### B. Login admin

1. Buka halaman [http://localhost/web-resto/admin/login](http://localhost/web-resto/admin/login)
2. Kemudian Isi setiap kolom dengan data registrasi sebelumnya.
    Atau gunakan ini (super-user)
    username: **admiral**
    password: **admiral1 23**
		
    ![Imgur](https://i.imgur.com/VwlOERA.png)
		
3. Klik Login
4. Jika berhasil maka akan menuju halaman dashboard


### C. Tambah kategori menu

1. Buka halaman [http://localhost/web-resto/admin/kategori](http://localhost/web-resto/admin/kategori)
2. Isikan semua kolom pada kotak “Tambah Kategori”

    ![Imgur](https://i.imgur.com/SCUxV0m.png)
		
3. Kemudian klik “Submit”
4. Cek pada tabel kategori apakah sudah muncul atau belum
    
	  ![Imgur](https://i.imgur.com/zb7LB7r.png)
		
5. Untuk mengubah klik “Edit”
6. Menghapus klik “Hapus” (PERHATIAN: Data yang sudah dihapus tidak dapat dikembalikan lagi)

### D. Tambah menu makanan atau minuman

1. Buka [http://localhost/web-resto/admin/menu](http://localhost/web-resto/admin/menu)
2. Kemudian pada kotak “Buat menu baru” isi setiap kolom dengan data yang sesuai, kode menu harus berbeda untuk setiap menu dan pastikan sudah menambahkan kategori menu terlebih dahulu
    
	  ![Imgur](https://i.imgur.com/06XuqHz.png)
		
3. Pilih gambar menu/makanan yang akan ditambahkan
4. Kemudian klik “Submit”
5. Cek pada tabel menu di bagian bawah, apakah sudah muncul atau belum.


6. Untuk mengubah klik “Edit” (Scroll ke kanan)
7. Menghapus klik “Hapus” (PERHATIAN: Data yang sudah dihapus tidak dapat
    dikembalikan lagi)
8. Cek dihalaman [http://localhost/web-resto/menu](http://localhost/web-resto/menu)


### E. Tambah gallery

1. Buka [http://localhost/web-resto/admin/tambah_gallery](http://localhost/web-resto/admin/tambah_gallery)
2. Klik pada kotak bertuliskan “Klik atau Drop gambar/video disini” untuk memilih file yang
    akan di-upload (bisa juga drop file)
3. Tunggu hingga proses upload selesai
4. Jika berhasil (Tidak ada pop up berwarna merah), silahkan reload (F5) halaman dan lihat
    pada bagian tabel apakah sudah muncul atau belum. Bisa juga lihat di halaman gallery
    [http://localhost/web-resto/galeri](http://localhost/web-resto/galeri)


### F. Ubah profil restoran

1. Buka halaman [http://localhost/web-resto/admin/profil](http://localhost/web-resto/admin/profil)
2. Buka tab “Edit Data Usaha”
3. Ubah data pada kolom yang sesuai
4. Kemudian klik “Submit”
5. Jika berhasil maka data akan berubah

### G. Ubah lokasi pin pada Google Maps

1. Buka halaman [http://localhost/web-resto/admin/profil](http://localhost/web-resto/admin/profil)
2. Pengaturan ada dibagian bawah
3. Cari lokasi restoran Anda di kolom pencarian. Pastikan restoran sudah terdaftar di
    Google Maps, jika belum silahkan mendaftar terlebih dahulu
4. Klik restoran Anda pada kotak hasil pencarian


5. Lalu akan muncul popup diatas lokasi pin restoran Anda. Didalam Pop Up tersebut
    terdapat “Place ID: xxx” lalu salin (copy) ID tersebut dan salin (paste) di kolom “Google
    Maps Place ID”
6. Kemudian klik “Save”
7. Jika berhasil maka lokasi akan berubah. Cek di [http://localhost/web-resto/kontak](http://localhost/web-resto/kontak)


### H. Mengubah jam buka restoran

1. Buka halaman [http://localhost/web-resto/admin/jam_buka](http://localhost/web-resto/admin/jam_buka)
2. Pilih hari di kolom “Pilih Hari”
3. Kemudian ubah jam buka sesuai keinginan Anda
4. Klik “Edit”
5. Lihat di halaman restoran bagian bawah

### I. Tambahkan link akun media sosial

1. Buka halaman [http://localhost/web-resto/admin/medsos](http://localhost/web-resto/admin/medsos)
2. Klik pada checkbox disamping logo untuk mengaktifkan kolom input


3. Jika Sudah klik “Save”
4. Maka muncul di bagian tabel dibawah

```
Dan akan terlihat di bagian bawah halaman restoran
```

### J. Tambah promo

1. Buka [http://localhost/web-resto/admin/tambahpromo](http://localhost/web-resto/admin/tambahpromo)
2. Isi semua kolom dengan benar (deskripsi dan headline adalah opsional) tambahkan
    gambar untuk promo
3. Lalu kilik “Submit”
4. Buka [http://localhost/web-resto/](http://localhost/web-resto/) dan lihat pada bagian slider akan terlihat promo Anda
5. Atau bisa lihat di halaman daftar promo [http://localhost/web-resto/admin/promo](http://localhost/web-resto/admin/promo)


6. Untuk mengubah klik “Edit”
7. Menghapus klik “Hapus” (PERHATIAN: Data yang sudah dihapus tidak dapat
    dikembalikan lagi)

### K. Testimoni pelanggan

1. Ketika seorang pelanggan mengisi kolom testimoni pada halaman utama
    [http://localhost/web-resto/](http://localhost/web-resto/)

```
Dan klik “Kirim”
```
2. Maka testimoni tersebut tidak akan muncul secara langsung di halaman web melainkan
    harus di setujui terlebih dahulu oleh admin
3. Buka halaman [http://localhost/web-resto/admin/testimoni](http://localhost/web-resto/admin/testimoni)


4. Terlihat bahwa status masih “pending” artinya belum di respon oleh admin
5. Untuk menyutujui testimoni pelanggan klik tanda panah kebawah lalu klik “Setujui”
    Begitu juga untuk menolak klik “Tolak”
6. Testimoni yang ditolak tidak akan muncul di halaman utama


### L. Daftar akun admin

1. Buka [http://localhost/web-resto/admin/akun](http://localhost/web-resto/admin/akun) (hanya akun super-user)
2. Untuk mengubah klik “Edit” (Scroll ke kanan)
3. Menghapus klik “Hapus” (PERHATIAN: Data yang sudah dihapus tidak dapat
    dikembalikan lagi)

### M. Tambah akun admin

1. Buka [http://localhost/web-resto/admin/tambahakun](http://localhost/web-resto/admin/tambahakun) (hanya akun super-user)
2. Isikan semua kolom dengan benar lalu klik “submit”


### N. Mengubah password dan username

1. Buka [http://localhost/web-resto/admin/editakun](http://localhost/web-resto/admin/editakun)
2. Untuk mengubah username isikan pada kotak username lalu klik “Submit”. Pastikan
    username tidak sama dengan sebelumnya.
3. Untuk mengubah password isikan Password Lama dan Password Baru. Pastikan
    password lama dan baru tidak sama. Lalu klik “Submit”

### O. Pengaturan situs

1. Mengubah Slide pertama dan terakhir pada halaman utama, lalu klik “Submit”

```
Slide Pertama
```

Slide Terakhir

2. Mengubah gambar background testimoni, lalu klik “Submit”
3. Mengubah Google Analytics ID, Google Maps API Key, dan Sendgrid API Key
    Setelah itu klik “Submit”




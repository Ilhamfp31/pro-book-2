# Tugas 2 IF3110 Pengembangan Aplikasi Berbasis Web 

Melakukan *upgrade* Website toko buku online pada Tugas 1 dengan mengaplikasikan **arsitektur web service REST dan SOAP**.

## Tujuan Pembuatan Tugas

* Produce dan Consume REST API
* Produce dan Consume Web Services dengan protokol SOAP
* Membuat web application yang akan memanggil web service secara REST dan SOAP.
* Memanfaatkan web service eksternal (API)

## Anggota Tim
- **Yusuf Rahmat Pratama** - **13516062**
- **Priagung Satyagama** - **13516089**
- **Ilham Firdausi Putra** - **13516140**

## Desain Basis Data
### Pro-Book
Basis data pada aplikasi **Pro-Book** kami terdiri dari 4 Tabel yaitu :
- **access_token**
- **orders**
- **review**
- **user**

#### access_token
**access_token** terdiri dari 5 kolom yaitu :
- **id** : id user yang sedang login
- **token** : string token yang digenerate ketika user login
- **browser** : browser yang digunakan oleh user ketika login
- **ip_address** : ip address dari user ketika login
- **time** : waktu dimana token kadaluarsa

#### orders
**orders** terdiri dari 4 kolom yaitu :
- **id** : primary key
- **bookID** : id buku pada web service buku yang di order
- **userID** : id user yang melakukan order
- **orderID** : id order yang ada pada web service buku

#### review
**review** terdiri dari 4 kolom yaitu :
- **reviewID** : primary key
- **orderID** : id order pada tabel orders dimana review ini ditujukan
- **comment** : komentar user yang telah melakukan review
- **rating** : rating dari user untuk review ini

#### user
**user** terdiri dari 9 kolom yaitu :
- **userID** : primary key
- **name** : nama user
- **username** : nama pengguna user, digunakan untuk login
- **address** : alamat user
- **password** : password user
- **email** : email user
- **phone** : no telepon user
- **userPicture** : foto user
- **no_kartu** : no rekening user

### Web Service Bank
Basis data pada aplikasi **Web Service Bank** kami terdiri dari 2 Tabel yaitu :
- **nasabah**
- **transaksi**

#### nasabah
**nasabah** terdiri dari 5 kolom yaitu :
- **id** : primary key
- **nama** : nama nasabah
- **no_kartu** : no rekening nasabah
- **saldo** : saldo nasabah
- **secret_key** : untuk keperluan TOTP

#### transaksi
**transaksi** terdiri dari 5 kolom yaitu :
- **id** : primary key
- **no_pengirim** : no rekening pengirim
- **no_penerima** : no rekening penerima
- **jumlah** : jumlah uang yang dikirim
- **timestamp** : waktu dilakukannya transaksi

### Web Service Buku
Basis data **Web Service Buku** kami terdiri dari 2 Tabel yaitu :
- **daftar_harga**
- **daftar_penjualan**

#### daftar_harga
**daftar_harga** terdiri dari 2 kolom yaitu :
- **id_buku** : id buku
- **harga** : harga buku

#### daftar_penjualan
**daftar_penjualan** terdiri dari 5 kolom yaitu :
- **id_daftar_penjualan** : primary key
- **id_buku** : id buku yang terjual
- **kategori** : kategori buku yang terjual
- **jumlah** : jumlah buku yang terjual pada satu satu penjualan
- **timestamp** : waktu ketika buku terjual

## Shared Session dengan REST

## Pembangkitan Token dan Expiry Time

## Kelebihan Microservice dibanding Monolitik

## Pembagian Tugas

REST :
1. Validasi nomor kartu : 13516140
2. Transfer : 13516089
3. DB Helper dan Refactoring : 13516062

SOAP :
1. Buy Book : 13516089
2. Get Book By Title : 13516089
3. Get Recommendation : 13516062
4. Get Book By ID : 13516062
5. Web Service Bank Helper : 13516089, 13516062
6. DB Helper : 13516140
7. Google book API helper : 13516140

Perubahan Web app :
1. Halaman Search : 13516089
2. Halaman Review : 13516089
3. Halaman History : 13516062
4. Halaman Book Detail dan Rekomendasi : 13516062
5. Order : 13516062
6. Halaman Profile : 13516140
7. Halaman Register : 13516140
8. Update DB dan Token : 13516140

Bonus :
1. HTOTP : 13516140
2. Google : 13516089


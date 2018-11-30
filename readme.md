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
### Web Service Bank
### Web Service Buku

## Shared Session dengan REST

## Pembangkitan Token dan Expiry Time

## Kelebihan Microservice dibanding Monolitik
- Untuk setiap service nya, kompleksitas dapat berkurang dengan mendekomposisi program menjadi berbagai service sehingga setiap service nya lebih mudah didevelop, dimengerti karena sesuai fungsionalitasnya, dan dimaintain.
- Setiap service dapat dijalankan secara independen sehingga tidak bergantung kepada bagian program lain yang tidak berhubungan.
- Dapat memudahkan dalam menggunakan teknologi/implementasi baru yang berbeda untuk setiap service nya.
- Memudahkan skalabilitas setiap service nya secara independen.
- Kegagalan satu bagian program tertentu tidak mempengaruhi service lain dalam microservice, sedangkan dalam monolitik dapat menggagalkan program lain yang seharusnya tidak berhubungan.

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


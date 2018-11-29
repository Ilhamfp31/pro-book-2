# Tugas 2 IF3110 Pengembangan Aplikasi Berbasis Web 

Melakukan *upgrade* Website toko buku online pada Tugas 1 dengan mengaplikasikan **arsitektur web service REST dan SOAP**.

### Tujuan Pembuatan Tugas

Diharapkan dengan tugas ini anda dapat mengerti:
* Produce dan Consume REST API
* Produce dan Consume Web Services dengan protokol SOAP
* Membuat web application yang akan memanggil web service secara REST dan SOAP.
* Memanfaatkan web service eksternal (API)

## Anggota Tim

Setiap kelompok beranggotakan **3 orang dari kelas yang sama**. Jika jumlah mahasiswa dalam satu kelas modulo 3 menghasilkan 1, maka hanya 1 kelompok terdiri dari 4 mahasiswa. Jika jumlah mahasiswa modulo 3 menghasilkan 2, maka ada dua kelompok yang beranggotakan 4 orang. Seluruh anggota kelompok **harus berbeda dengan tugas 1**.

## Petunjuk Pengerjaan

1. Buatlah organisasi pada gitlab dengan format "IF3110-2018-KXX-nama kelompok", dengan XX adalah nomor kelas.
2. Tambahkan anggota tim pada organisasi anda.
3. Fork pada repository ini dengan organisasi yang telah dibuat.
4. Ubah hak akses repository hasil Fork anda menjadi **private**.
5. [DELIVERABLE] Buat tugas sesuai spesifikasi dan silakan commit pada repository anda (hasil fork). Lakukan berberapa commit dengan pesan yang bermakna, contoh: `add register form`, `fix logout bug`, jangan seperti `final`, `benerin dikit`. Disarankan untuk tidak melakukan commit dengan perubahan yang besar karena akan mempengaruhi penilaian (contoh: hanya melakukan satu commit kemudian dikumpulkan). Sebaiknya commit dilakukan setiap ada penambahan fitur. **Commit dari setiap anggota tim akan mempengaruhi penilaian individu.** Jadi, setiap anggota tim harus melakukan sejumlah commit yang berpengaruh terhadap proses pembuatan aplikasi.
6. Hapus bagian yang tidak perlu dari *readme* ini.
7. [DELIVERABLE] Berikan penjelasan mengenai hal di bawah ini pada bagian **Penjelasan** dari *readme* repository git Anda:
    - Basis data dari sistem yang Anda buat, yaitu basis data aplkasi pro-book, webservice bank, dan webservice buku.
    - Konsep *shared session* dengan menggunakan REST.
    - Mekanisme pembangkitan token dan expiry time pada aplikasi Anda.
    - Kelebihan dan kelemahan dari arsitektur aplikasi tugas ini, dibandingkan dengan aplikasi monolitik (login, CRUD DB, dll jadi dalam satu aplikasi)
8. Pada *readme* terdapat penjelasan mengenai pembagian tugas masing-masing anggota (lihat formatnya pada bagian **pembagian tugas**).
9. Merge request dari repository anda ke repository ini dengan format **Nama kelompok** - **NIM terkecil** - **Nama Lengkap dengan NIM terkecil** sebelum **Jumat, 30 November 2018 pukul 23.59**.

### Deskripsi Tugas
![](temp/architecture.png)

Pada tugas 2, Anda diminta untuk mengembangkan aplikasi toko buku online sederhana yang sudah Anda buat pada tugas 1. Arsitektur aplikasi diubah agar memanfaatkan 2 buah webservice, yaitu webservice bank dan webservice buku. Baik aplikasi maupun kedua webservice, masing-masing memiliki database sendiri. Jangan menggabungkan ketiganya dalam satu database. Anda juga perlu mengubah beberapa hal pada aplikasi pro-book yang sudah Anda buat.

#### Webservice bank

Anda diminta membuat sebuah webservice bank sederhana yang dibangun di atas **node.js**. Webservice bank memiliki database sendiri yang menyimpan informasi nasabah dan informasi transaksi. Informasi nasabah berisi nama, nomor kartu, dan saldo. Informasi transaksi berisi nomor kartu pengirim, nomor kartu penerima, jumlah, dan waktu transaksi. Informasi lain yang menurut Anda dibutuhkan silahkan ditambahkan sendiri. Database webservice bank harus terpisah dari database aplikasi pro-book.

Webservice bank menyediakan service untuk validasi nomor kartu dan transfer. Webservice bank diimplementasikan menggunakan protokol **REST**.
- Service validasi nomor kartu dilakukan dengan memeriksa apakah nomor kartu tersebut ada pada database bank. Jika iya, berarti kartu tersebut valid.
  
- Service transfer menerima input nomor kartu pengirim, penerima, dan jumlah yang ditransfer. Jika saldo mencukupi, maka transfer berhasil dan uang sejumlah tersebut dipindahkan dari pengirim ke penerima. Transaksi tersebut juga dicatat dalam database webservice. Jika saldo tidak mencukupi, maka transaksi ditolak dan tidak dicatat di database.
  
#### Webservice buku

Webservice ini menyediakan daftar buku beserta harganya yang akan digunakan oleh aplikasi pro-book. Webservice buku dibangun di atas **java servlet**. Service yang disediakan webservice ini antara lain adalah pencarian buku, mengambil detail buku, melakukan pembelian, serta memberikan rekomendasi buku sederhana. Webservice ini diimplementasikan menggunakan **JAX-WS dengan protokol SOAP**.

Webservice ini memanfaatkan **Google Books API melalui HttpURLConnection. Tidak diperbolehkan menggunakan Google Books Client Library for Java**. Data-data buku yang dimiliki oleh webservice ini akan mengambil dari Google Books API. Silahkan membaca [dokumentasinya](https://developers.google.com/books/docs/overview) untuk detail lebih lengkap. Data pada Google Books API tidak memiliki harga, maka webservice buku perlu memiliki database sendiri berisi data harga buku-buku yang dijual. Database webservice buku harus terpisah dari database bank dan dari database aplikasi pro-book.

Detail service yang disediakan webservice ini adalah:

- Pencarian buku menerima keyword judul. Keyword ini akan diteruskan ke Google Books API dan mengambil daftar buku yang mengandung keyword tersebut pada judulnya. Hasil tersebut kemudian dikembalikan pada aplikasi setelah diproses. Proses yang dilakukan adalah menghapus data yang tidak dibutuhkan, menambahkan harga buku jika ada di database, dan mengubahnya menjadi format SOAP.

- Pengambilan detail juga mengambil data dari Google Books API, seperti service search. Baik service ini maupun search, informasi yang akan dikembalikan hanya informasi yang dibutuhkan. Jangan lansung melemparkan semua data yang didapatkan dari Google Books API ke aplikasi. Karena pengambilan detail buku menggunakan ID buku, maka ID buku webservice harus mengikuti ID buku Google Books API. Pada service ini, harga buku juga dicantumkan.

- Webservice ini menangani proses pembelian. Service ini menerima masukan id buku yang dibeli, jumlah yang dibeli, serta nomor rekening user yang membeli buku. Nomor rekening tersebut akan digunakan untuk mentransfer uang sejumlah harga total buku. Jika transfer gagal, maka pembelian buku juga gagal.

  Jumlah buku yang berhasil dibeli dicatat di database. Webservice menyimpan ID buku, kategori (genre), dan jumlah total pembelian buku tersebut. Data ini akan digunakan untuk memberikan rekomendasi. Jika pembelian gagal maka data tidak dicatat pada aplikasi.

- Webservice juga dapat memberikan rekomendasi sederhana. Input dari webservice ini adalah kategori buku. Kategori buku yang dimasukkan boleh lebih dari 1. Buku yang direkomendasikan adalah buku yang memiliki jumlah pembelian total terbanyak yang memiliki kategori yang sama dengan daftar kategori yang menjadi input. Data tersebut didapat dari service yang mencatat jumlah pembelian.
  
  Jika buku dengan kategori tersebut belum ada yang terjual, maka webservice akan mengembalikan 1 buku random dari hasil pencarian pada Google Books API. Pencarian yang dilakukan adalah buku yang memiliki kategori yang sama dengan salah satu dari kategori yang diberikan (random).
  
#### Perubahan pada aplikasi pro-book

Karena memanfaatkan kedua webservice tersebut, akan ada perubahan pada aplikasi yang Anda buat.

- Setiap user menyimpan informasi nomor kartu yang divalidasi menggunakan webservice bank. Validasi dilakukan ketika melakukan registrasi atau mengubah informasi nomor kartu. Jika nomor kartu tidak valid, registrasi atau update profile gagal dan data tidak berubah.

- Data buku diambil dari webservice buku, sehingga aplikasi tidak menyimpan data buku secara lokal. Setiap kali aplikasi membutuhkan informasi buku, aplikasi akan melakukan request kepada webservice buku. Hal ini termasuk proses search dan melihat detail buku.

  Database webservice cukup menyimpan harga sebagian buku yang ada di Google Books API. Buku yang harganya tidak Anda definisikan di database boleh dicantumkan NOT FOR SALE dan tidak bisa dibeli, tetapi tetap bisa dilihat detailnya.

- Proses pembelian buku pada aplikasi ditangani oleh webservice buku. Status pembelian (berhasil/gagal dan alasannya) dilaporkan kepada user dalam bentuk notifikasi. Untuk kemudahan, tidak perlu ada proses validasi dalam melakukan transfer

- Pada halaman detail buku, terdapat rekomendasi buku yang didapatkan dari webservice buku. Asumsikan sendiri tampilan yang sesuai.

- Halaman search-book dan search-result pada tugas 1 digabung menjadi satu halaman search yang menggunakan AngularJS. Proses pencarian buku diambil dari webservice buku menggunakan **AJAX**. Hasil pencarian akan ditampilkan pada halaman search menggunakan AngularJS, setelah mendapatkan respon dari webservice. Ubah juga tampilan saat melakukan pencarian untuk memberitahu jika aplikasi sedang melakukan pencarian atau tidak ditemukan hasil.

    Berikut adalah komponen pada AngularJS yang harus digunkan pada aplikasi Anda:
    - Data binding (ng-model directives)
    - Controllers (ng-controllers)
    - ng-repeat, untuk menampilkan list

- Aplikasi Anda menggunakan `access token` untuk menentukan active user. Mekanisme pembentukan dan validasi access token dapat dilihat di bagian *Mekanisme access token*.

#### Mekanisme access token
`Access token` berupa string random. Ketika user melakukan login yang valid, sebuah access token di-generate, disimpan dalam database server, dan diberikan kepada browser. Satu `access token` memiliki `expiry time` token (berbeda dengan expiry time cookie) dan hanya dapat digunakan pada 1 *browser/agent* dari 1 *ip address* tempat melakukan login. Sebuah access token mewakilkan tepat 1 user. Sebuah access token dianggap valid jika:
- Access token terdapat pada database server dan dipasangkan dengan seorang user.
- Access token belum expired, yaitu expiry time access token masih lebih besar dari waktu sekarang.
- Access token digunakan oleh browser yang sesuai.
- Access token digunakan dari ip address yang sesuai.

Jika access token tidak ada atau tidak valid, maka aplikasi melakukan *redirect* ke halaman login jika user mengakses halaman selain login atau register. Jika access token ada dan valid, maka user akan di-*redirect* ke halaman search jika mengakses halaman login. Fitur logout akan menghapus access token dari browser dan dari server.

#### Catatan

Hal-hal detail yang disebutkan pada spesifikasi di atas seperti data yang disimpan di database, parameter request, dan jenis service yang disediakan adalah spesifikasi minimum yang harus dipenuhi. Anda boleh menambahkan data/parameter/service lain yang menurut Anda dibutuhkan oleh aplikasi atau web service lainnya. Jika Anda ingin mengubah data/parameter/service yang sudah disebutkan di atas, Anda wajib mempertanggung jawabkannya dan memiliki argumen yang mendukung keputusan tersebut.

### Skenario

1. User melakukan registrasi dengan memasukkan informasi nomor kartu.
2. Jika nomor kartu tidak valid, registrasi ditolak dan user akan diminta memasukkan kembali nomor kartu yang valid.
3. User yang sudah teregistrasi dapat mengganti informasi nomor kartu.
4. Ketika user mengganti nomor kartu, nomor kartu yang baru akan diperiksa validasinya melalui webservice bank.
5. Setelah login, user dapat melakukan pencarian buku.
6. Pencarian buku akan mengirim request ke webservice buku. Halaman ini menggunakan AngularJS.
7. Pada halaman detail buku, ada rekomendasi buku yang didapat dari webservice buku. Rekomendasi buku berdasarkan kategori buku yang sedang dilihat.
8. Ketika user melakukan pemesanan buku, aplikasi akan melakukan request transfer kepada webservice bank.
9. Jika transfer berhasil, aplikasi mengirimkan request kepada webservice buku untuk mencatat penjualan buku.
10. Notifikasi muncul menandakan status pembelian, berhasil atau gagal.

### Bonus

Anda tidak dituntut untuk mengerjakan ini. Fokus terlebih dahulu menyelesaikan semua spesifikasi yang ada sebelum memikirkan bonus.

1. Token bank

    Ketika Anda melakukan transfer online, beberapa bank menyediakan sebuah mesin yang memberikan sebuah angka (token) yang harus dimasukan untuk memvalidasi transfer. Anda akan meniru fitur ini pada webservice bank.
    
    Mekanisme token menggunakan algoritma HOTP atau TOTP, algoritma hash yang digunakan dibebaskan kepada peserta, misalnya SHA1. Token berupa 8 digit angka. Informasi-informasi yang dibutuhkan untuk membangun token ini, seperti shared secret key, disimpan pada database webservice bank. Anda diperbolehkan menggunakan library HOTP/TOTP untuk membentuk token tersebut.
    
    Buatlah juga sebuah script (bebas, mau dalam bentuk PHP, JS, dll.) sebagai pengganti mesin token bank untuk membangun token yang akan digunakan untuk proses transfer.
    
    Setiap permintaan transfer yang berasal (yang memberikan uang) dari nomor kartu tersebut, harus menyertakan token yang valid. Token valid adalah token milik nomor kartu yang bersangkutan yang di-generate melalui alat (request di atas) dan belum expired. Jika transfer tidak menyertakan token yang valid, transfer akan gagal, seperti jika Anda melakukan transfer dengan saldo yang kurang.
    
    Maka, aplikasi pro-book memiliki field tambahan yaitu transfer token, yang terdapat pada halaman book detail saat melakukan order. Token tersebut kemudian diberikan kepada webservice buku, yang kemudian akan digunakan untuk memvalidasi transfer pembelian buku.
    
2. Login via Google
    
    Aplikasi memiliki pilihan untuk login menggunakan akun google, seperti yang sering ditemui pada aplikasi web atau game. Contohnya seperti tombol berikut pada [stack overflow](https://stackoverflow.com/). Informasi yang ditampilkan untuk user yang login dengan akun google diambil dari informasi akun google tersebut.
    
    ![](temp/button_example.png)

### Pembagian Tugas
"Gaji buta dilarang dalam tugas ini. Bila tak mengerti, luangkan waktu belajar lebih banyak. Bila belum juga mengerti, belajarlah bersama-sama kelompokmu. Bila Anda sekelompok bingung, bertanyalah (bukan menyontek) ke teman seangkatanmu. Bila seangkatan bingung, bertanyalah pada asisten manapun."

*Harap semua anggota kelompok mengerjakan SOAP dan REST API kedua-duanya*. Tuliskan pembagian tugas seperti berikut ini.

REST :
1. Validasi nomor kartu : 1351xxxx
2. ...

SOAP :
1. Add Produce : 1351xxxx
2. Fungsionalitas Y : 1351xxxx
3. ...

Perubahan Web app :
1. Halaman Search : 
2. Halaman X :
3. ...

Bonus :
1. Pembangkitan token HTOP/TOTP : 
2. Validasi token : 
3. ...

## About

Asisten IF3110 2018

Audry | Erick | Holy | Kevin J. | Tasya | Veren | Vincent H.

Dosen : Yudistira Dwi Wardhana | Riza Satria Perdana | Muhammad Zuhri Catur Candra


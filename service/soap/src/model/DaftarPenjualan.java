package model;

public class DaftarPenjualan {
    private String id_buku;
    private String kategori;
    private int jumlah;
    private long timestamp;

    public DaftarPenjualan() {
        this.id_buku = "-1";
        this.kategori = "";
        this.jumlah = -1;
        this.timestamp = 0;
    }

    public DaftarPenjualan(String id_buku, String kategori, int jumlah, long timestamp) {
        this.id_buku = id_buku;
        this.kategori = kategori;
        this.jumlah = jumlah;
        this.timestamp = timestamp;
    }

    public String getId_buku() {
        return id_buku;
    }

    public void setId_buku(String id_buku) {
        this.id_buku = id_buku;
    }

    public String getKategori() {
        return kategori;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public int getJumlah() {
        return jumlah;
    }

    public void setJumlah(int jumlah) {
        this.jumlah = jumlah;
    }

    public long getTimestamp() {
        return this.timestamp;
    }

    public void setTimestamp(long timestamp) {
        this.timestamp = timestamp;
    }

    public boolean isValid() {
        return this.jumlah != -1;
    }
}

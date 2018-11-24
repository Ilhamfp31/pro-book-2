package model;

public class DaftarHarga {
  private String id_buku;
  private int harga;

  public DaftarHarga(String id_buku, int harga) {
    this.id_buku = id_buku;
    this.harga = harga;
  }

  public String getId_buku() {
    return id_buku;
  }

  public void setId_buku(String id_buku) {
    this.id_buku = id_buku;
  }

  public int getHarga() {
    return harga;
  }

  public void setHarga(int harga) {
    this.harga = harga;
  }

  public boolean isValid(){
    if (this.harga == -1){
      return false;
    } else {
      return true;
    }
  }
}

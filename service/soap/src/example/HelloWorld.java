package example;
import model.DaftarHarga;
import model.DaftarPenjualan;
import org.json.JSONArray;
import org.json.JSONObject;
import repository.BookRepository;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.xml.ws.Endpoint;

import java.sql.*;
import java.util.ArrayList;
import java.util.Collection;
import java.util.List;
import java.util.Map;

import static service.GoogleBooksApi.getBookByTitle;

@WebService()
public class HelloWorld {
  @WebMethod
  public String sayHelloWorldFrom(String from) {
    String result = "Hello, world, from " + from;
    System.out.println(result);
    return result;
  }

  public static void main(String[] argv) {

      // test getBookByTitle
//    ArrayList<Map<String,String>> testGetBookByTitle = getBookByTitle("kue");
//    System.out.println("\n\n Test balikan, Judul:" + testGetBookByTitle.get(0).get("title"));

    // test BookRepository
    DaftarHarga dummyDaftarHarga1 = new DaftarHarga("napeDwAAQBAJ", 130000);
    DaftarPenjualan dummyDaftarPejualan1 = new DaftarPenjualan("napeDwAAQBAJ", "Cooking", 3); // test daftar baru
    DaftarPenjualan dummyDaftarPejualan2 = new DaftarPenjualan("Xl9nDwAAQBAJ", "Cooking", 1); // test daftar yang sudah ada
    BookRepository testBookRepository = new BookRepository();
    try {
      testBookRepository.connect();
      DaftarHarga test1 = testBookRepository.getDaftarHarga("Xl9nDwAAQBAJ");
      System.out.println("\nTest\nHarga buku: " + test1.getHarga());

      test1 = testBookRepository.getDaftarHarga("tubeswbdacac");
      System.out.println("\nTest\nHarga buku: " + test1.getHarga());

      DaftarPenjualan test2 = testBookRepository.getDaftarPenjualan("Xl9nDwAAQBAJ");
      System.out.println("\nTest\nJumlah penjualan buku: " + test2.getJumlah());

      testBookRepository.insertDaftarHarga(dummyDaftarHarga1);
      testBookRepository.insertDaftarPenjualan(dummyDaftarPejualan1);
      testBookRepository.insertDaftarPenjualan(dummyDaftarPejualan2);


    } catch (SQLException e){
      e.printStackTrace();
    }finally {
      testBookRepository.disconnect();
    }





    Object implementor = new HelloWorld ();
    String address = "http://localhost:9000/HelloWorld";
    Endpoint.publish(address, implementor);
  }
}

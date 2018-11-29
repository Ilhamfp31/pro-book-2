package example;

import model.Book;
import model.DaftarHarga;
import model.DaftarPenjualan;
import org.json.JSONArray;
import org.json.JSONObject;
import repository.BookRepository;
import service.BookServiceImpl;
import service.WebServiceBankApi;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.xml.ws.Endpoint;

import java.sql.*;
import java.util.ArrayList;
import java.util.Collection;
import java.util.List;
import java.util.Map;

import static service.GoogleBooksApi.getBookByTitle;
import static service.GoogleBooksApi.getBookDetailByID;

@WebService()
public class HelloWorld {
    @WebMethod
    public String sayHelloWorldFrom(String from) {
        String result = "Hello, world, from " + from;
        System.out.println(result);
        return result;
    }

    public static void main(String[] argv) {

//       test getBookByTitle
        ArrayList<Book> testGetBookByTitle = getBookByTitle("kue");
        System.out.println("\n\n Test balikan1, Judul:" + testGetBookByTitle.get(0).getTitle());

        //       test getBookDetailByID
        Book testGetBookDetailByID = getBookDetailByID("Xl9nDwAAQBAJ");
        System.out.println("\n\n Test balikan2, Judul:" + testGetBookDetailByID.getTitle());


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


        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            testBookRepository.disconnect();
        }


//        System.out.println(WebServiceBankApi.transfer("5276132361916817", "5285983471586166", 7535644F));

        Object implementor = new HelloWorld();
        String address = "http://localhost:9000/HelloWorld";
        Endpoint.publish(address, implementor);

        Object implementor2 = new BookServiceImpl();
        String address2 = "http://localhost:9000/BookService";
        Endpoint.publish(address2, implementor2);
    }

}

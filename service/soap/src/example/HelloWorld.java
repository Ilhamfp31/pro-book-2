package example;
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
    ArrayList<Map<String,String>> testGetBookByTitle = getBookByTitle("kue");
    System.out.println("\n\n Test balikan, Judul:" + testGetBookByTitle.get(0).get("title"));

    // test BookRepository
    BookRepository testBookRepository = new BookRepository();
    try {
      testBookRepository.connect();

    } finally {
      testBookRepository.disconnect();
    }





    Object implementor = new HelloWorld ();
    String address = "http://localhost:9000/HelloWorld";
    Endpoint.publish(address, implementor);
  }
}

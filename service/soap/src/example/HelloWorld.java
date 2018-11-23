package example;
import com.sun.xml.bind.v2.model.core.ID;
import org.json.JSONArray;
import org.json.JSONObject;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.xml.ws.Endpoint;

import static repository.bookRepository.getBookByTitle;

@WebService()
public class HelloWorld {
  @WebMethod
  public String sayHelloWorldFrom(String from) {
    String result = "Hello, world, from " + from;
    System.out.println(result);
    return result;
  }

  public static void main(String[] argv) {
    JSONObject testWebservice = getBookByTitle("kue");
    if (testWebservice.has("items")){
      JSONArray arrayOfBooks = testWebservice.getJSONArray("items");
      for (int i = 0; i < arrayOfBooks.length(); ++i){
        JSONObject cur = arrayOfBooks.getJSONObject(i);

        String IDBuku;
        if (cur.has("id")){
         IDBuku = cur.getString("id");
        } else {
          IDBuku = "Tidak_Diketahui";
        }

        if (cur.has("volumeInfo")){
          JSONObject volumeInfo = cur.getJSONObject("volumeInfo");

          String JudulBuku;
          if (volumeInfo.has("title")){
            JudulBuku = volumeInfo.getString("title");
          } else {
            JudulBuku = "Tidak_Diketahui";
          }

          String KategoriBuku;
          if (volumeInfo.has("categories")){
            KategoriBuku = volumeInfo.getJSONArray("categories").getString(0);
          } else {
            KategoriBuku = "Tidak_Diketahui";
          }

          System.out.println("\nID: " + IDBuku);
          System.out.println("\nTitle: " + JudulBuku);
          System.out.println("\nKategori: " + KategoriBuku);
        } else {
          System.out.println("Info buku dengan ID:" + IDBuku + "kosong");
        }

      }
    } else {
      System.out.println("Hasil kosong");
    }


    Object implementor = new HelloWorld ();
    String address = "http://localhost:9000/HelloWorld";
    Endpoint.publish(address, implementor);
  }
}

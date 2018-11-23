package repository;

import org.json.JSONArray;
import org.json.JSONException;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.*;
import org.json.JSONObject;

public class bookRepository {
  private static final String API_KEY = "AIzaSyCaJ4-5uWO1ntq_RZ2TpTuAkzJuAPiOlT4";

  //Pencarian buku menerima keyword judul
  public static JSONObject getBookByTitle(String title){

    String apiUrlString = "https://www.googleapis.com/books/v1/volumes?q=intitle:" + title + "&key=" + API_KEY;
    try{
      HttpURLConnection connection = null;
      // Build Connection.
      try{
        URL url = new URL(apiUrlString);
        connection = (HttpURLConnection) url.openConnection();
        connection.setRequestMethod("GET");
        connection.setReadTimeout(5000); // 5 seconds
        connection.setConnectTimeout(5000); // 5 seconds
      } catch (MalformedURLException e) {
        e.printStackTrace();
      } catch (ProtocolException e) {
        e.printStackTrace();
      }
      int responseCode = connection.getResponseCode();
      if(responseCode != 200){
        connection.disconnect();
        return null;
      }

      // Read data from response.
      StringBuilder builder = new StringBuilder();
      BufferedReader responseReader = new BufferedReader(new InputStreamReader(connection.getInputStream()));
      String line = responseReader.readLine();
      while (line != null){
        builder.append(line);
        line = responseReader.readLine();
      }
      String responseString = builder.toString();
      System.out.println("Response String: " + responseString);
      JSONObject responseJson = new JSONObject(responseString);
      // Close connection and return response code.
      connection.disconnect();
      return responseJson;
    } catch (SocketTimeoutException e) {
      System.out.println("Connection timed out. Returning null");
      return null;
    } catch(IOException e){
      System.out.println("IOException when connecting to Google Books API.");
      return null;
    } catch (JSONException e) {
      System.out.println("JSONException when connecting to Google Books API.");
      return null;
    }
  }
}

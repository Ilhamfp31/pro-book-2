package service;

import org.json.JSONObject;

import java.io.IOException;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;

public class WebServiceBankApi {
    private static final String url = "http://localhost:3000/transfer";

    public static Boolean transfer(String pengirim, String penerima, Float jumlah) {
        URL object = null;
        try {
            object = new URL(WebServiceBankApi.url);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        }
        HttpURLConnection con = null;
        try {
            con = (HttpURLConnection) object.openConnection();
        } catch (IOException e) {
            e.printStackTrace();
        }
        con.setDoOutput(true);
        con.setDoInput(true);
        con.setRequestProperty("Content-Type", "application/json");
        con.setRequestProperty("Accept", "application/json");
        try {
            con.setRequestMethod("POST");
        } catch (ProtocolException e) {
            e.printStackTrace();
        }

        JSONObject request = new JSONObject();
        request.put("no_pengirim", pengirim);
        request.put("no_penerima", penerima);
        request.put("jumlah", jumlah);

        OutputStreamWriter wr = null;
        try {
            wr = new OutputStreamWriter(con.getOutputStream());
            wr.write(request.toString());
            wr.flush();
        } catch (IOException e) {
            e.printStackTrace();
        }

        int HttpResult = 0;
        try {
            HttpResult = con.getResponseCode();
        } catch (IOException e) {
            e.printStackTrace();
        }
        if (HttpResult == HttpURLConnection.HTTP_OK) {
            return true;
        }
        else {
            return false;
        }

    }
}

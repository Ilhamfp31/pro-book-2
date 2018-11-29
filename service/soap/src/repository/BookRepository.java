package repository;

import model.DaftarHarga;
import model.DaftarPenjualan;
import org.json.JSONArray;
import org.json.JSONException;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.*;
import java.sql.*;
import java.util.Properties;

import org.json.JSONObject;

public class BookRepository {
    // init database constants
    private static final String DATABASE_DRIVER = "com.mysql.cj.jdbc.Driver";
    private static final String DATABASE_URL = "jdbc:mysql://localhost:3306/webservice_buku?useUnicode=true&useJDBCCompliantTimezoneShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC";

    private static final String USERNAME = "root";
    private static final String PASSWORD = "wbd";
    private static final String MAX_POOL = "250";
    private static final String STRING_UNDEFINED = "Tidak_Diketahui";

    // init connection object
    private Connection connection;
    // init properties object
    private Properties properties;

    // create properties
    private Properties getProperties() {
        if (properties == null) {
            properties = new Properties();
            properties.setProperty("user", USERNAME);
            properties.setProperty("password", PASSWORD);
            properties.setProperty("MaxPooledStatements", MAX_POOL);
        }
        return properties;
    }

    // connect database
    public Connection connect() {
        if (connection == null) {
            try {
                Class.forName(DATABASE_DRIVER);
                connection = DriverManager.getConnection(DATABASE_URL, getProperties());
            } catch (ClassNotFoundException | SQLException e) {
                e.printStackTrace();
            }
        }
        return connection;
    }

    // disconnect database
    public void disconnect() {
        if (connection != null) {
            try {
                connection.close();
                connection = null;
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }

    public DaftarHarga getDaftarHarga(String id_buku) throws SQLException {
        if (connection == null) {
            this.connect();
        }
        Statement st = connection.createStatement();

        DaftarHarga answer = new DaftarHarga(STRING_UNDEFINED, -1);

        try {
            String query = "SELECT * FROM daftar_harga where id_buku = \"" + id_buku + "\";";
            ResultSet rs = st.executeQuery(query);
            while (rs.next()) {
                answer.setId_buku(rs.getString("id_buku"));
                answer.setHarga(rs.getInt("harga"));
            }
        } catch (Exception e) {
            System.err.println("Got an exception! ");
            System.err.println(e.getMessage());
        } finally {
            st.close();
        }

        return answer;
    }

    public void insertDaftarHarga(DaftarHarga input) throws SQLException {
        if (connection == null) {
            this.connect();
        }
        Statement st = connection.createStatement();
        try {
            DaftarHarga testExist = this.getDaftarHarga(input.getId_buku());
            if (testExist.isValid()) {
                String query = String.format("UPDATE daftar_harga SET harga = %d WHERE id_buku = \"%s\";", input.getHarga(), input.getId_buku());
                st.executeUpdate(query);
            } else {
                String query = String.format("INSERT INTO daftar_harga VALUES (\"%s\", %d);", input.getId_buku(), input.getHarga());
                st.executeUpdate(query);
            }
        } catch (Exception e) {
            System.err.println("Got an exception! ");
            System.err.println(e.getMessage());
        } finally {
            st.close();
        }
    }

    public DaftarPenjualan getDaftarPenjualan(String id_buku) throws SQLException {
        if (connection == null) {
            this.connect();
        }
        Statement st = connection.createStatement();
        DaftarPenjualan answer = new DaftarPenjualan(STRING_UNDEFINED, STRING_UNDEFINED, -1);

        try {
            String query = "SELECT * FROM daftar_penjualan where id_buku = \"" + id_buku + "\";";
            ResultSet rs = st.executeQuery(query);
            while (rs.next()) {
                answer.setId_buku(rs.getString("id_buku"));
                answer.setKategori(rs.getString("kategori"));
                answer.setJumlah(rs.getInt("jumlah"));
            }
        } catch (Exception e) {
            System.err.println("Got an exception! ");
            System.err.println(e.getMessage());
        } finally {
            st.close();
        }

        return answer;
    }

    public long insertDaftarPenjualan( DaftarPenjualan input) throws SQLException {
        if (connection == null) {
            this.connect();
        }
        Statement st = connection.createStatement();
        try {
            Timestamp timestamp = new Timestamp(System.currentTimeMillis());
            String query = String.format("INSERT INTO daftar_penjualan(id_buku, kategori, jumlah, timestamp) VALUES (\"%s\", \"%s\", %d, %d);", input.getId_buku(), input.getKategori(), input.getJumlah(), timestamp.getTime());
            st.executeUpdate(query, Statement.RETURN_GENERATED_KEYS);

            ResultSet generatedKeys = st.getGeneratedKeys();
            if (generatedKeys.next()) {
                return generatedKeys.getLong(1);
            }
        } catch (Exception e) {
            System.err.println("Got an exception! ");
            System.err.println(e.getMessage());
        } finally {
            st.close();
        }
        return -1;
    }

    public DaftarPenjualan getLargestByCategory(String category) throws SQLException {
        if (connection == null) {
            this.connect();
        }
        Statement st = connection.createStatement();
        DaftarPenjualan answer = new DaftarPenjualan(STRING_UNDEFINED, STRING_UNDEFINED, -1);

        try {
            String query = "SELECT * FROM daftar_penjualan WHERE LOWER(kategori) LIKE LOWER(\"" + category + "\") ORDER BY jumlah DESC LIMIT 1;";
            ResultSet rs = st.executeQuery(query);
            while (rs.next()) {
                answer.setId_buku(rs.getString("id_buku"));
                answer.setKategori(rs.getString("kategori"));
                answer.setJumlah(rs.getInt("jumlah"));
            }
        } catch (Exception e) {
            System.err.println("Got an exception! ");
            System.err.println(e.getMessage());
        } finally {
            st.close();
        }

        return answer;
    }
}

package service;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;

import model.Book;

import java.sql.SQLException;
import java.util.*;

@WebService
@SOAPBinding(style = SOAPBinding.Style.RPC)
public interface BookService {

    @WebMethod
    ArrayList<Book> getBookByTitle(String title);

    @WebMethod
    Book getRecommendation(String... categories);

    @WebMethod
    Boolean buyBook(String idBuku, Integer jumlah, String norek);

    @WebMethod
    Book getBookDetailByID(String idBuku) throws SQLException;
}

package service;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;
import javax.xml.ws.Response;

import model.Book;
import model.BooksWrapper;

import java.sql.SQLException;
import java.util.*;

@WebService
@SOAPBinding(style = SOAPBinding.Style.RPC)
public interface BookService {

    @WebMethod
    BooksWrapper getBookByTitle(String title);

    @WebMethod
    Book getRecommendation(String... categories);

    @WebMethod
    long buyBook(String idBuku, Integer jumlah, String norek);

    @WebMethod
    Book getBookDetailByID(String idBuku) throws SQLException;
}

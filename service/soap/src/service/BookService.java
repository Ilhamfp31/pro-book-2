package service;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;

import model.Book;

import java.util.*;

@WebService
@SOAPBinding(style = SOAPBinding.Style.RPC)
public interface BookService {

    @WebMethod
    public ArrayList<Book> searchBookByTitle(String title);

    @WebMethod
    public Book getRecommendation(String category);
}

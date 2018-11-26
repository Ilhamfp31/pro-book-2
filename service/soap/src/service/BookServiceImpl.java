package service;

import java.util.*;

import javax.jws.WebService;

import model.Book;

@WebService(endpointInterface = "service.BookService")
public class BookServiceImpl implements BookService {

    @Override
    public ArrayList<Book> getBookByTitle(String title) {
        return null;
    }

    @Override
    public Book getRecommendation(String category) {
        return null;
    }

    @Override
    public Boolean buyBook(String idBuku, Integer jumlah, String norek) {
        return null;
    }

    @Override
    public Book getBookDetailByID(String idBuku) {
        return null;
    }
}

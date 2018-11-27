package service;

import java.sql.SQLException;
import java.util.*;

import javax.jws.WebService;

import model.Book;
import model.DaftarHarga;
import model.DaftarPenjualan;
import repository.BookRepository;

@WebService(endpointInterface = "service.BookService")
public class BookServiceImpl implements BookService {

    private static final String norek_juragan = "5276132361916817";

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

        BookRepository bookRepository = new BookRepository();
        bookRepository.connect();
        DaftarHarga harga = null;
        try {
            harga = bookRepository.getDaftarHarga(idBuku);
        } catch (SQLException e) {
            e.printStackTrace();
        }

        if (harga.getHarga() == -1) {
            bookRepository.disconnect();
            return false;
        }

        if (WebServiceBankApi.transfer(norek, BookServiceImpl.norek_juragan, (float) (jumlah*harga.getHarga()))) {
            Book book = GoogleBooksApi.getBookDetailByID(idBuku);
            DaftarPenjualan penjualan = new DaftarPenjualan(book.getId(), book.getCategory(), jumlah);
            try {
                bookRepository.insertDaftarPenjualan(penjualan);
            } catch (SQLException e) {
                e.printStackTrace();
            }
            bookRepository.disconnect();
            return true;
        }
        else {
            bookRepository.disconnect();
            return false;
        }
    }

    @Override
    public Book getBookDetailByID(String idBuku) {
        BookRepository bookRepository = new BookRepository();
        bookRepository.connect();
        Book book = GoogleBooksApi.getBookDetailByID(idBuku);
        DaftarHarga daftarHarga = null;
        try {
            daftarHarga = bookRepository.getDaftarHarga(idBuku);
        } catch (SQLException e) {
            e.printStackTrace();
        }
        if (daftarHarga.getHarga() != -1) {
            book.setPrice(daftarHarga.getHarga());
        }
        bookRepository.disconnect();
        return book;
    }
}

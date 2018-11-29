package service;

import java.sql.SQLException;
import java.util.*;

import javax.jws.WebService;
import javax.xml.ws.Response;
import javax.xml.ws.ResponseWrapper;

import model.Book;
import model.BooksWrapper;
import model.DaftarHarga;
import model.DaftarPenjualan;
import repository.BookRepository;

@WebService(endpointInterface = "service.BookService")
public class BookServiceImpl implements BookService {

    private static final String norek_juragan = "5276132361916817";

    @Override
    public BooksWrapper getBookByTitle(String title) {
        BookRepository bookRepository = new BookRepository();
        bookRepository.connect();
        BooksWrapper books = new BooksWrapper();
        books.setBooks(GoogleBooksApi.getBookByTitle(title));
        if (books.getBooks() != null) {
            for (Book book : books.getBooks()) {
                DaftarHarga daftarHarga = null;
                try {
                    daftarHarga = bookRepository.getDaftarHarga(book.getId());
                    if (daftarHarga.getHarga() != -1) {
                        book.setPrice(daftarHarga.getHarga());
                    }
                } catch (SQLException e) {
                    e.printStackTrace();
                }
            }
        }
        bookRepository.disconnect();

        return books;
    }

    @Override
    public Book getRecommendation(String... categories) {
        Book book;
        BookRepository bookRepository = new BookRepository();
        bookRepository.connect();
        DaftarPenjualan daftarPenjualan = new DaftarPenjualan("undefined", "undefined", -1);
        for (String category : categories) {
            try {
                DaftarPenjualan largest_penjualan = bookRepository.getLargestByCategory(category);
                if (largest_penjualan.getJumlah() > daftarPenjualan.getJumlah()) {
                    daftarPenjualan.setId_buku(largest_penjualan.getId_buku());
                    daftarPenjualan.setKategori(largest_penjualan.getKategori());
                    daftarPenjualan.setJumlah(largest_penjualan.getJumlah());
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
        if (daftarPenjualan.getJumlah() == -1) {
            Random rand = new Random();
            book = GoogleBooksApi.getRandomBookByCategory(categories[rand.nextInt(categories.length)]);
        }
        else {
            book = GoogleBooksApi.getBookDetailByID(daftarPenjualan.getId_buku());
        }
        bookRepository.disconnect();
        return book;
    }

    @Override
    public long buyBook(String idBuku, Integer jumlah, String norek) {

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
            return -1;
        }

        if (WebServiceBankApi.transfer(norek, BookServiceImpl.norek_juragan, (float) (jumlah*harga.getHarga()))) {
            Book book = GoogleBooksApi.getBookDetailByID(idBuku);
            DaftarPenjualan penjualan = new DaftarPenjualan(book.getId(), book.getCategory(), jumlah);
            try {
                long idPenjualan = bookRepository.insertDaftarPenjualan(penjualan);
                bookRepository.disconnect();
                return idPenjualan;
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }

        bookRepository.disconnect();
        return -1;
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

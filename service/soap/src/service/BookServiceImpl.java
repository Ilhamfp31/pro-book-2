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
        BookRepository bookRepository = new BookRepository();
        bookRepository.connect();
        ArrayList<Book> bookList = GoogleBooksApi.getBookByTitle(title);
        for (Book book : bookList) {
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
        bookRepository.disconnect();
        return bookList;
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

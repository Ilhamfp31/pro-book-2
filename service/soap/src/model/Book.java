package model;

import java.io.Serializable;

public class Book implements Serializable {

    private static final long serialVersionUID = -5577579081118070434L;
    private static final String STRING_UNDEFINED = "Tidak_Diketahui";

    private String id;
    private String title;
    private String author;
    private String description;
    private String image;
    private String category;
    private int price;

    @Override
    public String toString() {
        return "Book{" +
                "id='" + id + '\'' +
                ", title='" + title + '\'' +
                ", author='" + author + '\'' +
                ", description='" + description + '\'' +
                ", image='" + image + '\'' +
                ", category='" + category + '\'' +
                ", price=" + price +
                '}';
    }

    public Book(String id, String title, String author, String description, String image, String category) {
        this.id = id;
        this.title = title;
        this.author = author;
        this.description = description;
        this.image = image;
        this.category = category;
        this.price = -1;
    }

    public Book(){
        this.id = "-1";
        this.title = STRING_UNDEFINED;
        this.author = STRING_UNDEFINED;
        this.description = STRING_UNDEFINED;
        this.image = "https://almasoem.sch.id/wp-content/uploads/2016/02/IMG_9738-Large-1024x683.jpg";
        this.price = -1;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getAuthor() {
        return author;
    }

    public void setAuthor(String author) {
        this.author = author;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }
}

package com.hellokoding.springdatarest.book;

import lombok.*;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "books")
public class Book {
    @Id
    private int id;

    private String title;

    private String description;
    public Book() {
    }
    public Book(String title, String description) {
        this.title = title;
        this.description = description;
    }
    public int getId() {
        return id;
    }
    public void setId(int id) {
        this.id = id;
    }
    public String getTitle() {
        return title;
    }
    public void setTitle(String title) {
        this.title = title;
    }
    public String getDescription() {
        return description;
    }
    public void setDescription(String description) {
        this.description = description;
    }
    @Override
    public String toString() {
        return "Book{" +
                ", Title='" + title + '\'' +
                ", Description=" + description +
                '}';
    }

}

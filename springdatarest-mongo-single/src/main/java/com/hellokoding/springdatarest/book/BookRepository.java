package com.hellokoding.springdatarest.book;

import com.hellokoding.springdatarest.book.Book;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.stereotype.Repository;

@Repository
public interface BookRepository extends MongoRepository<Book, Integer> {
    Book findByTitle(String title);
}





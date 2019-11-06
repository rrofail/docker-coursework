<h1>Docker Coursework and Examples</h1>
<p>This is a repo for moving various exmaples into a more cohesive package.</p> 
Initially, this will run koding's course for creating a mysql springboot applicaiton and also runs Phpmyadmin in a separate connected container.
<h3>Notes on running examples</h3>
<p>from the main example directory (i.e. springdatarest-postgresql-single):
<p><code>sudo docker-compose up</code> 
<p>or to force a maven build:
  <p><code>sudo docker-compose up --build</code> 

You might need to delete the build contents.  Just delete the target directory contents and it will rebuild.
<p>to cleanup instances after running:
<p>  <code>sudo docker-compose rm</code>
<h4>Connecting to running image</h4>
<p>  <code>sudo docker exec -it hk-postgres bash</code>
 
<h3>inserting data</h3> 
<code>Create some new books

<p>curl -i -X POST -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding\", \"description\": \"Simple coding examples and tutorials\"}" http://localhost:8080/books 
<p>curl -i -X POST -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2\", \"description\": \"Simple coding examples and tutorials 2\"}" http://localhost:8080/books
<p><p>Find all books
<p>curl http://localhost:8080/books
<p><p>Find book with id=2
<p>curl curl http://localhost:8080/books/2
<p><p>Update book id 2
<p>curl -i -X PATCH -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2 updated\"}" http://localhost:8080/books/2
<p><p>Replace book id 2
<p>curl -i -X PUT -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2 replaced\"}" http://localhost:8080/books/2
<p><p>Delete book id 2
<p>curl -i -X DELETE http://localhost:8080/books/2
  
<h4>psql command examples after creating data</h4>
<p>  <code>sudo docker exec -it hk-postgres bash</code>
 <p>  <code>psql
<p>     
<p>root=# \c postgres
<p>You are now connected to database "postgres" as user "root".
<p>postgres=# \l
<p>                             List of databases
<p>   Name    | Owner | Encoding |  Collate   |   Ctype    | Access privileges 
<p>-----------+-------+----------+------------+------------+-------------------
<p> postgres  | root  | UTF8     | en_US.utf8 | en_US.utf8 | 
<p> root      | root  | UTF8     | en_US.utf8 | en_US.utf8 | 
<p> template0 | root  | UTF8     | en_US.utf8 | en_US.utf8 | =c/root          +
<p>           |       |          |            |            | root=CTc/root
<p> template1 | root  | UTF8     | en_US.utf8 | en_US.utf8 | =c/root          +
<p>           |       |          |            |            | root=CTc/root
<p>(4 rows)
<p>
<p>postgres=# \dt
<p>       List of relations
<p> Schema | Name | Type  | Owner 
<p>--------+------+-------+-------
<p> public | book | table | root
<p>(1 row)
<p>
<p>postgres=# \d public.book
<p>                                      Table "public.book"
<p>   Column    |          Type          | Collation | Nullable |             Default              
<p>-------------+------------------------+-----------+----------+----------------------------------
<p> id          | integer                |           | not null | nextval('book_id_seq'::regclass)
<p> description | character varying(255) |           |          | 
<p> title       | character varying(255) |           |          | 
<p>Indexes:
<p>    "book_pkey" PRIMARY KEY, btree (id)
<p>
<p>postgres=# \d book
<p>                                      Table "public.book"
<p>   Column    |          Type          | Collation | Nullable |             Default              
<p>-------------+------------------------+-----------+----------+----------------------------------
<p> id          | integer                |           | not null | nextval('book_id_seq'::regclass)
<p> description | character varying(255) |           |          | 
<p> title       | character varying(255) |           |          | 
<p>Indexes:
<p>    "book_pkey" PRIMARY KEY, btree (id)
<p>
<p>postgres=# select * from book;
<p> id |              description               |     title      
<p>  1 | Simple coding examples and tutorials   | Hello Koding
<p>  2 | Simple coding examples and tutorials 2 | Hello Koding 2
<p>  3 | Simple coding examples and tutorials 2 | Hello Koding 2
<p>  4 | Simple coding examples and tutorials 2 | Hello Koding 2
<p>(4 rows)

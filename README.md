# Docker Coursework and Examples

This is a repo for moving various examples into a more cohesive package.

Initially, this will run koding's course for creating a mysql springboot applicaiton and also runs Phpmyadmin in a separate connected container.

### Notes on running examples

from the main example directory (i.e. _**~/docker-coursework/springdatarest-mysql-single directory** _):

`sudo docker-compose up`

or to force a maven build:

`sudo docker-compose up --build`

To run the mysql demo with phpmyadmin enabled on local port 9080, you can run this:

(from the ~/docker-coursework/springdatarest-mysql-single directory)

`$ sudo docker-compose -f docker-compose-phpmyadmin.yml up` You might need to delete the build contents. Just delete the target directory contents and it will rebuild.

to cleanup instances after running:

`sudo docker-compose rm`

#### Connecting to running image

`sudo docker exec -it hk-mysql bash`

`sudo docker exec -it hk-postgres bash`

`sudo docker exec -it phpmyadmin bash`

### inserting data

`Create some new books

curl -i -X POST -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding\", \"description\": \"Simple coding examples and tutorials\"}" http://localhost:8080/books

curl -i -X POST -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2\", \"description\": \"Simple coding examples and tutorials 2\"}" http://localhost:8080/books

Find all books

curl http://localhost:8080/books

Find book with id=2

curl curl http://localhost:8080/books/2

Update book id 2

curl -i -X PATCH -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2 updated\"}" http://localhost:8080/books/2

Replace book id 2

curl -i -X PUT -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2 replaced\"}" http://localhost:8080/books/2

Delete book id 2

curl -i -X DELETE http://localhost:8080/books/2

#### psql command examples after creating data

`sudo docker exec -it hk-postgres bash`

`psql`

`root=# \c postgres`

`You are now connected to database "postgres" as user "root".`

`postgres=# \l`

`List of databases`

`Name | Owner | Encoding | Collate | Ctype | Access privileges`

`-----------+-------+----------+------------+------------+-------------------`

`postgres | root | UTF8 | en_US.utf8 | en_US.utf8 |`

`root | root | UTF8 | en_US.utf8 | en_US.utf8 |`

`template0 | root | UTF8 | en_US.utf8 | en_US.utf8 | =c/root +`

`| | | | | root=CTc/root`

`template1 | root | UTF8 | en_US.utf8 | en_US.utf8 | =c/root +`

`| | | | | root=CTc/root`

`(4 rows)`

`postgres=# \dt`

`List of relations`

`Schema | Name | Type | Owner`

`--------+------+-------+-------`

`public | book | table | root`

`(1 row)`

`postgres=# \d public.book`

`Table "public.book"`

`Column | Type | Collation | Nullable | Default`

`-------------+------------------------+-----------+----------+----------------------------------`

`id | integer | | not null | nextval('book_id_seq'::regclass)`

`description | character varying(255) | | |`

`title | character varying(255) | | |`

`Indexes:`

`"book_pkey" PRIMARY KEY, btree (id)`

`postgres=# \d book`

`Table "public.book"`

`Column | Type | Collation | Nullable | Default`

`-------------+------------------------+-----------+----------+----------------------------------`

`id | integer | | not null | nextval('book_id_seq'::regclass)`

`description | character varying(255) | | |`

`title | character varying(255) | | |`

`Indexes:`

`"book_pkey" PRIMARY KEY, btree (id)`

`postgres=# select * from book;`

`id | description | title`

`1 | Simple coding examples and tutorials | Hello Koding`

`2 | Simple coding examples and tutorials 2 | Hello Koding 2`

`3 | Simple coding examples and tutorials 2 | Hello Koding 2`

`4 | Simple coding examples and tutorials 2 | Hello Koding 2`

`(4 rows)`

`

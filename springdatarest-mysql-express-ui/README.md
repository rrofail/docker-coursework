### Notes on running examples

from the main example directory (i.e. _**~/docker-coursework/springdatarest-mysql-express-ui directory**_):

#### Setup NPM and Node
`npm install express pug axios`

#### Run apps
`sudo docker-compose up`

or to force a maven build:

`sudo docker-compose up --build`

To force docker to recreate images:

`sudo docker-compose up --force-recreate`

To run the mysql demo with phpmyadmin enabled on local port 9080, you can run this:

`sudo docker-compose -f docker-compose-phpmyadmin.yml up` 

You might need to delete the build contents. Just delete the target directory contents and it will rebuild. To cleanup instances after running:

`sudo docker-compose rm`

#### Connecting to running image

`sudo docker exec -it hk-mysql bash`

`sudo docker exec -it hk-postgres bash`

`sudo docker exec -it phpmyadmin bash`

### inserting data

Create some new books

`curl -i -X POST -H "Content-Type:application/json" -d "{\"title\" : \"Rick and Morty Book One: Deluxe Edition\", \"description\": \"Simple coding examples and tutorials\", \"coverImage\" : \"https://images-na.ssl-images-amazon.com/images/I/51XJOFqBREL._SX331_BO1,204,203,200_.jpg\"}" http://localhost:8080/books`

`curl -i -X POST -H "Content-Type:application/json" -d "{\"title\" : \"Rick and Morty Book Two: Deluxe Edition\", \"description\": \"Simple coding examples and tutorials 2\", \"coverImage\" : \"https://images-na.ssl-images-amazon.com/images/I/61thS466cnL._SX323_BO1,204,203,200_.jpg\"}" http://localhost:8080/books`

Find all books

`curl http://localhost:8080/books`

Find book with id=2

`curl curl http://localhost:8080/books/2`

Update book id 2

`curl -i -X PATCH -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2 updated\"}" http://localhost:8080/books/2`

Replace book id 2

`curl -i -X PUT -H "Content-Type:application/json" -d "{\"title\" : \"Hello Koding 2 replaced\"}" http://localhost:8080/books/2`

Delete book id 2

`curl -i -X DELETE http://localhost:8080/books/2`

#### mysql command examples after creating data

`sudo docker exec -it hk-mysql mysql -p`

Query the table:
`mysql> select * from test.book;`

#### Setup the Express UI and run it
`cd ui`
`npm add express pug axios`
`node book-server.js`
OPEN BROWSER TO http://localhost:3000 to view first book

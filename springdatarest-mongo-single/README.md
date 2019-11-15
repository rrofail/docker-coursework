### Notes on running examples

from the main example directory (i.e. _**~/docker-coursework/springdatarest-mongo-single directory**_):

`sudo docker-compose up`

or to force a maven build:

`sudo docker-compose up --build`

To force docker to recreate images:

`sudo docker-compose up --force-recreate`


You might need to delete the build contents. Just delete the target directory contents and it will rebuild. To cleanup instances after running:

`sudo docker-compose rm`

#### Connecting to running image

`sudo docker exec -it hk-mongo bash`


### inserting data

Create some new books

`curl -i -X POST -H "Content-Type:application/json" -d "{\"id\" : \"1\", \"title\" : \"Hello Koding\", \"description\": \"Simple coding examples and tutorials\"}" http://localhost:8080/books`

`curl -i -X POST -H "Content-Type:application/json" -d "{\"id\" : \"2\", \"title\" : \"Hello Koding 2\", \"description\": \"Simple coding examples and tutorials 2\"}" http://localhost:8080/books`

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

#### mongo command examples after creating data

`sudo docker exec -it hk-mongo bash`

#### open the mongo commmand line from the docker shell
``mongo --host localhost:27017

MongoDB shell version v4.2.1
connecting to: mongodb://localhost:27017/?compressors=disabled&gssapiServiceName=mongodb
Implicit session: session { "id" : UUID("5e4983f0-1c21-43de-9a28-df4a0a439636") }
MongoDB server version: 4.2.1
Welcome to the MongoDB shell.
For interactive help, type "help".
For more comprehensive documentation, see
	http://docs.mongodb.org/
Questions? Try the support group
	http://groups.google.com/group/mongodb-user
> ``



`

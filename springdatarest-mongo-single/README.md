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
```
mongo --host localhost:27017 --username root 
MongoDB shell version v4.2.1
Enter password: 
connecting to: mongodb://localhost:27017/?compressors=disabled&gssapiServiceName=mongodb
Implicit session: session { "id" : UUID("75daa10e-66bb-453e-ada7-4002277fca40") }
MongoDB server version: 4.2.1
Server has startup warnings: 
2019-11-16T00:42:54.852+0000 I  STORAGE  [initandlisten] 
2019-11-16T00:42:54.852+0000 I  STORAGE  [initandlisten] ** WARNING: Using the XFS filesystem is strongly recommended with the WiredTiger storage engine
2019-11-16T00:42:54.852+0000 I  STORAGE  [initandlisten] **          See http://dochub.mongodb.org/core/prodnotes-filesystem
---
Enable MongoDB's free cloud-based monitoring service, which will then receive and display
metrics about your deployment (disk utilization, CPU, operation statistics, etc).

The monitoring data will be available on a MongoDB website with a unique URL accessible to you
and anyone you share the URL with. MongoDB may use this information to make product
improvements and to suggest MongoDB products and deployment options to you.

To enable free monitoring, run the following command: db.enableFreeMonitoring()
To permanently disable this reminder, run the following command: db.disableFreeMonitoring()
---

> use books
switched to db books
> db.getCollection('books').find({})
{ "_id" : 3, "t" : "Hello Koding 3", "d" : "Simple coding examples and tutorials ", "_class" : "com.hellokoding.springdatarest.book.Book" }
{ "_id" : 1, "t" : "Hello Koding 1", "d" : "Simple coding examples and tutorials ", "_class" : "com.hellokoding.springdatarest.book.Book" }
{ "_id" : 2, "t" : "Hello Koding 2", "d" : "Simple coding examples and tutorials ", "_class" : "com.hellokoding.springdatarest.book.Book" }
> 


```



`

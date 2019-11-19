const express = require('express')
//import data from './data/artists.json'
const app = express();
app.set('view engine', 'pug');
const axios = require('axios');
const jsonResponse = ''



function getData(){
	 
}

app.get('/', (req,res) =>{
	res.redirect('/read')
})

app.get('/read', (req, res) => {
  axios.get('http://localhost:8080/books')
	  .then(response => {
	    console.log(response.data.page.totalPages);
	    console.log(response.data.page.totalElements);
	    res.render('index', response.data)
	  })
	  .catch(error => {
	    console.log(error);
	  });
	      
  })
//  app.get('/update', (req, res) => {
//      res.render('index', data.artist[1])
//  })
  

const port = process.env.PORT || 3000;
app.listen(port, () => {
	console.log(`http://localhost:${port}`)
})

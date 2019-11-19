<h1>Simple NodeJS app using Express and Jade templates</h1>
<p>
<p>This is a demo of a NodeJS application using Express and calling an REST API to popluate a page. 
It also uses JADE templates to paint the page.  Specifically, it hits https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY 
and populates a simple page with the title, description, and image provided by the REST JSON response data.
<p>
<h3>Installation</h3>
<p>Be sure to install node and npm first.  Then clone this repository and enter this directory.
<h4>Install needed packages:</h4>
<p><code>npm install express jade axios</code>
<p>That's it, it is ready to run!  
<p>
<p><code>node book-server.js</code>
<p>Open your browser to http://localhost:3000 and see it running. 

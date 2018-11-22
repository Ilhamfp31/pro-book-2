var express = require('express'),
    bodyParser = require('body-parser'),

app = express();
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

var routes = require('./api/routes/route');
routes(app);

// listen on port 3000
app.listen(3000, function () {
  console.log('Express app listening on port 3000');
});


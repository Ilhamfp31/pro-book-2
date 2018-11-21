const express = require('express');
app = express();

var routes = require('./api/routes/route');
app.use('/', routes);

// catch 404 and forward to error handler
app.use(function (req, res, next) {
  var err = new Error('404: File Not Found');
  err.status = 404;
  next(err);
});

// listen on port 3000
app.listen(3000, function () {
  console.log('Express app listening on port 3000');
});
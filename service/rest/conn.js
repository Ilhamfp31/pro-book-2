var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "wbd",
  database: "webservice_bank"
});

con.connect(function (err){
    if(err) throw err;
});

module.exports = con;
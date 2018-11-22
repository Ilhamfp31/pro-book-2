var mysql = require('mysql');

var con = mysql.createPool({
  connectionLimit: 10,
  host: "localhost",
  user: "root",
  database: "webservice_bank"
});

module.exports = con;
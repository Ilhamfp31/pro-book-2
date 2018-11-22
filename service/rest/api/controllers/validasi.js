var response = require('../controllers/res');
var connection = require('../../conn');

exports.validasi = function(req, res) {
    var no_kartu = req.body.no_kartu;
    connection.query('SELECT id FROM nasabah WHERE no_kartu = '+ no_kartu, function (error, rows, fields) {
        if(error){
            console.log(error)
            return res.status(500).json({
                message : 'Internal server error'
            });
        } else {
            if (rows.length == 0) {
                console.log("TIDAK VALID: "+no_kartu);
                response.ok(0, res);
            } else {
                console.log("VALID: "+no_kartu)
                response.ok(1, res)
            }
        }
    });
};
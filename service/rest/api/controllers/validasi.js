var response = require('../controllers/res');
var nasabah = require('../models/nasabah');

exports.validasi = function(req, res) {
    var no_kartu = req.body.no_kartu;
    nasabah.getNasabahByCard(no_kartu, function(error, rows) {
        if (error) {
           console.log(error)
            return res.status(500).json({
                message : 'Internal server error'
            }); 
        }
        else {
            if (rows.length == 0) {
                console.log("TIDAK VALID: "+no_kartu);
                response.ok(0, res);
            } else {
                console.log("VALID: "+no_kartu)
                response.ok(1, res);
            }
        }
    });
};
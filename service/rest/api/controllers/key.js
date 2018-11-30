var response = require('../controllers/res');
var nasabah = require('../models/nasabah');
var QRCode = require('qrcode');
var speakeasy = require('speakeasy');

exports.key = function(req, res) {
    var no_kartu = req.body.no_kartu;
    nasabah.getKeyByCard(no_kartu, function(error, rows) {
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
                console.log("KEY " + no_kartu + " IS " + rows[0].secret_key)
                response.ok(rows[0].secret_key, res);
            }
        }
    });
};

exports.qrcode = function(req, res) {
    var no_kartu = req.body.no_kartu;
    nasabah.getKeyByCard(no_kartu, function(error, rows) {
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
                var secret = rows[0].secret_key;
                var label = 'token';
                var issuer = 'probook' 
                const otpAuthUrl = speakeasy.otpauthURL({
                      secret,
                      label,
                      issuer,
                      encoding: 'base32',
                    });
                QRCode.toDataURL(otpAuthUrl, function(err, image_data) {
                    // console.log(image_data); // A data URI for the QR code image
                    response.ok(image_data, res);
                });
                
            }
        }
    });
};
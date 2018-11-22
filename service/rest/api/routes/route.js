module.exports = function(app) {
    const validasi = require('../controllers/validasi');
    const nasabah = require('../controllers/transfer');

    app.get('/', function(req, res) {
        res.json({
          'status': 200,
          'values': "REST Web Service"
        });
    });

    app.route('/validasi')
        .post(validasi.validasi);

    app.route('/transfer')
    	.post(nasabah.transfer);
};
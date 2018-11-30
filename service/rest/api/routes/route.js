module.exports = function(app) {
    const validasi = require('../controllers/validasi');
    const key = require('../controllers/key');
    const nasabah = require('../controllers/transfer');

    app.use(function(req, res, next) {
        res.header("Access-Control-Allow-Origin", "*");
        res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
        next();
    });

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

    app.route('/key')
        .post(key.key);

    app.route('/qrcode')
        .post(key.qrcode);
};
module.exports = function(app) {
    const validasi = require('../controllers/validasi');
    const nasabah = require('../controllers/transfer');

    app.route('/')
        .get(validasi.index);

    app.route('/validasi')
        .post(validasi.validasi);

    app.route('/transfer')
    	.post(nasabah.transfer);
};
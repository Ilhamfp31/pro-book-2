module.exports = function(app) {
    var validasi = require('../controllers/validasi');

    app.route('/')
        .get(validasi.index);

    app.route('/validasi')
        .post(validasi.validasi);
};
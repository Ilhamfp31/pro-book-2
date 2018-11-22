module.exports = function(app) {
    var validasi = require('../controllers/validasi');

    app.get('/', function(req, res) {
        res.json({
          'status': 200,
          'values': "REST Web Service"
        });
    });

    app.route('/validasi')
        .post(validasi.validasi);
};